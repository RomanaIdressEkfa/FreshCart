"use client";

import Image from "next/image";
import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { useWishlist } from "@/lib/wishlist-context";
import { formatPrice } from "@/lib/format";
import type { Product } from "@/types/database";

export function ProductCard({ product }: { product: Product }) {
  const { add } = useCart();
  const { toggle, has } = useWishlist();
  const inWishlist = has(product.id);
  const price = product.sale_price ?? product.regular_price ?? 0;

  return (
    <div className="group relative flex flex-col overflow-hidden rounded-xl border border-slate-200 bg-white transition hover:shadow-lg">
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
        aria-label="Toggle wishlist"
        className={`absolute right-2 top-2 z-10 rounded-full p-2 shadow ${
          inWishlist ? "bg-emerald-600 text-white" : "bg-white text-slate-500"
        }`}
      >
        ♥
      </button>

      <Link href={`/product/${product.id}`} className="block aspect-square bg-slate-100">
        {product.image ? (
          <Image
            src={product.image}
            alt={product.name}
            width={300}
            height={300}
            className="h-full w-full object-cover transition group-hover:scale-105"
          />
        ) : (
          <div className="flex h-full items-center justify-center text-slate-400">
            No image
          </div>
        )}
      </Link>

      <div className="flex flex-1 flex-col gap-1 p-3">
        <Link href={`/product/${product.id}`} className="line-clamp-2 text-sm font-medium text-slate-800 hover:text-emerald-700">
          {product.name}
        </Link>
        <div className="mt-1 flex items-center gap-2">
          <span className="font-semibold text-emerald-700">{formatPrice(price)}</span>
          {product.sale_price && product.regular_price && product.sale_price < product.regular_price && (
            <span className="text-xs text-slate-400 line-through">
              {formatPrice(product.regular_price)}
            </span>
          )}
        </div>
        <button
          type="button"
          onClick={() =>
            add({
              id: product.id,
              name: product.name,
              image: product.image,
              sale_price: price,
            })
          }
          className="mt-2 rounded-md bg-emerald-600 py-1.5 text-sm font-medium text-white hover:bg-emerald-700"
        >
          Add to cart
        </button>
      </div>
    </div>
  );
}
