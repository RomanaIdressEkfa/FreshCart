import { ImageField } from "@/components/admin/ImageField";
import { createClient } from "@/lib/supabase/server";
import { upsertSubCategory } from "./actions";
import type { Category, SubCategory } from "@/types/database";

export async function SubCategoryForm({ subCategory }: { subCategory?: SubCategory }) {
  const supabase = await createClient();
  const { data } = await supabase.from("categories").select("id, name").order("name");
  const categories = (data ?? []) as Pick<Category, "id" | "name">[];

  return (
    <form action={upsertSubCategory} className="flex max-w-lg flex-col gap-3">
      {subCategory && <input type="hidden" name="id" value={subCategory.id} />}
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Category
        <select
          name="category_id"
          required
          defaultValue={subCategory?.category_id}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        >
          <option value="">Select a category</option>
          {categories.map((category) => (
            <option key={category.id} value={category.id}>
              {category.name}
            </option>
          ))}
        </select>
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Name
        <input
          name="name"
          required
          defaultValue={subCategory?.name}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <ImageField name="image" label="Image" defaultImage={subCategory?.image} />
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Heading
        <input
          name="heading"
          defaultValue={subCategory?.heading ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Topbar description
        <textarea
          name="topbar_description"
          defaultValue={subCategory?.topbar_description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={2}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Bottom description
        <textarea
          name="bottom_description"
          defaultValue={subCategory?.bottom_description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={2}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Meta title
        <input
          name="meta_title"
          defaultValue={subCategory?.meta_title ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Meta URL
        <input
          name="meta_url"
          defaultValue={subCategory?.meta_url ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <button
        type="submit"
        className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700"
      >
        {subCategory ? "Save changes" : "Create sub-category"}
      </button>
    </form>
  );
}
