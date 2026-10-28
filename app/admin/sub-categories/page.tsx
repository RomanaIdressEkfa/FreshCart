import { createClient } from "@/lib/supabase/server";
import { CrudModal, ModalTriggerButton, ModalEditButton } from "@/components/admin/CrudModal";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { SubCategoryFormFields } from "./SubCategoryFormFields";
import { upsertSubCategory, deleteSubCategory } from "./actions";
import type { SubCategory } from "@/types/database";

type Row = SubCategory & { categories: { name: string } | null };

export default async function SubCategoriesAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase
    .from("sub_categories")
    .select("*, categories(name)")
    .order("created_at", { ascending: false });
  const subCategories = (data ?? []) as unknown as Row[];

  return (
    <div className="container border border-light shadow p-4 rounded">
      <h3 className="text-primary mb-4 text-center fw-bold">ALL SUB-CATEGORY LIST</h3>

      <table className="table table-bordered rounded table-sm">
        <thead>
          <tr>
            <th className="bg-dark bg-gradient text-white">ID</th>
            <th className="bg-dark bg-gradient text-white">NAME</th>
            <th className="bg-dark bg-gradient text-white">CATEGORY</th>
            <th className="bg-dark bg-gradient text-white">IMAGE</th>
            <th className="bg-dark bg-gradient text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>
          {subCategories.map((item) => (
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>{item.name}</td>
              <td>{item.categories?.name}</td>
              <td>
                {item.image && (
                  <img src={item.image} alt={item.name} style={{ width: 48, height: 48, objectFit: "cover" }} />
                )}
              </td>
              <td>
                <div className="d-flex gap-2 align-items-center">
                  <ModalEditButton target={`edit-subcategory-${item.id}`} />
                  <DeleteButton action={deleteSubCategory.bind(null, item.id)} />
                </div>
              </td>
            </tr>
          ))}
          {subCategories.length === 0 && (
            <tr>
              <td colSpan={5} className="text-center text-muted">
                No sub-categories yet.
              </td>
            </tr>
          )}
        </tbody>
      </table>

      <ModalTriggerButton target="create-subcategory" label="Add Sub-category" />

      <CrudModal
        id="create-subcategory"
        title="Create New Sub-category"
        action={upsertSubCategory}
        submitLabel="Add new Sub-category"
      >
        <SubCategoryFormFields />
      </CrudModal>

      {subCategories.map((item) => (
        <CrudModal
          key={item.id}
          id={`edit-subcategory-${item.id}`}
          title="Edit Sub-category"
          action={upsertSubCategory}
          submitLabel="Save changes"
        >
          <input type="hidden" name="id" value={item.id} />
          <SubCategoryFormFields subCategory={item} />
        </CrudModal>
      ))}
    </div>
  );
}
