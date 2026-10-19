"use client";

import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { useWishlist } from "@/lib/wishlist-context";

export function CartWishlistBadges() {
  const { count } = useCart();
  const { items: wishlistItems } = useWishlist();

  return (
    <div className="flex items-center gap-4 text-sm font-medium text-slate-700">
      <Link href="/wishlist" className="relative flex items-center gap-1 hover:text-emerald-600">
        Wishlist
        {wishlistItems.length > 0 && (
          <span className="ml-1 inline-flex h-5 min-w-5 items-center justify-center rounded-full bg-emerald-600 px-1 text-xs text-white">
            {wishlistItems.length}
          </span>
        )}
      </Link>
      <Link href="/cart" className="relative flex items-center gap-1 hover:text-emerald-600">
        Cart
        {count > 0 && (
          <span className="ml-1 inline-flex h-5 min-w-5 items-center justify-center rounded-full bg-emerald-600 px-1 text-xs text-white">
            {count}
          </span>
        )}
      </Link>
    </div>
  );
}
