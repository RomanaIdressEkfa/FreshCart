import { ImageField } from "@/components/admin/ImageField";
import { CategorySubCategoryFields } from "@/components/admin/CategorySubCategoryFields";
import { createClient } from "@/lib/supabase/server";
import { upsertSubSubCategory } from "./actions";
import type { SubSubCategory } from "@/types/database";

export async function SubSubCategoryForm({
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
    <form action={upsertSubSubCategory} className="flex max-w-lg flex-col gap-3">
      {subSubCategory && <input type="hidden" name="id" value={subSubCategory.id} />}
      <CategorySubCategoryFields
        categories={categories ?? []}
        subCategories={subCategories ?? []}
        defaultCategoryId={subSubCategory?.category_id}
        defaultSubCategoryId={subSubCategory?.sub_category_id}
      />
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Name
        <input
          name="name"
          required
          defaultValue={subSubCategory?.name}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <ImageField name="image" label="Image" defaultImage={subSubCategory?.image} />
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Topbar heading
        <input
          name="topbar_heading"
          defaultValue={subSubCategory?.topbar_heading ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Topbar description
        <textarea
          name="topbar_description"
          defaultValue={subSubCategory?.topbar_description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={2}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Bottom description
        <textarea
          name="bottom_description"
          defaultValue={subSubCategory?.bottom_description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={2}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Meta title
        <input
          name="meta_title"
          defaultValue={subSubCategory?.meta_title ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Meta URL
        <input
          name="meta_url"
          defaultValue={subSubCategory?.meta_url ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Total product (free text)
        <input
          name="total_product"
          defaultValue={subSubCategory?.total_product ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <button
        type="submit"
        className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700"
      >
        {subSubCategory ? "Save changes" : "Create sub-sub-category"}
      </button>
    </form>
  );
}
