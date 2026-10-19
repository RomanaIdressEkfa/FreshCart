import { redirect } from "next/navigation";
import { getCurrentProfile } from "@/lib/supabase/server";
import { AdminSidebar } from "@/components/AdminSidebar";

export default async function AdminLayout({ children }: { children: React.ReactNode }) {
  const { user, profile } = await getCurrentProfile();

  if (!user) redirect("/login?next=/admin");
  if (!profile?.is_admin) redirect("/dashboard");

  return (
    <div className="mx-auto flex max-w-6xl flex-col sm:flex-row">
      <AdminSidebar />
      <div className="flex-1 p-4 sm:p-6">{children}</div>
    </div>
  );
}
