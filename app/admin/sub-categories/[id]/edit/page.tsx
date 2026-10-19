import { notFound } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { SubCategoryForm } from "../../SubCategoryForm";
import type { SubCategory } from "@/types/database";

export default async function EditSubCategoryPage({
  params,
}: {
  params: Promise<{ id: string }>;
}) {
  const { id } = await params;
  const supabase = await createClient();
  const { data } = await supabase.from("sub_categories").select("*").eq("id", id).single();
  if (!data) notFound();

  return (
    <div>
      <h1 className="mb-6 text-2xl font-bold text-slate-800">Edit sub-category</h1>
      <SubCategoryForm subCategory={data as SubCategory} />
    </div>
  );
}
