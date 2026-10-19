import Link from "next/link";
import { createClient } from "@/lib/supabase/server";
import { CategoryCard } from "@/components/CategoryCard";
import { ProductCard } from "@/components/ProductCard";
import type { Category, Product } from "@/types/database";

export default async function HomePage() {
  const supabase = await createClient();

  const [categoriesRes, latestRes, bestSellersRes] = await Promise.all([
    supabase
      .from("categories")
      .select("*")
      .order("created_at", { ascending: false }),
    supabase
      .from("products")
      .select("*")
      .order("created_at", { ascending: false })
      .limit(10),
    supabase
      .from("products")
      .select("*")
      .eq("is_best_seller", true)
      .gte("sale_end_date", new Date().toISOString())
      .order("created_at", { ascending: false })
      .limit(4),
  ]);

  const categories = (categoriesRes.data ?? []) as Category[];
  const latestProducts = (latestRes.data ?? []) as Product[];
  const bestSellers = (bestSellersRes.data ?? []) as Product[];

  return (
    <div className="mx-auto max-w-6xl px-4 py-8">
      <section className="rounded-2xl bg-emerald-600 px-6 py-12 text-white sm:px-10">
        <h1 className="text-3xl font-bold sm:text-4xl">Fresh groceries, delivered fast.</h1>
        <p className="mt-2 max-w-xl text-emerald-50">
          Shop fruits, vegetables, and everyday essentials — handpicked and delivered to your door.
        </p>
      </section>

      <section className="mt-10">
        <h2 className="mb-4 text-xl font-semibold text-slate-800">Shop by category</h2>
        {categories.length === 0 ? (
          <EmptyState text="No categories yet — add some from the admin panel." />
        ) : (
          <div className="grid grid-cols-2 gap-4 sm:grid-cols-4 md:grid-cols-6">
            {categories.map((category) => (
              <CategoryCard key={category.id} category={category} />
            ))}
          </div>
        )}
      </section>

      {bestSellers.length > 0 && (
        <section className="mt-10">
          <h2 className="mb-4 text-xl font-semibold text-slate-800">Best sellers</h2>
          <div className="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
            {bestSellers.map((product) => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        </section>
      )}

      <section className="mt-10">
        <div className="mb-4 flex items-center justify-between">
          <h2 className="text-xl font-semibold text-slate-800">New arrivals</h2>
        </div>
        {latestProducts.length === 0 ? (
          <EmptyState text="No products yet — add some from the admin panel." />
        ) : (
          <div className="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
            {latestProducts.map((product) => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        )}
      </section>
    </div>
  );
}

function EmptyState({ text }: { text: string }) {
  return (
    <div className="rounded-xl border border-dashed border-slate-300 p-8 text-center text-sm text-slate-500">
      {text}{" "}
      <Link href="/admin" className="font-medium text-emerald-600 hover:underline">
        Go to admin
      </Link>
    </div>
  );
}
