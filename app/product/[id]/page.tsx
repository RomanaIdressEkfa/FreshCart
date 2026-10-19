import Image from "next/image";
import { notFound } from "next/navigation";
import { createClient } from "@/lib/supabase/server";
import { formatPrice } from "@/lib/format";
import { ProductActions } from "./ProductActions";
import type { Product } from "@/types/database";

export default async function ProductPage({
  params,
}: {
  params: Promise<{ id: string }>;
}) {
  const { id } = await params;
  const supabase = await createClient();
  const { data } = await supabase.from("products").select("*").eq("id", id).single();

  if (!data) notFound();
  const product = data as Product;
  const price = product.sale_price ?? product.regular_price ?? 0;

  return (
    <div className="mx-auto max-w-5xl px-4 py-8">
      <div className="grid gap-8 sm:grid-cols-2">
        <div className="aspect-square overflow-hidden rounded-xl bg-slate-100">
          {product.image ? (
            <Image
              src={product.image}
              alt={product.name}
              width={600}
              height={600}
              className="h-full w-full object-cover"
            />
          ) : (
            <div className="flex h-full items-center justify-center text-slate-400">
              No image
            </div>
          )}
        </div>

        <div>
          <h1 className="text-2xl font-bold text-slate-800">{product.name}</h1>
          {product.product_code && (
            <p className="mt-1 text-xs text-slate-400">SKU: {product.product_code}</p>
          )}

          <div className="mt-4 flex items-center gap-3">
            <span className="text-2xl font-semibold text-emerald-700">{formatPrice(price)}</span>
            {product.sale_price && product.regular_price && product.sale_price < product.regular_price && (
              <span className="text-slate-400 line-through">
                {formatPrice(product.regular_price)}
              </span>
            )}
          </div>

          {product.description && (
            <p className="mt-4 text-sm leading-6 text-slate-600">{product.description}</p>
          )}

          {product.key_features && (
            <p className="mt-4 text-sm text-slate-600">
              <span className="font-medium">Key features: </span>
              {product.key_features}
            </p>
          )}

          <div className="mt-6">
            <ProductActions product={product} />
          </div>
        </div>
      </div>
    </div>
  );
}
