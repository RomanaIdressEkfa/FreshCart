"use client";

import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { useWishlist } from "@/lib/wishlist-context";
import { formatPrice } from "@/lib/format";
import type { Product } from "@/types/database";

function RatingStars({ rating }: { rating: number | null }) {
  const value = rating ?? 0;
  const full = Math.floor(value);
  const half = value - full >= 0.5 ? 1 : 0;
  const empty = 5 - full - half;

  return (
    <small className="text-warning">
      {Array.from({ length: full }).map((_, i) => (
        <i key={`full-${i}`} className="bi bi-star-fill" />
      ))}
      {half === 1 && <i className="bi bi-star-half" />}
      {Array.from({ length: empty }).map((_, i) => (
        <i key={`empty-${i}`} className="bi bi-star" />
      ))}
    </small>
  );
}

export function ProductCard({ product }: { product: Product }) {
  const { add } = useCart();
  const { toggle, has } = useWishlist();
  const inWishlist = has(product.id);
  const price = product.sale_price ?? product.regular_price ?? 0;

  return (
    <div className="col">
      <div className="card card-product">
        <div className="card-body">
          <div className="text-center position-relative">
            {product.discount && (
              <div className="position-absolute top-0 start-0">
                <span className="badge bg-danger">{product.discount}</span>
              </div>
            )}
            <Link href={`/product/${product.id}`}>
              {product.image ? (
                <img src={product.image} alt={product.name} className="mb-3 img-fluid" style={{ height: 212, objectFit: "cover" }} />
              ) : (
                <div
                  className="mb-3 d-flex align-items-center justify-content-center bg-light text-muted"
                  style={{ height: 212 }}
                >
                  No image
                </div>
              )}
            </Link>
            <div className="card-product-action">
              <button
                type="button"
                onClick={() =>
                  toggle({
                    id: product.id,
                    name: product.name,
                    image: product.image,
                    sale_price: product.sale_price,
                    regular_price: product.regular_price,
                  })
                }
                className="btn-action"
                title="Wishlist"
              >
                <i className={inWishlist ? "bi bi-heart-fill text-danger" : "bi bi-heart"} />
              </button>
            </div>
          </div>

          <h2 className="fs-6">
            <Link href={`/product/${product.id}`} className="text-inherit text-decoration-none">
              {product.name}
            </Link>
          </h2>

          <div>
            <RatingStars rating={product.rating} />
            <span className="text-muted small ms-1">{(product.rating ?? 0).toFixed(1)}</span>
          </div>

          <div className="d-flex justify-content-between align-items-center mt-3">
            <div>
              <span className="text-dark">{formatPrice(price)}</span>
              {product.sale_price && product.regular_price && product.sale_price < product.regular_price && (
                <span className="text-decoration-line-through text-muted ms-1 small">
                  {formatPrice(product.regular_price)}
                </span>
              )}
            </div>
            <button
              type="button"
              onClick={() => add({ id: product.id, name: product.name, image: product.image, sale_price: price })}
              className="btn btn-primary btn-sm"
            >
              <i className="bi bi-plus-lg" /> Add
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
