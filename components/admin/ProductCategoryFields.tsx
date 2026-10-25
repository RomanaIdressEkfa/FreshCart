"use client";

import { useState } from "react";

type Category = { id: number; name: string };
type SubCategory = Category & { category_id: number };
type SubSubCategory = Category & { category_id: number; sub_category_id: number };

const selectClass =
  "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5";

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
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Category</label>
        <select
          name="category_id"
          required
          value={categoryId}
          onChange={(e) => {
            setCategoryId(Number(e.target.value));
            setSubCategoryId("");
          }}
          className={selectClass}
        >
          <option value="">Select a category</option>
          {categories.map((category) => (
            <option key={category.id} value={category.id}>
              {category.name}
            </option>
          ))}
        </select>
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Sub-category (optional)</label>
        <select
          key={`sub-${categoryId}`}
          name="sub_category_id"
          value={subCategoryId}
          onChange={(e) => setSubCategoryId(e.target.value ? Number(e.target.value) : "")}
          className={selectClass}
        >
          <option value="">None</option>
          {filteredSubCategories.map((sub) => (
            <option key={sub.id} value={sub.id}>
              {sub.name}
            </option>
          ))}
        </select>
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Sub-sub-category (optional)</label>
        <select
          key={`subsub-${subCategoryId}`}
          name="sub_sub_category_id"
          defaultValue={defaultSubSubCategoryId ?? ""}
          className={selectClass}
        >
          <option value="">None</option>
          {filteredSubSubCategories.map((subSub) => (
            <option key={subSub.id} value={subSub.id}>
              {subSub.name}
            </option>
          ))}
        </select>
      </div>
    </>
  );
}
