"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { uploadImage } from "@/lib/upload-image";

export async function upsertBrand(formData: FormData) {
  const idValue = formData.get("id");
  const id = idValue ? Number(idValue) : null;
  const supabase = await createClient();

  let existingImage: string | null = null;
  if (id) {
    const { data } = await supabase.from("brands").select("image").eq("id", id).single();
    existingImage = data?.image ?? null;
  }

  const image = await uploadImage(supabase, formData.get("image") as File, "brands", existingImage);

  const payload = {
    name: String(formData.get("name") || ""),
    image,
  };

  const { error } = id
    ? await supabase.from("brands").update(payload).eq("id", id)
    : await supabase.from("brands").insert(payload);
  if (error) throw new Error(error.message);

  revalidatePath("/admin/brands");
  redirect("/admin/brands");
}

export async function deleteBrand(id: number) {
  const supabase = await createClient();
  const { error } = await supabase.from("brands").delete().eq("id", id);
  if (error) throw new Error(error.message);
  revalidatePath("/admin/brands");
}
