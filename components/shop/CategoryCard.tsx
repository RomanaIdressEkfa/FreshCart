import Link from "next/link";
import type { Category } from "@/types/database";

export function CategoryCard({ category }: { category: Category }) {
  const isSvg = category.svg_code || category.image?.trim().startsWith("<svg");

  return (
    <Link href={`/category/${category.id}`} className="text-decoration-none text-inherit">
      <div className="card mb-3 card-lift">
        <div className="card-body text-center py-6">
          <div className="my-5">
            {isSvg ? (
              <span dangerouslySetInnerHTML={{ __html: category.svg_code || category.image || "" }} />
            ) : category.image ? (
              <img src={category.image} alt={category.name} style={{ width: 56, height: 56, objectFit: "cover" }} />
            ) : (
              <i className="bi bi-basket fs-1 text-success" />
            )}
          </div>
          <div>{category.name}</div>
        </div>
      </div>
    </Link>
  );
}
