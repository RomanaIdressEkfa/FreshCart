import Image from "next/image";
import Link from "next/link";
import { createClient } from "@/lib/supabase/server";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { deleteBrand } from "./actions";
import type { Brand } from "@/types/database";

export default async function BrandsAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase.from("brands").select("*").order("created_at", { ascending: false });
  const brands = (data ?? []) as Brand[];

  return (
    <div>
      <div className="flex items-center justify-between">
        <h1 className="text-2xl font-bold text-slate-800">Brands</h1>
        <Link
          href="/admin/brands/new"
          className="rounded-md bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700"
        >
          New brand
        </Link>
      </div>

      <div className="mt-6 overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table className="w-full text-left text-sm">
          <thead className="bg-slate-50 text-slate-500">
            <tr>
              <th className="p-3">Logo</th>
              <th className="p-3">Name</th>
              <th className="p-3" />
            </tr>
          </thead>
          <tbody className="divide-y divide-slate-100">
            {brands.map((brand) => (
              <tr key={brand.id}>
                <td className="p-3">
                  {brand.image ? (
                    <Image src={brand.image} alt={brand.name} width={40} height={40} className="h-10 w-10 rounded-md object-cover" />
                  ) : (
                    <div className="h-10 w-10 rounded-md bg-slate-100" />
                  )}
                </td>
                <td className="p-3 font-medium text-slate-800">{brand.name}</td>
                <td className="p-3 text-right">
                  <div className="flex items-center justify-end gap-3">
                    <Link href={`/admin/brands/${brand.id}/edit`} className="font-medium text-emerald-600 hover:underline">
                      Edit
                    </Link>
                    <DeleteButton action={deleteBrand.bind(null, brand.id)} />
                  </div>
                </td>
              </tr>
            ))}
            {brands.length === 0 && (
              <tr>
                <td colSpan={3} className="p-6 text-center text-slate-400">
                  No brands yet.
                </td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
    </div>
  );
}
