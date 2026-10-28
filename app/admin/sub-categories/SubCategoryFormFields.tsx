import { createClient } from "@/lib/supabase/server";
import type { Category, SubCategory } from "@/types/database";

export async function SubCategoryFormFields({ subCategory }: { subCategory?: SubCategory }) {
  const supabase = await createClient();
  const { data } = await supabase.from("categories").select("id, name").order("name");
  const categories = (data ?? []) as Pick<Category, "id" | "name">[];

  return (
    <div className="grid gap-4 mb-4 grid-cols-2">
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Category</label>
        <select
          name="category_id"
          required
          defaultValue={subCategory?.category_id}
          className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        >
          <option value="">Select a category</option>
          {categories.map((category) => (
            <option key={category.id} value={category.id}>
              {category.name}
            </option>
          ))}
        </select>
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input
          type="text"
          name="name"
          required
          defaultValue={subCategory?.name}
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
        <label className="block mb-2 text-sm font-medium text-gray-900">Heading</label>
        <input
          name="heading"
          defaultValue={subCategory?.heading ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Topbar description</label>
        <textarea
          name="topbar_description"
          rows={2}
          defaultValue={subCategory?.topbar_description ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Bottom description</label>
        <textarea
          name="bottom_description"
          rows={2}
          defaultValue={subCategory?.bottom_description ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta title</label>
        <input
          name="meta_title"
          defaultValue={subCategory?.meta_title ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta URL</label>
        <input
          name="meta_url"
          defaultValue={subCategory?.meta_url ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
    </div>
  );
}
