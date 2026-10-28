import Link from "next/link";
import { redirect } from "next/navigation";
import { getCurrentProfile } from "@/lib/supabase/server";

export default async function DashboardPage() {
  const { user, profile } = await getCurrentProfile();
  if (!user) redirect("/login?next=/dashboard");

  return (
    <>
      <header className="border-b border-gray-100 bg-white shadow-sm">
        <div className="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
          <h2 className="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </div>
      </header>

      <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div className="overflow-hidden rounded-lg bg-white p-6 shadow-sm">
          <p className="text-gray-900">
            You&apos;re logged in as <strong>{profile?.full_name || user.email}</strong>.
          </p>
          <div className="mt-4 flex flex-col gap-3 sm:flex-row">
            <Link
              href="/profile"
              className="rounded-md border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
              Edit profile
            </Link>
            {profile?.is_admin && (
              <Link
                href="/admin"
                className="rounded-md bg-emerald-600 px-4 py-2 text-center text-sm font-medium text-white hover:bg-emerald-700"
              >
                Go to admin panel
              </Link>
            )}
          </div>
        </div>
      </div>
    </>
  );
}
