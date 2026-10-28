import Link from "next/link";
import { notFound } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { ProductCard } from "@/components/shop/ProductCard";
import { Pagination } from "@/components/shop/Pagination";
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
    <div className="container-fluid py-8">
      <nav aria-label="breadcrumb">
        <ol className="breadcrumb">
          <li className="breadcrumb-item">
            <Link href="/">Home</Link>
          </li>
          <li className="breadcrumb-item active">{(category as Category).name}</li>
        </ol>
      </nav>

      <h1 className="fs-3 fw-bold">{(category as Category).name}</h1>
      {(category as Category).description && (
        <p className="text-muted" style={{ maxWidth: 640 }}>
          {(category as Category).description}
        </p>
      )}

      <div className="mt-6">
        {!products || products.length === 0 ? (
          <div className="border border-dashed rounded p-6 text-center text-muted">
            No products in this category yet.
          </div>
        ) : (
          <div className="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
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
