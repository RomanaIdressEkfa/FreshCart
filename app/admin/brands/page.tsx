import { createClient } from "@/lib/supabase/server";
import { CrudModal, ModalTriggerButton, ModalEditButton } from "@/components/admin/CrudModal";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { BrandFormFields } from "./BrandFormFields";
import { upsertBrand, deleteBrand } from "./actions";
import type { Brand } from "@/types/database";

export default async function BrandsAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase.from("brands").select("*").order("created_at", { ascending: false });
  const brands = (data ?? []) as Brand[];

  return (
    <div className="container border border-light shadow p-4 rounded">
      <h3 className="text-primary mb-4 text-center fw-bold">ALL BRAND LIST</h3>

      <table className="table table-bordered rounded table-sm">
        <thead>
          <tr>
            <th className="bg-dark bg-gradient text-white">ID</th>
            <th className="bg-dark bg-gradient text-white">NAME</th>
            <th className="bg-dark bg-gradient text-white">LOGO</th>
            <th className="bg-dark bg-gradient text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>
          {brands.map((brand) => (
            <tr key={brand.id}>
              <td>{brand.id}</td>
              <td>{brand.name}</td>
              <td>
                {brand.image && (
                  <img src={brand.image} alt={brand.name} style={{ width: 48, height: 48, objectFit: "cover" }} />
                )}
              </td>
              <td>
                <div className="d-flex gap-2 align-items-center">
                  <ModalEditButton target={`edit-brand-${brand.id}`} />
                  <DeleteButton action={deleteBrand.bind(null, brand.id)} />
                </div>
              </td>
            </tr>
          ))}
          {brands.length === 0 && (
            <tr>
              <td colSpan={4} className="text-center text-muted">
                No brands yet.
              </td>
            </tr>
          )}
        </tbody>
      </table>

      <ModalTriggerButton target="create-brand" label="Add Brand" />

      <CrudModal id="create-brand" title="Create New Brand" action={upsertBrand} submitLabel="Add new Brand">
        <BrandFormFields />
      </CrudModal>

      {brands.map((brand) => (
        <CrudModal key={brand.id} id={`edit-brand-${brand.id}`} title="Edit Brand" action={upsertBrand} submitLabel="Save changes">
          <input type="hidden" name="id" value={brand.id} />
          <BrandFormFields brand={brand} />
        </CrudModal>
      ))}
    </div>
  );
}
