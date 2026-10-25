import type { Brand } from "@/types/database";

export function BrandFormFields({ brand }: { brand?: Brand }) {
  return (
    <div className="grid gap-4 mb-4 grid-cols-2">
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input
          type="text"
          name="name"
          required
          defaultValue={brand?.name}
          placeholder="Brand name"
          className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
      <div className="col-span-2">
        <label className="block mb-0 text-sm font-medium text-gray-900">Logo</label>
        <input
          type="file"
          name="image"
          accept="image/*"
          className="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
        />
      </div>
    </div>
  );
}
