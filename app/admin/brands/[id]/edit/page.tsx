import { notFound } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { BrandForm } from "../../BrandForm";
import type { Brand } from "@/types/database";

export default async function EditBrandPage({
  params,
}: {
  params: Promise<{ id: string }>;
}) {
  const { id } = await params;
  const supabase = await createClient();
  const { data } = await supabase.from("brands").select("*").eq("id", id).single();
  if (!data) notFound();

  return (
    <div>
      <h1 className="mb-6 text-2xl font-bold text-slate-800">Edit brand</h1>
      <BrandForm brand={data as Brand} />
    </div>
  );
}
