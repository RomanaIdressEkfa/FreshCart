"use client";

import { useState } from "react";
import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { formatPrice } from "@/lib/format";

export default function CheckoutPage() {
  const { items, subtotal, clear } = useCart();
  const [placed, setPlaced] = useState(false);

  if (placed) {
    return (
      <div className="container-fluid py-16 text-center">
        <h1 className="fs-3 fw-bold text-primary">Order placed! 🎉</h1>
        <p className="text-muted">Thanks for your order — we&apos;ll get it ready for delivery.</p>
        <Link href="/" className="btn btn-primary mt-3">
          Continue shopping
        </Link>
      </div>
    );
  }

  if (items.length === 0) {
    return (
      <div className="container-fluid py-16 text-center">
        <h1 className="fs-4 fw-semibold">Your cart is empty</h1>
        <Link href="/" className="btn btn-primary mt-3">
          Continue shopping
        </Link>
      </div>
    );
  }

  return (
    <div className="container-fluid py-8">
      <h1 className="fs-3 fw-bold mb-4">Checkout</h1>

      <div className="row g-5">
        <div className="col-md-7">
          <form
            onSubmit={(e) => {
              e.preventDefault();
              clear();
              setPlaced(true);
            }}
            className="border rounded p-4"
          >
            <h2 className="fs-5 mb-3">Shipping details</h2>
            <div className="mb-3">
              <label className="form-label">Full name</label>
              <input required className="form-control" />
            </div>
            <div className="mb-3">
              <label className="form-label">Email</label>
              <input required type="email" className="form-control" />
            </div>
            <div className="mb-3">
              <label className="form-label">Delivery address</label>
              <input required className="form-control" />
            </div>
            <div className="mb-3">
              <label className="form-label">Phone number</label>
              <input required className="form-control" />
            </div>
            <button type="submit" className="btn btn-primary w-100">
              Place order
            </button>
          </form>
        </div>

        <div className="col-md-5">
          <div className="border rounded p-4">
            <h2 className="fs-5 mb-3">Order summary</h2>
            <ul className="list-unstyled small">
              {items.map((item) => (
                <li key={item.id} className="d-flex justify-content-between mb-2">
                  <span>
                    {item.name} × {item.quantity}
                  </span>
                  <span>{formatPrice(item.sale_price * item.quantity)}</span>
                </li>
              ))}
            </ul>
            <div className="d-flex justify-content-between border-top pt-3 fw-bold">
              <span>Total</span>
              <span className="text-primary">{formatPrice(subtotal)}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
