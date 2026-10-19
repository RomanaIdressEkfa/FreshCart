"use client";

import { useState } from "react";

type Category = { id: number; name: string };
type SubCategory = Category & { category_id: number };
type SubSubCategory = Category & { category_id: number; sub_category_id: number };

export function ProductCategoryFields({
  categories,
  subCategories,
  subSubCategories,
  defaultCategoryId,
  defaultSubCategoryId,
  defaultSubSubCategoryId,
}: {
  categories: Category[];
  subCategories: SubCategory[];
  subSubCategories: SubSubCategory[];
  defaultCategoryId?: number | null;
  defaultSubCategoryId?: number | null;
  defaultSubSubCategoryId?: number | null;
}) {
  const [categoryId, setCategoryId] = useState<number | "">(defaultCategoryId ?? "");
  const [subCategoryId, setSubCategoryId] = useState<number | "">(defaultSubCategoryId ?? "");

  const filteredSubCategories = subCategories.filter((s) => s.category_id === categoryId);
  const filteredSubSubCategories = subSubCategories.filter(
    (s) => s.sub_category_id === subCategoryId,
  );

  return (
    <>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Category
        <select
          name="category_id"
          required
          value={categoryId}
          onChange={(e) => {
            setCategoryId(Number(e.target.value));
            setSubCategoryId("");
          }}
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
        Sub-category (optional)
        <select
          key={`sub-${categoryId}`}
          name="sub_category_id"
          value={subCategoryId}
          onChange={(e) => setSubCategoryId(e.target.value ? Number(e.target.value) : "")}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        >
          <option value="">None</option>
          {filteredSubCategories.map((sub) => (
            <option key={sub.id} value={sub.id}>
              {sub.name}
            </option>
          ))}
        </select>
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Sub-sub-category (optional)
        <select
          key={`subsub-${subCategoryId}`}
          name="sub_sub_category_id"
          defaultValue={defaultSubSubCategoryId ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        >
          <option value="">None</option>
          {filteredSubSubCategories.map((subSub) => (
            <option key={subSub.id} value={subSub.id}>
              {subSub.name}
            </option>
          ))}
        </select>
      </label>
    </>
  );
}
