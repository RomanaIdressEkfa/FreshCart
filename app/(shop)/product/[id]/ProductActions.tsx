"use client";

import { useState } from "react";
import { useCart } from "@/lib/cart-context";
import { useWishlist } from "@/lib/wishlist-context";
import type { Product } from "@/types/database";

export function ProductActions({ product }: { product: Product }) {
  const { add } = useCart();
  const { toggle, has } = useWishlist();
  const [added, setAdded] = useState(false);
  const price = product.sale_price ?? product.regular_price ?? 0;

  return (
    <div className="d-flex gap-3">
      <button
        type="button"
        onClick={() => {
          add({ id: product.id, name: product.name, image: product.image, sale_price: price });
          setAdded(true);
        }}
        className="btn btn-primary"
      >
        <i className="bi bi-bag-plus me-1" />
        {added ? "Added" : "Add to cart"}
      </button>
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
        className="btn btn-outline-dark"
      >
        <i className={has(product.id) ? "bi bi-heart-fill text-danger me-1" : "bi bi-heart me-1"} />
        {has(product.id) ? "In wishlist" : "Add to wishlist"}
      </button>
    </div>
  );
}
