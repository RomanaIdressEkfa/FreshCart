"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { uploadImage } from "@/lib/upload-image";

export async function upsertCategory(formData: FormData) {
  const idValue = formData.get("id");
  const id = idValue ? Number(idValue) : null;
  const supabase = await createClient();

  let existingImage: string | null = null;
  if (id) {
    const { data } = await supabase.from("categories").select("image").eq("id", id).single();
    existingImage = data?.image ?? null;
  }

  const image = await uploadImage(
    supabase,
    formData.get("image") as File,
    "categories",
    existingImage,
  );

  const payload = {
    name: String(formData.get("name") || ""),
    description: String(formData.get("description") || "") || null,
    meta_title: String(formData.get("meta_title") || "") || null,
    svg_code: String(formData.get("svg_code") || "") || null,
    image,
  };

  const { error } = id
    ? await supabase.from("categories").update(payload).eq("id", id)
    : await supabase.from("categories").insert(payload);
  if (error) throw new Error(error.message);

  revalidatePath("/admin/categories");
  redirect("/admin/categories");
}

export async function deleteCategory(id: number) {
  const supabase = await createClient();
  const { error } = await supabase.from("categories").delete().eq("id", id);
  if (error) throw new Error(error.message);
  revalidatePath("/admin/categories");
}
