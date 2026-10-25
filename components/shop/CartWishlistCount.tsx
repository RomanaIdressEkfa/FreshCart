"use client";

import { useCart } from "@/lib/cart-context";
import { useWishlist } from "@/lib/wishlist-context";

export function WishlistBadge() {
  const { items } = useWishlist();
  if (items.length === 0) return null;
  return (
    <span className="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
      {items.length}
      <span className="visually-hidden">items in wishlist</span>
    </span>
  );
}

export function CartBadge() {
  const { count } = useCart();
  if (count === 0) return null;
  return (
    <span className="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
      {count}
      <span className="visually-hidden">items in cart</span>
    </span>
  );
}
