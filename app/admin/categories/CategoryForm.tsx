import { ImageField } from "@/components/admin/ImageField";
import { upsertCategory } from "./actions";
import type { Category } from "@/types/database";

export function CategoryForm({ category }: { category?: Category }) {
  return (
    <form action={upsertCategory} className="flex max-w-lg flex-col gap-3">
      {category && <input type="hidden" name="id" value={category.id} />}
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Name
        <input
          name="name"
          required
          defaultValue={category?.name}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <ImageField name="image" label="Image" defaultImage={category?.image} />
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Description
        <textarea
          name="description"
          defaultValue={category?.description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={3}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        SVG icon code (optional)
        <textarea
          name="svg_code"
          defaultValue={category?.svg_code ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm font-mono text-xs"
          rows={2}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Meta title
        <input
          name="meta_title"
          defaultValue={category?.meta_title ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <button
        type="submit"
        className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700"
      >
        {category ? "Save changes" : "Create category"}
      </button>
    </form>
  );
}
