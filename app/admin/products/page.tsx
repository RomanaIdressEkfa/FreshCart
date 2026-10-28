import { createClient } from "@/lib/supabase/server";
import { CrudModal, ModalTriggerButton, ModalEditButton } from "@/components/admin/CrudModal";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { formatPrice } from "@/lib/format";
import { ProductFormFields } from "./ProductFormFields";
import { upsertProduct, deleteProduct } from "./actions";
import type { Product } from "@/types/database";

type Row = Product & { categories: { name: string } | null };

export default async function ProductsAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase
    .from("products")
    .select("*, categories(name)")
    .order("created_at", { ascending: false });
  const products = (data ?? []) as unknown as Row[];

  return (
    <div className="container border border-light shadow p-4 rounded">
      <h3 className="text-primary mb-4 text-center fw-bold">ALL PRODUCT LIST</h3>

      <table className="table table-bordered rounded table-sm">
        <thead>
          <tr>
            <th className="bg-dark bg-gradient text-white">ID</th>
            <th className="bg-dark bg-gradient text-white">IMAGE</th>
            <th className="bg-dark bg-gradient text-white">NAME</th>
            <th className="bg-dark bg-gradient text-white">CATEGORY</th>
            <th className="bg-dark bg-gradient text-white">PRICE</th>
            <th className="bg-dark bg-gradient text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>
          {products.map((item) => (
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>
                {item.image && (
                  <img src={item.image} alt={item.name} style={{ width: 48, height: 48, objectFit: "cover" }} />
                )}
              </td>
              <td>{item.name}</td>
              <td>{item.categories?.name}</td>
              <td>{formatPrice(item.sale_price ?? item.regular_price)}</td>
              <td>
                <div className="d-flex gap-2 align-items-center">
                  <ModalEditButton target={`edit-product-${item.id}`} />
                  <DeleteButton action={deleteProduct.bind(null, item.id)} />
                </div>
              </td>
            </tr>
          ))}
          {products.length === 0 && (
            <tr>
              <td colSpan={6} className="text-center text-muted">
                No products yet.
              </td>
            </tr>
          )}
        </tbody>
      </table>

      <ModalTriggerButton target="create-product" label="Add Product" />

      <CrudModal id="create-product" title="Create New Product" action={upsertProduct} submitLabel="Add new Product">
        <ProductFormFields />
      </CrudModal>

      {products.map((item) => (
        <CrudModal
          key={item.id}
          id={`edit-product-${item.id}`}
          title="Edit Product"
          action={upsertProduct}
          submitLabel="Save changes"
        >
          <input type="hidden" name="id" value={item.id} />
          <ProductFormFields product={item} />
        </CrudModal>
      ))}
    </div>
  );
}
