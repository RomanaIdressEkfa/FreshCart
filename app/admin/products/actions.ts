"use server";

import { revalidatePath } from "next/cache";
import { redirect } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { uploadImage } from "@/lib/upload-image";

function optionalInt(formData: FormData, key: string) {
  const value = formData.get(key);
  if (!value || value === "") return null;
  return Number(value);
}

function optionalText(formData: FormData, key: string) {
  const value = String(formData.get(key) || "");
  return value === "" ? null : value;
}

export async function upsertProduct(formData: FormData) {
  const idValue = formData.get("id");
  const id = idValue ? Number(idValue) : null;
  const supabase = await createClient();

  let existingImage: string | null = null;
  if (id) {
    const { data } = await supabase.from("products").select("image").eq("id", id).single();
    existingImage = data?.image ?? null;
  }

  const image = await uploadImage(supabase, formData.get("image") as File, "products", existingImage);

  const payload = {
    category_id: Number(formData.get("category_id")),
    sub_category_id: optionalInt(formData, "sub_category_id"),
    sub_sub_category_id: optionalInt(formData, "sub_sub_category_id"),
    brand_id: optionalInt(formData, "brand_id"),
    name: String(formData.get("name") || ""),
    description: optionalText(formData, "description"),
    discount: optionalText(formData, "discount"),
    rating: optionalInt(formData, "rating"),
    regular_price: optionalInt(formData, "regular_price"),
    sale_price: optionalInt(formData, "sale_price"),
    product_status: optionalText(formData, "product_status"),
    product_code: optionalText(formData, "product_code"),
    key_features: optionalText(formData, "key_features"),
    slug: optionalText(formData, "slug"),
    meta_title: optionalText(formData, "meta_title"),
    meta_url: optionalText(formData, "meta_url"),
    topbar_heading: optionalText(formData, "topbar_heading"),
    topbar_description: optionalText(formData, "topbar_description"),
    bottom_description: optionalText(formData, "bottom_description"),
    is_best_seller: formData.get("is_best_seller") === "on",
    sale_end_date: optionalText(formData, "sale_end_date"),
    image,
  };

  const { error } = id
    ? await supabase.from("products").update(payload).eq("id", id)
    : await supabase.from("products").insert(payload);
  if (error) throw new Error(error.message);

  revalidatePath("/admin/products");
  redirect("/admin/products");
}

export async function deleteProduct(id: number) {
  const supabase = await createClient();
  const { error } = await supabase.from("products").delete().eq("id", id);
  if (error) throw new Error(error.message);
  revalidatePath("/admin/products");
}
