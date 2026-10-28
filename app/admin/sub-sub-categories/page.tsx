import { createClient } from "@/lib/supabase/server";
import { CrudModal, ModalTriggerButton, ModalEditButton } from "@/components/admin/CrudModal";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { SubSubCategoryFormFields } from "./SubSubCategoryFormFields";
import { upsertSubSubCategory, deleteSubSubCategory } from "./actions";
import type { SubSubCategory } from "@/types/database";

type Row = SubSubCategory & {
  categories: { name: string } | null;
  sub_categories: { name: string } | null;
};

export default async function SubSubCategoriesAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase
    .from("sub_sub_categories")
    .select("*, categories(name), sub_categories(name)")
    .order("created_at", { ascending: false });
  const rows = (data ?? []) as unknown as Row[];

  return (
    <div className="container border border-light shadow p-4 rounded">
      <h3 className="text-primary mb-4 text-center fw-bold">ALL SUB-SUB-CATEGORY LIST</h3>

      <table className="table table-bordered rounded table-sm">
        <thead>
          <tr>
            <th className="bg-dark bg-gradient text-white">ID</th>
            <th className="bg-dark bg-gradient text-white">NAME</th>
            <th className="bg-dark bg-gradient text-white">CATEGORY</th>
            <th className="bg-dark bg-gradient text-white">SUB-CATEGORY</th>
            <th className="bg-dark bg-gradient text-white">IMAGE</th>
            <th className="bg-dark bg-gradient text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>
          {rows.map((item) => (
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>{item.name}</td>
              <td>{item.categories?.name}</td>
              <td>{item.sub_categories?.name}</td>
              <td>
                {item.image && (
                  <img src={item.image} alt={item.name} style={{ width: 48, height: 48, objectFit: "cover" }} />
                )}
              </td>
              <td>
                <div className="d-flex gap-2 align-items-center">
                  <ModalEditButton target={`edit-subsubcategory-${item.id}`} />
                  <DeleteButton action={deleteSubSubCategory.bind(null, item.id)} />
                </div>
              </td>
            </tr>
          ))}
          {rows.length === 0 && (
            <tr>
              <td colSpan={6} className="text-center text-muted">
                No sub-sub-categories yet.
              </td>
            </tr>
          )}
        </tbody>
      </table>

      <ModalTriggerButton target="create-subsubcategory" label="Add Sub-sub-category" />

      <CrudModal
        id="create-subsubcategory"
        title="Create New Sub-sub-category"
        action={upsertSubSubCategory}
        submitLabel="Add new Sub-sub-category"
      >
        <SubSubCategoryFormFields />
      </CrudModal>

      {rows.map((item) => (
        <CrudModal
          key={item.id}
          id={`edit-subsubcategory-${item.id}`}
          title="Edit Sub-sub-category"
          action={upsertSubSubCategory}
          submitLabel="Save changes"
        >
          <input type="hidden" name="id" value={item.id} />
          <SubSubCategoryFormFields subSubCategory={item} />
        </CrudModal>
      ))}
    </div>
  );
}
