import type { SupabaseClient } from "@supabase/supabase-js";

export async function uploadImage(
  supabase: SupabaseClient,
  file: File | null,
  folder: string,
  existingUrl?: string | null,
): Promise<string | null> {
  if (!file || file.size === 0) return existingUrl ?? null;

  const ext = file.name.split(".").pop() || "jpg";
  const path = `${folder}/${Date.now()}-${Math.random().toString(36).slice(2)}.${ext}`;

  const { error } = await supabase.storage.from("images").upload(path, file, {
    cacheControl: "3600",
    upsert: false,
  });
  if (error) throw new Error(error.message);

  const { data } = supabase.storage.from("images").getPublicUrl(path);
  return data.publicUrl;
}
