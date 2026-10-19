import Image from "next/image";
import Link from "next/link";
import { createClient } from "@/lib/supabase/server";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { deleteSubSubCategory } from "./actions";

type Row = {
  id: number;
  name: string;
  image: string | null;
  categories: { name: string } | null;
  sub_categories: { name: string } | null;
};

export default async function SubSubCategoriesAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase
    .from("sub_sub_categories")
    .select("id, name, image, categories(name), sub_categories(name)")
    .order("created_at", { ascending: false });
  const rows = (data ?? []) as unknown as Row[];

  return (
    <div>
      <div className="flex items-center justify-between">
        <h1 className="text-2xl font-bold text-slate-800">Sub-sub-categories</h1>
        <Link
          href="/admin/sub-sub-categories/new"
          className="rounded-md bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700"
        >
          New sub-sub-category
        </Link>
      </div>

      <div className="mt-6 overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table className="w-full text-left text-sm">
          <thead className="bg-slate-50 text-slate-500">
            <tr>
              <th className="p-3">Image</th>
              <th className="p-3">Name</th>
              <th className="p-3">Category</th>
              <th className="p-3">Sub-category</th>
              <th className="p-3" />
            </tr>
          </thead>
          <tbody className="divide-y divide-slate-100">
            {rows.map((item) => (
              <tr key={item.id}>
                <td className="p-3">
                  {item.image ? (
                    <Image src={item.image} alt={item.name} width={40} height={40} className="h-10 w-10 rounded-md object-cover" />
                  ) : (
                    <div className="h-10 w-10 rounded-md bg-slate-100" />
                  )}
                </td>
                <td className="p-3 font-medium text-slate-800">{item.name}</td>
                <td className="p-3 text-slate-500">{item.categories?.name}</td>
                <td className="p-3 text-slate-500">{item.sub_categories?.name}</td>
                <td className="p-3 text-right">
                  <div className="flex items-center justify-end gap-3">
                    <Link href={`/admin/sub-sub-categories/${item.id}/edit`} className="font-medium text-emerald-600 hover:underline">
                      Edit
                    </Link>
                    <DeleteButton action={deleteSubSubCategory.bind(null, item.id)} />
                  </div>
                </td>
              </tr>
            ))}
            {rows.length === 0 && (
              <tr>
                <td colSpan={5} className="p-6 text-center text-slate-400">
                  No sub-sub-categories yet.
                </td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
    </div>
  );
}
