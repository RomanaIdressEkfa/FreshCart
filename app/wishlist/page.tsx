"use client";

import Image from "next/image";
import Link from "next/link";
import { useWishlist } from "@/lib/wishlist-context";
import { useCart } from "@/lib/cart-context";
import { formatPrice } from "@/lib/format";

export default function WishlistPage() {
  const { items, remove } = useWishlist();
  const { add } = useCart();

  if (items.length === 0) {
    return (
      <div className="mx-auto max-w-3xl px-4 py-16 text-center">
        <h1 className="text-xl font-semibold text-slate-800">Your wishlist is empty</h1>
        <Link href="/" className="mt-4 inline-block text-emerald-600 hover:underline">
          Continue shopping
        </Link>
      </div>
    );
  }

  return (
    <div className="mx-auto max-w-3xl px-4 py-8">
      <h1 className="text-2xl font-bold text-slate-800">Your wishlist</h1>

      <div className="mt-6 divide-y divide-slate-200 rounded-xl border border-slate-200 bg-white">
        {items.map((item) => {
          const price = item.sale_price ?? item.regular_price ?? 0;
          return (
            <div key={item.id} className="flex items-center gap-4 p-4">
              <div className="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md bg-slate-100">
                {item.image ? (
                  <Image src={item.image} alt={item.name} width={64} height={64} className="h-full w-full object-cover" />
                ) : null}
              </div>
              <div className="flex-1">
                <p className="font-medium text-slate-800">{item.name}</p>
                <p className="text-sm text-slate-500">{formatPrice(price)}</p>
              </div>
              <button
                type="button"
                onClick={() => add({ id: item.id, name: item.name, image: item.image, sale_price: price })}
                className="rounded-md bg-emerald-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-emerald-700"
              >
                Add to cart
              </button>
              <button
                type="button"
                onClick={() => remove(item.id)}
                className="text-slate-400 hover:text-red-600"
                aria-label="Remove item"
              >
                ✕
              </button>
            </div>
          );
        })}
      </div>
    </div>
  );
}
