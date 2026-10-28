import Link from "next/link";
import { createClient } from "@/lib/supabase/server";
import type { Category } from "@/types/database";

export async function Footer() {
  const supabase = await createClient();
  const { data } = await supabase.from("categories").select("id, name").order("name").limit(12);
  const categories = (data ?? []) as Pick<Category, "id" | "name">[];

  return (
    <footer className="footer">
      <div className="container">
        <div className="row g-4 py-4">
          <div className="col-12 col-md-5 col-lg-4">
            <h6 className="mb-4">Categories</h6>
            {categories.length === 0 ? (
              <p className="text-muted small">No categories yet.</p>
            ) : (
              <ul className="nav flex-column">
                {categories.map((category) => (
                  <li key={category.id} className="nav-item mb-2">
                    <Link href={`/category/${category.id}`} className="nav-link p-0">
                      {category.name}
                    </Link>
                  </li>
                ))}
              </ul>
            )}
          </div>

          <div className="col-12 col-md-7 col-lg-8">
            <h6 className="mb-4">Shop with FreshCart</h6>
            <p className="text-muted">
              Fresh groceries, delivered to your door. Built with Next.js and Supabase.
            </p>
            <ul className="nav flex-column">
              <li className="nav-item mb-2">
                <Link href="/" className="nav-link p-0">
                  Home
                </Link>
              </li>
              <li className="nav-item mb-2">
                <Link href="/wishlist" className="nav-link p-0">
                  Wishlist
                </Link>
              </li>
              <li className="nav-item mb-2">
                <Link href="/checkout" className="nav-link p-0">
                  Checkout
                </Link>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-top py-4">
          <div className="row align-items-center">
            <div className="col-md-6">
              <span className="small text-muted">
                © {new Date().getFullYear()} FreshCart E-Commerce. All rights reserved.
              </span>
            </div>
            <div className="col-md-6">
              <ul className="list-inline text-md-end mb-0 small mt-3 mt-md-0">
                <li className="list-inline-item text-muted">Follow us on</li>
                <li className="list-inline-item me-1">
                  <a href="#" className="btn btn-xs btn-social btn-icon">
                    <i className="bi bi-facebook" />
                  </a>
                </li>
                <li className="list-inline-item me-1">
                  <a href="#" className="btn btn-xs btn-social btn-icon">
                    <i className="bi bi-twitter-x" />
                  </a>
                </li>
                <li className="list-inline-item">
                  <a href="#" className="btn btn-xs btn-social btn-icon">
                    <i className="bi bi-instagram" />
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
