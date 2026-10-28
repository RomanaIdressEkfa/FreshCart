import Script from "next/script";
import { redirect } from "next/navigation";
import { getCurrentProfile } from "@/lib/supabase/server";
import { AdminSidebar } from "@/components/AdminSidebar";

export default async function AdminLayout({ children }: { children: React.ReactNode }) {
  const { user, profile } = await getCurrentProfile();

  if (!user) redirect("/login?next=/admin");
  if (!profile?.is_admin) redirect("/dashboard");

  return (
    <>
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
      />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

      <div className="admin-shell mx-auto flex max-w-6xl flex-col sm:flex-row">
        <AdminSidebar />
        <div className="flex-1 p-4 sm:p-6">{children}</div>
      </div>

      <Script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        strategy="afterInteractive"
      />
      <Script
        src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"
        strategy="afterInteractive"
      />
    </>
  );
}
