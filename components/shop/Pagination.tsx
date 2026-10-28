import Link from "next/link";

export function Pagination({
  basePath,
  currentPage,
  totalPages,
}: {
  basePath: string;
  currentPage: number;
  totalPages: number;
}) {
  if (totalPages <= 1) return null;

  const pages = Array.from({ length: totalPages }, (_, i) => i + 1);

  return (
    <nav className="mt-4">
      <ul className="pagination justify-content-end">
        {pages.map((page) => (
          <li key={page} className={`page-item ${page === currentPage ? "active" : ""}`}>
            <Link className="page-link" href={`${basePath}?page=${page}`}>
              {page}
            </Link>
          </li>
        ))}
      </ul>
    </nav>
  );
}
