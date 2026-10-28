import { createClient } from "@/lib/supabase/server";

export default async function AdminOverviewPage() {
  const supabase = await createClient();

  const [categories, subCategories, subSubCategories, brands, products] = await Promise.all([
    supabase.from("categories").select("*", { count: "exact", head: true }),
    supabase.from("sub_categories").select("*", { count: "exact", head: true }),
    supabase.from("sub_sub_categories").select("*", { count: "exact", head: true }),
    supabase.from("brands").select("*", { count: "exact", head: true }),
    supabase.from("products").select("*", { count: "exact", head: true }),
  ]);

  const cards = [
    { label: "Categories", count: categories.count ?? 0, href: "/admin/categories" },
    { label: "Sub-categories", count: subCategories.count ?? 0, href: "/admin/sub-categories" },
    { label: "Sub-sub-categories", count: subSubCategories.count ?? 0, href: "/admin/sub-sub-categories" },
    { label: "Brands", count: brands.count ?? 0, href: "/admin/brands" },
    { label: "Products", count: products.count ?? 0, href: "/admin/products" },
  ];

  return (
    <div>
      <h1 className="text-2xl font-bold text-slate-800">Admin overview</h1>
      <div className="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
        {cards.map((card) => (
          <div key={card.label} className="rounded-xl border border-slate-200 bg-white p-4">
            <p className="text-sm text-slate-500">{card.label}</p>
            <p className="mt-1 text-2xl font-bold text-emerald-700">{card.count}</p>
          </div>
        ))}
      </div>
    </div>
  );
}
