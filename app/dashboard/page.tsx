import Link from "next/link";
import { redirect } from "next/navigation";
import { getCurrentProfile } from "@/lib/supabase/server";

export default async function DashboardPage() {
  const { user, profile } = await getCurrentProfile();
  if (!user) redirect("/login?next=/dashboard");

  return (
    <div className="mx-auto max-w-2xl px-4 py-12">
      <h1 className="text-2xl font-bold text-slate-800">
        Welcome back, {profile?.full_name || user.email}
      </h1>
      <p className="mt-2 text-slate-500">Manage your account from here.</p>

      <div className="mt-6 flex flex-col gap-3 sm:flex-row">
        <Link
          href="/profile"
          className="rounded-md border border-slate-300 px-4 py-2 text-center font-medium text-slate-700 hover:bg-slate-50"
        >
          Edit profile
        </Link>
        {profile?.is_admin && (
          <Link
            href="/admin"
            className="rounded-md bg-emerald-600 px-4 py-2 text-center font-medium text-white hover:bg-emerald-700"
          >
            Go to admin panel
          </Link>
        )}
      </div>
    </div>
  );
}
