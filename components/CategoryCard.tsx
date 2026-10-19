import Image from "next/image";
import Link from "next/link";
import type { Category } from "@/types/database";

export function CategoryCard({ category }: { category: Category }) {
  return (
    <Link
      href={`/category/${category.id}`}
      className="flex flex-col items-center gap-2 rounded-xl border border-slate-200 bg-white p-4 text-center transition hover:shadow-md"
    >
      <div className="flex h-16 w-16 items-center justify-center overflow-hidden rounded-full bg-emerald-50">
        {category.image ? (
          <Image
            src={category.image}
            alt={category.name}
            width={64}
            height={64}
            className="h-full w-full object-cover"
          />
        ) : (
          <span className="text-2xl">🛒</span>
        )}
      </div>
      <span className="text-sm font-medium text-slate-700">{category.name}</span>
    </Link>
  );
}
