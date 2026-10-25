"use server";

import { redirect } from "next/navigation";
import { createClient } from "@/lib/supabase/server";

export type RegisterState = { error: string | null; confirmEmail?: boolean };

export async function register(
  _prevState: RegisterState,
  formData: FormData,
): Promise<RegisterState> {
  const name = String(formData.get("name") || "");
  const email = String(formData.get("email") || "");
  const password = String(formData.get("password") || "");

  const supabase = await createClient();
  const { data, error } = await supabase.auth.signUp({
    email,
    password,
    options: { data: { full_name: name } },
  });

  if (error) return { error: error.message };

  if (!data.session) {
    return { error: null, confirmEmail: true };
  }

  redirect("/");
}
