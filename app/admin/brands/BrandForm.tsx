import { ImageField } from "@/components/admin/ImageField";
import { upsertBrand } from "./actions";
import type { Brand } from "@/types/database";

export function BrandForm({ brand }: { brand?: Brand }) {
  return (
    <form action={upsertBrand} className="flex max-w-lg flex-col gap-3">
      {brand && <input type="hidden" name="id" value={brand.id} />}
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Name
        <input
          name="name"
          required
          defaultValue={brand?.name}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <ImageField name="image" label="Logo" defaultImage={brand?.image} />
      <button
        type="submit"
        className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700"
      >
        {brand ? "Save changes" : "Create brand"}
      </button>
    </form>
  );
}
