import { notFound } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { ProductCard } from "@/components/ProductCard";
import { Pagination } from "@/components/Pagination";
import type { Category, Product } from "@/types/database";

const PAGE_SIZE = 10;

export default async function CategoryPage({
  params,
  searchParams,
}: {
  params: Promise<{ id: string }>;
  searchParams: Promise<{ page?: string }>;
}) {
  const { id } = await params;
  const { page: pageParam } = await searchParams;
  const page = Math.max(1, Number(pageParam) || 1);
  const from = (page - 1) * PAGE_SIZE;
  const to = from + PAGE_SIZE - 1;

  const supabase = await createClient();

  const [{ data: category }, { data: products, count }] = await Promise.all([
    supabase.from("categories").select("*").eq("id", id).single(),
    supabase
      .from("products")
      .select("*", { count: "exact" })
      .eq("category_id", id)
      .order("created_at", { ascending: false })
      .range(from, to),
  ]);

  if (!category) notFound();

  const totalPages = Math.max(1, Math.ceil((count ?? 0) / PAGE_SIZE));

  return (
    <div className="mx-auto max-w-6xl px-4 py-8">
      <h1 className="text-2xl font-bold text-slate-800">{(category as Category).name}</h1>
      {(category as Category).description && (
        <p className="mt-1 max-w-2xl text-sm text-slate-500">
          {(category as Category).description}
        </p>
      )}

      <div className="mt-6">
        {!products || products.length === 0 ? (
          <div className="rounded-xl border border-dashed border-slate-300 p-8 text-center text-sm text-slate-500">
            No products in this category yet.
          </div>
        ) : (
          <div className="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
            {(products as Product[]).map((product) => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        )}
      </div>

      <Pagination basePath={`/category/${id}`} currentPage={page} totalPages={totalPages} />
    </div>
  );
}
