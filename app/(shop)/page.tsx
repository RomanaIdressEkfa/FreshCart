import Link from "next/link";
import { createClient } from "@/lib/supabase/server";
import { CategoryCard } from "@/components/shop/CategoryCard";
import { ProductCard } from "@/components/shop/ProductCard";
import type { Category, Product } from "@/types/database";

export default async function HomePage() {
  const supabase = await createClient();

  const [categoriesRes, latestRes, bestSellersRes] = await Promise.all([
    supabase.from("categories").select("*").order("created_at", { ascending: false }),
    supabase.from("products").select("*").order("created_at", { ascending: false }).limit(10),
    supabase
      .from("products")
      .select("*")
      .eq("is_best_seller", true)
      .gte("sale_end_date", new Date().toISOString())
      .order("created_at", { ascending: false })
      .limit(5),
  ]);

  const categories = (categoriesRes.data ?? []) as Category[];
  const latestProducts = (latestRes.data ?? []) as Product[];
  const bestSellers = (bestSellersRes.data ?? []) as Product[];

  return (
    <>
      <section>
        <div className="container-fluid">
          <div
            className="py-10 px-8 rounded text-white"
            style={{
              background: "url(/ui/frontend/assets/images/banner/grocery-banner.png) no-repeat",
              backgroundSize: "cover",
              backgroundPosition: "center",
              minHeight: 260,
            }}
          >
            <h1 className="fw-bold mb-2">Fresh groceries, delivered fast.</h1>
            <p className="mb-4">Shop fruits, vegetables &amp; everyday essentials.</p>
            <Link href="#new-arrivals" className="btn btn-dark">
              Shop Now
            </Link>
          </div>
        </div>
      </section>

      <section className="pt-8">
        <div className="container-fluid">
          <div className="row mb-6">
            <div className="col-10">
              <h3 className="mb-0 fs-4">
                <i className="bi bi-grid me-2 text-primary" />
                Shop by Categories
              </h3>
            </div>
          </div>
          {categories.length === 0 ? (
            <EmptyState text="No categories yet — add some from the admin panel." />
          ) : (
            <div className="row g-4 row-cols-lg-6 row-cols-3">
              {categories.map((category) => (
                <CategoryCard key={category.id} category={category} />
              ))}
            </div>
          )}
        </div>
      </section>

      {bestSellers.length > 0 && (
        <section className="pt-8">
          <div className="container-fluid">
            <div className="row mb-6">
              <div className="col-10">
                <h3 className="mb-0 fs-4">
                  <i className="bi bi-fire me-2 text-danger" />
                  Best Sellers
                </h3>
              </div>
            </div>
            <div className="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
              {bestSellers.map((product) => (
                <ProductCard key={product.id} product={product} />
              ))}
            </div>
          </div>
        </section>
      )}

      <section id="new-arrivals" className="pt-8 pb-10">
        <div className="container-fluid">
          <div className="row mb-6">
            <div className="col-10">
              <h3 className="mb-0 fs-4">
                <i className="bi bi-stars me-2 text-primary" />
                New Arrivals
              </h3>
            </div>
          </div>
          {latestProducts.length === 0 ? (
            <EmptyState text="No products yet — add some from the admin panel." />
          ) : (
            <div className="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
              {latestProducts.map((product) => (
                <ProductCard key={product.id} product={product} />
              ))}
            </div>
          )}
        </div>
      </section>
    </>
  );
}

function EmptyState({ text }: { text: string }) {
  return (
    <div className="border border-dashed rounded p-6 text-center text-muted">
      {text} <Link href="/admin">Go to admin</Link>
    </div>
  );
}
