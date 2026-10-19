import { redirect } from "next/navigation";
import { getCurrentProfile } from "@/lib/supabase/server";
import { ProfileForm } from "./ProfileForm";

export default async function ProfilePage() {
  const { user, profile } = await getCurrentProfile();
  if (!user) redirect("/login?next=/profile");

  return (
    <div className="mx-auto max-w-md px-4 py-12">
      <h1 className="mb-6 text-2xl font-bold text-slate-800">Edit profile</h1>
      <ProfileForm fullName={profile?.full_name || ""} email={user.email || ""} />
    </div>
  );
}
