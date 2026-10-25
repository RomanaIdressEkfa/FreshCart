import { ProductCategoryFields } from "@/components/admin/ProductCategoryFields";
import { createClient } from "@/lib/supabase/server";
import type { Product } from "@/types/database";

const inputClass =
  "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5";

function toDatetimeLocal(value: string | null | undefined) {
  if (!value) return "";
  return new Date(value).toISOString().slice(0, 16);
}

export async function ProductFormFields({ product }: { product?: Product }) {
  const supabase = await createClient();
  const [{ data: categories }, { data: subCategories }, { data: subSubCategories }, { data: brands }] =
    await Promise.all([
      supabase.from("categories").select("id, name").order("name"),
      supabase.from("sub_categories").select("id, name, category_id").order("name"),
      supabase.from("sub_sub_categories").select("id, name, category_id, sub_category_id").order("name"),
      supabase.from("brands").select("id, name").order("name"),
    ]);

  return (
    <div className="grid gap-4 mb-4 grid-cols-2">
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input type="text" name="name" required defaultValue={product?.name} className={inputClass} />
      </div>

      <ProductCategoryFields
        categories={categories ?? []}
        subCategories={subCategories ?? []}
        subSubCategories={subSubCategories ?? []}
        defaultCategoryId={product?.category_id}
        defaultSubCategoryId={product?.sub_category_id}
        defaultSubSubCategoryId={product?.sub_sub_category_id}
      />

      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Brand (optional)</label>
        <select name="brand_id" defaultValue={product?.brand_id ?? ""} className={inputClass}>
          <option value="">None</option>
          {(brands ?? []).map((brand) => (
            <option key={brand.id} value={brand.id}>
              {brand.name}
            </option>
          ))}
        </select>
      </div>

      <div className="col-span-2">
        <label className="block mb-0 text-sm font-medium text-gray-900">Image</label>
        <input type="file" name="image" accept="image/*" className={inputClass} />
      </div>

      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Description</label>
        <textarea name="description" rows={3} defaultValue={product?.description ?? ""} className={inputClass} />
      </div>

      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Regular price</label>
        <input type="number" name="regular_price" defaultValue={product?.regular_price ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Sale price</label>
        <input type="number" name="sale_price" defaultValue={product?.sale_price ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Discount (e.g. &quot;10%&quot;)</label>
        <input name="discount" defaultValue={product?.discount ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Rating (0-5)</label>
        <input
          type="number"
          step="0.1"
          min={0}
          max={5}
          name="rating"
          defaultValue={product?.rating ?? ""}
          className={inputClass}
        />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Product status</label>
        <input name="product_status" defaultValue={product?.product_status ?? ""} placeholder="in_stock" className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Product code</label>
        <input name="product_code" defaultValue={product?.product_code ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Slug</label>
        <input name="slug" defaultValue={product?.slug ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Key features</label>
        <input name="key_features" defaultValue={product?.key_features ?? ""} className={inputClass} />
      </div>

      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Topbar heading</label>
        <input name="topbar_heading" defaultValue={product?.topbar_heading ?? ""} className={inputClass} />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Topbar description</label>
        <textarea name="topbar_description" rows={2} defaultValue={product?.topbar_description ?? ""} className={inputClass} />
      </div>
      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Bottom description</label>
        <textarea name="bottom_description" rows={2} defaultValue={product?.bottom_description ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta title</label>
        <input name="meta_title" defaultValue={product?.meta_title ?? ""} className={inputClass} />
      </div>
      <div>
        <label className="block mb-2 text-sm font-medium text-gray-900">Meta URL</label>
        <input name="meta_url" defaultValue={product?.meta_url ?? ""} className={inputClass} />
      </div>

      <div className="col-span-2">
        <label className="block mb-2 text-sm font-medium text-gray-900">Sale end date (best-seller promotions)</label>
        <input type="datetime-local" name="sale_end_date" defaultValue={toDatetimeLocal(product?.sale_end_date)} className={inputClass} />
      </div>

      <div className="col-span-2 flex items-center gap-2">
        <input
          type="checkbox"
          id="is_best_seller"
          name="is_best_seller"
          defaultChecked={product?.is_best_seller ?? false}
          className="h-4 w-4 rounded border-gray-300"
        />
        <label htmlFor="is_best_seller" className="text-sm font-medium text-gray-900">
          Mark as best seller
        </label>
      </div>
    </div>
  );
}
