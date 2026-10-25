import { CategorySubCategoryFields } from "@/components/admin/CategorySubCategoryFields";
import { createClient } from "@/lib/supabase/server";
import type { SubSubCategory } from "@/types/database";

export async function SubSubCategoryFormFields({
  subSubCategory,
}: {
  subSubCategory?: SubSubCategory;
}) {
  const supabase = await createClient();
  const [{ data: categories }, { data: subCategories }] = await Promise.all([
    supabase.from("categories").select("id, name").order("name"),
    supabase.from("sub_categories").select("id, name, category_id").order("name"),
  ]);

  return (
    <div className="grid gap-4 mb-4 grid-cols-2">
      <div className="col-span-2 grid grid-cols-2 gap-4">
        <CategorySubCategoryFields
          categories={categories ?? []}
          subCategories={subCategories ?? []}
          defaultCategoryId={subSubCategory?.category_id}
          defaultSubCategoryId={subSubCategory?.sub_category_id}
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input
          type="text"
          name="name"
          required
          defaultValue={subSubCategory?.name}
          className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-0 text-sm font-medium text-gray-900">Image</label>
        <input
          type="file"
          name="image"
          accept="image/*"
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Topbar heading</label>
        <input
          name="topbar_heading"
          defaultValue={subSubCategory?.topbar_heading ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Topbar description</label>
        <textarea
          name="topbar_description"
          rows={2}
          defaultValue={subSubCategory?.topbar_description ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Bottom description</label>
        <textarea
          name="bottom_description"
          rows={2}
          defaultValue={subSubCategory?.bottom_description ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta title</label>
        <input
          name="meta_title"
          defaultValue={subSubCategory?.meta_title ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta URL</label>
        <input
          name="meta_url"
          defaultValue={subSubCategory?.meta_url ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Total product (free text)</label>
        <input
          name="total_product"
          defaultValue={subSubCategory?.total_product ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
    </div>
  );
}
