"use client";

import Link from "next/link";
import { useWishlist } from "@/lib/wishlist-context";
import { useCart } from "@/lib/cart-context";
import { formatPrice } from "@/lib/format";

export default function WishlistPage() {
  const { items, remove } = useWishlist();
  const { add } = useCart();

  if (items.length === 0) {
    return (
      <div className="container-fluid py-16 text-center">
        <h1 className="fs-4 fw-semibold">Your wishlist is empty</h1>
        <Link href="/" className="btn btn-primary mt-3">
          Continue shopping
        </Link>
      </div>
    );
  }

  return (
    <div className="container-fluid py-8">
      <h1 className="fs-3 fw-bold mb-4">Your wishlist</h1>

      <ul className="list-group list-group-flush border rounded">
        {items.map((item) => {
          const price = item.sale_price ?? item.regular_price ?? 0;
          return (
            <li key={item.id} className="list-group-item py-3">
              <div className="row align-items-center g-2">
                <div className="col-md-7">
                  <div className="d-flex">
                    {item.image && <img src={item.image} alt={item.name} className="icon-shape icon-xxl rounded" />}
                    <div className="ms-3">
                      <h6 className="mb-0">{item.name}</h6>
                      <small className="text-muted">{formatPrice(price)}</small>
                    </div>
                  </div>
                </div>
                <div className="col-md-3 text-md-end">
                  <button
                    type="button"
                    onClick={() => add({ id: item.id, name: item.name, image: item.image, sale_price: price })}
                    className="btn btn-primary btn-sm"
                  >
                    Add to cart
                  </button>
                </div>
                <div className="col-md-2 text-md-end">
                  <button type="button" onClick={() => remove(item.id)} className="btn btn-link text-muted p-0">
                    <i className="bi bi-trash" />
                  </button>
                </div>
              </div>
            </li>
          );
        })}
      </ul>
    </div>
  );
}
