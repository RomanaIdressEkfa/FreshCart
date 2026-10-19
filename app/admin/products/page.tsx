import Image from "next/image";
import Link from "next/link";
import { createClient } from "@/lib/supabase/server";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { formatPrice } from "@/lib/format";
import { deleteProduct } from "./actions";

type Row = {
  id: number;
  name: string;
  image: string | null;
  sale_price: number | null;
  regular_price: number | null;
  categories: { name: string } | null;
};

export default async function ProductsAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase
    .from("products")
    .select("id, name, image, sale_price, regular_price, categories(name)")
    .order("created_at", { ascending: false });
  const products = (data ?? []) as unknown as Row[];

  return (
    <div>
      <div className="flex items-center justify-between">
        <h1 className="text-2xl font-bold text-slate-800">Products</h1>
        <Link
          href="/admin/products/new"
          className="rounded-md bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700"
        >
          New product
        </Link>
      </div>

      <div className="mt-6 overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table className="w-full text-left text-sm">
          <thead className="bg-slate-50 text-slate-500">
            <tr>
              <th className="p-3">Image</th>
              <th className="p-3">Name</th>
              <th className="p-3">Category</th>
              <th className="p-3">Price</th>
              <th className="p-3" />
            </tr>
          </thead>
          <tbody className="divide-y divide-slate-100">
            {products.map((item) => (
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
                <td className="p-3 text-slate-500">{formatPrice(item.sale_price ?? item.regular_price)}</td>
                <td className="p-3 text-right">
                  <div className="flex items-center justify-end gap-3">
                    <Link href={`/admin/products/${item.id}/edit`} className="font-medium text-emerald-600 hover:underline">
                      Edit
                    </Link>
                    <DeleteButton action={deleteProduct.bind(null, item.id)} />
                  </div>
                </td>
              </tr>
            ))}
            {products.length === 0 && (
              <tr>
                <td colSpan={5} className="p-6 text-center text-slate-400">
                  No products yet.
                </td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
    </div>
  );
}
