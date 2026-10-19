import Link from "next/link";
import { getCurrentProfile } from "@/lib/supabase/server";
import { signOut } from "@/lib/auth-actions";
import { CartWishlistBadges } from "./CartWishlistBadges";

export async function Navbar() {
  const { user, profile } = await getCurrentProfile();

  return (
    <header className="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur">
      <div className="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3">
        <Link href="/" className="text-xl font-bold text-emerald-700">
          Fresh<span className="text-slate-900">Cart</span>
        </Link>

        <nav className="hidden items-center gap-6 text-sm font-medium text-slate-600 sm:flex">
          <Link href="/" className="hover:text-emerald-600">
            Home
          </Link>
          <Link href="/checkout" className="hover:text-emerald-600">
            Checkout
          </Link>
          {profile?.is_admin && (
            <Link href="/admin" className="hover:text-emerald-600">
              Admin
            </Link>
          )}
        </nav>

        <div className="flex items-center gap-4">
          <CartWishlistBadges />
          {user ? (
            <div className="flex items-center gap-3 text-sm font-medium">
              <Link href="/dashboard" className="hover:text-emerald-600">
                {profile?.full_name || user.email}
              </Link>
              <form action={signOut}>
                <button
                  type="submit"
                  className="rounded-md border border-slate-300 px-3 py-1.5 text-slate-600 hover:bg-slate-50"
                >
                  Logout
                </button>
              </form>
            </div>
          ) : (
            <div className="flex items-center gap-2 text-sm font-medium">
              <Link
                href="/login"
                className="rounded-md border border-slate-300 px-3 py-1.5 text-slate-600 hover:bg-slate-50"
              >
                Login
              </Link>
              <Link
                href="/register"
                className="rounded-md bg-emerald-600 px-3 py-1.5 text-white hover:bg-emerald-700"
              >
                Sign up
              </Link>
            </div>
          )}
        </div>
      </div>
    </header>
  );
}
