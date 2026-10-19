"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { uploadImage } from "@/lib/upload-image";

export async function upsertSubCategory(formData: FormData) {
  const idValue = formData.get("id");
  const id = idValue ? Number(idValue) : null;
  const supabase = await createClient();

  let existingImage: string | null = null;
  if (id) {
    const { data } = await supabase.from("sub_categories").select("image").eq("id", id).single();
    existingImage = data?.image ?? null;
  }

  const image = await uploadImage(
    supabase,
    formData.get("image") as File,
    "sub-categories",
    existingImage,
  );

  const payload = {
    category_id: Number(formData.get("category_id")),
    name: String(formData.get("name") || ""),
    heading: String(formData.get("heading") || "") || null,
    topbar_description: String(formData.get("topbar_description") || "") || null,
    bottom_description: String(formData.get("bottom_description") || "") || null,
    meta_title: String(formData.get("meta_title") || "") || null,
    meta_url: String(formData.get("meta_url") || "") || null,
    image,
  };

  const { error } = id
    ? await supabase.from("sub_categories").update(payload).eq("id", id)
    : await supabase.from("sub_categories").insert(payload);
  if (error) throw new Error(error.message);

  revalidatePath("/admin/sub-categories");
  redirect("/admin/sub-categories");
}

export async function deleteSubCategory(id: number) {
  const supabase = await createClient();
  const { error } = await supabase.from("sub_categories").delete().eq("id", id);
  if (error) throw new Error(error.message);
  revalidatePath("/admin/sub-categories");
}
