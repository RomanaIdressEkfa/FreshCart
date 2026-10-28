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
    <div className="container-fluid py-8">
      <div className="row g-5">
        <div className="col-md-6">
          <div className="border rounded p-4 text-center bg-light">
            {product.image ? (
              <img src={product.image} alt={product.name} className="img-fluid" style={{ maxHeight: 420 }} />
            ) : (
              <div className="d-flex align-items-center justify-content-center text-muted" style={{ height: 320 }}>
                No image
              </div>
            )}
          </div>
        </div>

        <div className="col-md-6">
          <h1 className="fs-3 fw-bold">{product.name}</h1>
          {product.product_code && <p className="text-muted small">SKU: {product.product_code}</p>}

          <div className="d-flex align-items-center gap-3 mt-3">
            <span className="fs-4 fw-bold text-primary">{formatPrice(price)}</span>
            {product.sale_price && product.regular_price && product.sale_price < product.regular_price && (
              <span className="text-decoration-line-through text-muted">{formatPrice(product.regular_price)}</span>
            )}
          </div>

          {product.description && <p className="mt-4">{product.description}</p>}

          {product.key_features && (
            <p className="mt-3">
              <strong>Key features: </strong>
              {product.key_features}
            </p>
          )}

          <div className="mt-4">
            <ProductActions product={product} />
          </div>
        </div>
      </div>
    </div>
  );
}
