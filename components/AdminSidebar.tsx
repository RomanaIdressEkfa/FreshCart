import Link from "next/link";

const links = [
  { href: "/admin", label: "Overview" },
  { href: "/admin/categories", label: "Categories" },
  { href: "/admin/sub-categories", label: "Sub-categories" },
  { href: "/admin/sub-sub-categories", label: "Sub-sub-categories" },
  { href: "/admin/brands", label: "Brands" },
  { href: "/admin/products", label: "Products" },
];

export function AdminSidebar() {
  return (
    <aside className="w-full shrink-0 border-b border-slate-200 bg-white p-4 sm:w-56 sm:border-b-0 sm:border-r">
      <nav className="flex flex-row gap-2 overflow-x-auto sm:flex-col">
        {links.map((link) => (
          <Link
            key={link.href}
            href={link.href}
            className="whitespace-nowrap rounded-md px-3 py-2 text-sm font-medium text-slate-600 hover:bg-emerald-50 hover:text-emerald-700"
          >
            {link.label}
          </Link>
        ))}
      </nav>
    </aside>
  );
}
