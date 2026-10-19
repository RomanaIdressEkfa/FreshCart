"use client";

import { useState } from "react";

type Option = { id: number; name: string };
type SubOption = Option & { category_id: number };

export function CategorySubCategoryFields({
  categories,
  subCategories,
  defaultCategoryId,
  defaultSubCategoryId,
}: {
  categories: Option[];
  subCategories: SubOption[];
  defaultCategoryId?: number;
  defaultSubCategoryId?: number;
}) {
  const [categoryId, setCategoryId] = useState<number | "">(defaultCategoryId ?? "");
  const filteredSubCategories = subCategories.filter((sc) => sc.category_id === categoryId);

  return (
    <>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Category
        <select
          name="category_id"
          required
          value={categoryId}
          onChange={(e) => setCategoryId(Number(e.target.value))}
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
        Sub-category
        <select
          key={categoryId}
          name="sub_category_id"
          required
          defaultValue={defaultSubCategoryId}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        >
          <option value="">Select a sub-category</option>
          {filteredSubCategories.map((sub) => (
            <option key={sub.id} value={sub.id}>
              {sub.name}
            </option>
          ))}
        </select>
      </label>
    </>
  );
}
