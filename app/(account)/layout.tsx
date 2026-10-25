import Link from "next/link";
import { Figtree } from "next/font/google";
import { getCurrentProfile } from "@/lib/supabase/server";
import { signOut } from "@/lib/auth-actions";

const figtree = Figtree({ subsets: ["latin"], weight: ["400", "500", "600"] });

export default async function AccountLayout({ children }: { children: React.ReactNode }) {
  const { user, profile } = await getCurrentProfile();

  return (
    <div className={`${figtree.className} min-h-screen bg-gray-100`}>
      <nav className="border-b border-gray-100 bg-white">
        <div className="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
          <div className="flex items-center gap-8">
            <Link href="/" className="text-lg font-bold text-emerald-600">
              FreshCart
            </Link>
            <Link href="/dashboard" className="text-sm font-medium text-gray-700 hover:text-gray-900">
              Dashboard
            </Link>
          </div>
          <div className="flex items-center gap-4 text-sm font-medium text-gray-500">
            <span>{profile?.full_name || user?.email}</span>
            <Link href="/profile" className="hover:text-gray-900">
              Profile
            </Link>
            <form action={signOut}>
              <button type="submit" className="hover:text-gray-900">
                Log Out
              </button>
            </form>
          </div>
        </div>
      </nav>
      <main className="py-6">{children}</main>
    </div>
  );
}
