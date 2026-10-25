"use server";

import { revalidatePath } from "next/cache";
import { createClient } from "@/lib/supabase/server";

export type ProfileState = { error: string | null; success: boolean };

export async function updateProfile(
  _prevState: ProfileState,
  formData: FormData,
): Promise<ProfileState> {
  const fullName = String(formData.get("full_name") || "");
  const email = String(formData.get("email") || "");
  const password = String(formData.get("password") || "");

  const supabase = await createClient();
  const { data: auth } = await supabase.auth.getUser();
  if (!auth.user) return { error: "Not signed in", success: false };

  const { error: profileError } = await supabase
    .from("profiles")
    .update({ full_name: fullName })
    .eq("id", auth.user.id);
  if (profileError) return { error: profileError.message, success: false };

  const updates: { email?: string; password?: string } = {};
  if (email && email !== auth.user.email) updates.email = email;
  if (password) updates.password = password;

  if (Object.keys(updates).length > 0) {
    const { error: authError } = await supabase.auth.updateUser(updates);
    if (authError) return { error: authError.message, success: false };
  }

  revalidatePath("/profile");
  return { error: null, success: true };
}
