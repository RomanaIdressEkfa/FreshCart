import { notFound } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { ProductForm } from "../../ProductForm";
import type { Product } from "@/types/database";

export default async function EditProductPage({
  params,
}: {
  params: Promise<{ id: string }>;
}) {
  const { id } = await params;
  const supabase = await createClient();
  const { data } = await supabase.from("products").select("*").eq("id", id).single();
  if (!data) notFound();

  return (
    <div>
      <h1 className="mb-6 text-2xl font-bold text-slate-800">Edit product</h1>
      <ProductForm product={data as Product} />
    </div>
  );
}
