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
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Category</label>
        <select
          name="category_id"
          required
          value={categoryId}
          onChange={(e) => setCategoryId(Number(e.target.value))}
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
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Sub-category</label>
        <select
          key={categoryId}
          name="sub_category_id"
          required
          defaultValue={defaultSubCategoryId}
          className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        >
          <option value="">Select a sub-category</option>
          {filteredSubCategories.map((sub) => (
            <option key={sub.id} value={sub.id}>
              {sub.name}
            </option>
          ))}
        </select>
      </div>
    </>
  );
}
