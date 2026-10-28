import Link from "next/link";
import { getCurrentProfile } from "@/lib/supabase/server";
import { signOut } from "@/lib/auth-actions";
import { WishlistBadge, CartBadge } from "./CartWishlistCount";

export async function Navbar() {
  const { user, profile } = await getCurrentProfile();

  return (
    <nav className="navbar py-lg-4 py-3 px-0 border-bottom navbar-menu third-bg">
      <div className="container-fluid">
        <div className="row w-100 align-items-center g-0 gx-lg-3">
          <div className="col-lg-7 col-xxl-8">
            <div className="d-flex align-items-center">
              <Link className="navbar-brand" href="/">
                <img src="/ui/frontend/assets/images/logo/freshcart-logo.svg" alt="FreshCart" height={32} />
              </Link>
              <form action="/" className="d-none d-lg-block ms-4 w-100">
                <div className="input-group">
                  <input className="form-control rounded" type="search" name="q" placeholder="Search for products" />
                  <span className="input-group-append">
                    <button className="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="submit">
                      <i className="bi bi-search" />
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>

          <div className="col-lg-5 col-xxl-4 d-flex align-items-center justify-content-end">
            <ul className="list-inline mb-0 d-flex align-items-center gap-4">
              <li className="list-inline-item m-0">
                <Link href="/wishlist" className="text-reset position-relative">
                  <i className="bi bi-heart fs-5" />
                  <WishlistBadge />
                </Link>
              </li>
              <li className="list-inline-item m-0">
                <button
                  type="button"
                  className="btn p-0 border-0 text-reset position-relative"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#cartOffcanvas"
                  aria-controls="cartOffcanvas"
                >
                  <i className="bi bi-bag fs-5" />
                  <CartBadge />
                </button>
              </li>
              <li className="list-inline-item m-0">
                {user ? (
                  <div className="dropdown">
                    <button
                      className="btn btn-sm btn-outline-dark dropdown-toggle"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      {profile?.full_name || "Account"}
                    </button>
                    <ul className="dropdown-menu dropdown-menu-end">
                      <li>
                        <Link className="dropdown-item" href="/dashboard">
                          Dashboard
                        </Link>
                      </li>
                      <li>
                        <Link className="dropdown-item" href="/profile">
                          Profile
                        </Link>
                      </li>
                      {profile?.is_admin && (
                        <li>
                          <Link className="dropdown-item" href="/admin">
                            Admin panel
                          </Link>
                        </li>
                      )}
                      <li>
                        <hr className="dropdown-divider" />
                      </li>
                      <li>
                        <form action={signOut}>
                          <button type="submit" className="dropdown-item">
                            Logout
                          </button>
                        </form>
                      </li>
                    </ul>
                  </div>
                ) : (
                  <Link href="/login" className="btn btn-primary btn-sm">
                    Sign in
                  </Link>
                )}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  );
}
