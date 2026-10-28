import { createClient } from "@/lib/supabase/server";
import { CrudModal, ModalTriggerButton, ModalEditButton } from "@/components/admin/CrudModal";
import { DeleteButton } from "@/components/admin/DeleteButton";
import { CategoryFormFields } from "./CategoryFormFields";
import { upsertCategory, deleteCategory } from "./actions";
import type { Category } from "@/types/database";

export default async function CategoriesAdminPage() {
  const supabase = await createClient();
  const { data } = await supabase.from("categories").select("*").order("created_at", { ascending: false });
  const categories = (data ?? []) as Category[];

  return (
    <div className="container border border-light shadow p-4 rounded">
      <h3 className="text-primary mb-4 text-center fw-bold">ALL CATEGORY LIST</h3>

      <table className="table table-bordered rounded table-sm">
        <thead>
          <tr>
            <th className="bg-dark bg-gradient text-white">ID</th>
            <th className="bg-dark bg-gradient text-white">NAME</th>
            <th className="bg-dark bg-gradient text-white">IMAGE</th>
            <th className="bg-dark bg-gradient text-white">DESCRIPTION</th>
            <th className="bg-dark bg-gradient text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>
          {categories.map((category) => (
            <tr key={category.id}>
              <td>{category.id}</td>
              <td>{category.name}</td>
              <td>
                {category.svg_code ? (
                  <span dangerouslySetInnerHTML={{ __html: category.svg_code }} />
                ) : category.image ? (
                  <img src={category.image} alt={category.name} style={{ width: 48, height: 48, objectFit: "cover" }} />
                ) : null}
              </td>
              <td>{category.description}</td>
              <td>
                <div className="d-flex gap-2 align-items-center">
                  <ModalEditButton target={`edit-category-${category.id}`} />
                  <DeleteButton action={deleteCategory.bind(null, category.id)} />
                </div>
              </td>
            </tr>
          ))}
          {categories.length === 0 && (
            <tr>
              <td colSpan={5} className="text-center text-muted">
                No categories yet.
              </td>
            </tr>
          )}
        </tbody>
      </table>

      <ModalTriggerButton target="create-category" label="Add Category" />

      <CrudModal id="create-category" title="Create New Category" action={upsertCategory} submitLabel="Add new Category">
        <CategoryFormFields />
      </CrudModal>

      {categories.map((category) => (
        <CrudModal
          key={category.id}
          id={`edit-category-${category.id}`}
          title="Edit Category"
          action={upsertCategory}
          submitLabel="Save changes"
        >
          <input type="hidden" name="id" value={category.id} />
          <CategoryFormFields category={category} />
        </CrudModal>
      ))}
    </div>
  );
}
