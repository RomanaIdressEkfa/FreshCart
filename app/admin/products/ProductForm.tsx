import { ImageField } from "@/components/admin/ImageField";
import { ProductCategoryFields } from "@/components/admin/ProductCategoryFields";
import { createClient } from "@/lib/supabase/server";
import { upsertProduct } from "./actions";
import type { Product } from "@/types/database";

function toDatetimeLocal(value: string | null | undefined) {
  if (!value) return "";
  return new Date(value).toISOString().slice(0, 16);
}

export async function ProductForm({ product }: { product?: Product }) {
  const supabase = await createClient();
  const [{ data: categories }, { data: subCategories }, { data: subSubCategories }, { data: brands }] =
    await Promise.all([
      supabase.from("categories").select("id, name").order("name"),
      supabase.from("sub_categories").select("id, name, category_id").order("name"),
      supabase.from("sub_sub_categories").select("id, name, category_id, sub_category_id").order("name"),
      supabase.from("brands").select("id, name").order("name"),
    ]);

  return (
    <form action={upsertProduct} className="flex max-w-2xl flex-col gap-3">
      {product && <input type="hidden" name="id" value={product.id} />}

      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Name
        <input
          name="name"
          required
          defaultValue={product?.name}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>

      <div className="grid gap-3 sm:grid-cols-3">
        <ProductCategoryFields
          categories={categories ?? []}
          subCategories={subCategories ?? []}
          subSubCategories={subSubCategories ?? []}
          defaultCategoryId={product?.category_id}
          defaultSubCategoryId={product?.sub_category_id}
          defaultSubSubCategoryId={product?.sub_sub_category_id}
        />
      </div>

      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Brand (optional)
        <select
          name="brand_id"
          defaultValue={product?.brand_id ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        >
          <option value="">None</option>
          {(brands ?? []).map((brand) => (
            <option key={brand.id} value={brand.id}>
              {brand.name}
            </option>
          ))}
        </select>
      </label>

      <ImageField name="image" label="Image" defaultImage={product?.image} />

      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Description
        <textarea
          name="description"
          defaultValue={product?.description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={3}
        />
      </label>

      <div className="grid gap-3 sm:grid-cols-2">
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Regular price
          <input
            name="regular_price"
            type="number"
            defaultValue={product?.regular_price ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Sale price
          <input
            name="sale_price"
            type="number"
            defaultValue={product?.sale_price ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Discount (e.g. &quot;10%&quot;)
          <input
            name="discount"
            defaultValue={product?.discount ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Rating (0-5)
          <input
            name="rating"
            type="number"
            step="0.1"
            min={0}
            max={5}
            defaultValue={product?.rating ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Product status
          <input
            name="product_status"
            defaultValue={product?.product_status ?? ""}
            placeholder="in_stock / out_of_stock"
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Product code
          <input
            name="product_code"
            defaultValue={product?.product_code ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Slug
          <input
            name="slug"
            defaultValue={product?.slug ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Key features
          <input
            name="key_features"
            defaultValue={product?.key_features ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
      </div>

      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Topbar heading
        <input
          name="topbar_heading"
          defaultValue={product?.topbar_heading ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Topbar description
        <textarea
          name="topbar_description"
          defaultValue={product?.topbar_description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={2}
        />
      </label>
      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Bottom description
        <textarea
          name="bottom_description"
          defaultValue={product?.bottom_description ?? ""}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          rows={2}
        />
      </label>
      <div className="grid gap-3 sm:grid-cols-2">
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Meta title
          <input
            name="meta_title"
            defaultValue={product?.meta_title ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
        <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
          Meta URL
          <input
            name="meta_url"
            defaultValue={product?.meta_url ?? ""}
            className="rounded-md border border-slate-300 px-3 py-2 text-sm"
          />
        </label>
      </div>

      <label className="flex flex-col gap-1 text-sm font-medium text-slate-700">
        Sale end date (for best-seller promotions)
        <input
          name="sale_end_date"
          type="datetime-local"
          defaultValue={toDatetimeLocal(product?.sale_end_date)}
          className="rounded-md border border-slate-300 px-3 py-2 text-sm"
        />
      </label>

      <label className="flex items-center gap-2 text-sm font-medium text-slate-700">
        <input
          type="checkbox"
          name="is_best_seller"
          defaultChecked={product?.is_best_seller ?? false}
          className="h-4 w-4 rounded border-slate-300"
        />
        Mark as best seller
      </label>

      <button
        type="submit"
        className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700"
      >
        {product ? "Save changes" : "Create product"}
      </button>
    </form>
  );
}
