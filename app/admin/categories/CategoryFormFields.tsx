import type { Category } from "@/types/database";

export function CategoryFormFields({ category }: { category?: Category }) {
  return (
    <div className="grid gap-4 mb-4 grid-cols-2">
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input
          type="text"
          name="name"
          required
          defaultValue={category?.name}
          placeholder="Category name"
          className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Description</label>
        <textarea
          name="description"
          rows={3}
          defaultValue={category?.description ?? ""}
          placeholder="Write category description here"
          className="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-0 text-sm font-medium text-gray-900">Upload Image</label>
        <input
          type="file"
          name="image"
          accept="image/*"
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-0 text-sm font-medium text-gray-900">Or paste SVG code</label>
        <textarea
          name="svg_code"
          rows={3}
          defaultValue={category?.svg_code ?? ""}
          placeholder="<svg>...</svg>"
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 font-mono"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta title</label>
        <input
          name="meta_title"
          defaultValue={category?.meta_title ?? ""}
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
    </div>
  );
}
