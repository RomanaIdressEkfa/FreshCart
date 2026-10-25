import { redirect } from "next/navigation";
import { getCurrentProfile } from "@/lib/supabase/server";
import { ProfileForm } from "./ProfileForm";

export default async function ProfilePage() {
  const { user, profile } = await getCurrentProfile();
  if (!user) redirect("/login?next=/profile");

  return (
    <>
      <header className="border-b border-gray-100 bg-white shadow-sm">
        <div className="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
          <h2 className="text-xl font-semibold leading-tight text-gray-800">Profile</h2>
        </div>
      </header>

      <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div className="max-w-xl rounded-lg bg-white p-6 shadow-sm">
          <ProfileForm fullName={profile?.full_name || ""} email={user.email || ""} />
        </div>
      </div>
    </>
  );
}
