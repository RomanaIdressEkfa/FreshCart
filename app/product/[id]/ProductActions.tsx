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
    <div className="flex items-center gap-3">
      <button
        type="button"
        onClick={() => {
          add({ id: product.id, name: product.name, image: product.image, sale_price: price });
          setAdded(true);
        }}
        className="rounded-md bg-emerald-600 px-5 py-2 font-medium text-white hover:bg-emerald-700"
      >
        {added ? "Added ✓" : "Add to cart"}
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
        className={`rounded-md border px-5 py-2 font-medium ${
          has(product.id)
            ? "border-emerald-600 text-emerald-700"
            : "border-slate-300 text-slate-600"
        }`}
      >
        {has(product.id) ? "In wishlist ♥" : "Add to wishlist"}
      </button>
    </div>
  );
}
