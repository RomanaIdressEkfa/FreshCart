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
      <div className="mx-auto max-w-2xl px-4 py-16 text-center">
        <h1 className="text-2xl font-bold text-emerald-700">Order placed! 🎉</h1>
        <p className="mt-2 text-slate-500">Thanks for your order — we&apos;ll get it ready for delivery.</p>
        <Link href="/" className="mt-6 inline-block text-emerald-600 hover:underline">
          Continue shopping
        </Link>
      </div>
    );
  }

  if (items.length === 0) {
    return (
      <div className="mx-auto max-w-2xl px-4 py-16 text-center">
        <h1 className="text-xl font-semibold text-slate-800">Your cart is empty</h1>
        <Link href="/" className="mt-4 inline-block text-emerald-600 hover:underline">
          Continue shopping
        </Link>
      </div>
    );
  }

  return (
    <div className="mx-auto max-w-3xl px-4 py-8">
      <h1 className="text-2xl font-bold text-slate-800">Checkout</h1>

      <div className="mt-6 grid gap-8 sm:grid-cols-2">
        <form
          onSubmit={(e) => {
            e.preventDefault();
            clear();
            setPlaced(true);
          }}
          className="flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-4"
        >
          <h2 className="font-semibold text-slate-800">Shipping details</h2>
          <input required placeholder="Full name" className="rounded-md border border-slate-300 px-3 py-2 text-sm" />
          <input required type="email" placeholder="Email" className="rounded-md border border-slate-300 px-3 py-2 text-sm" />
          <input required placeholder="Delivery address" className="rounded-md border border-slate-300 px-3 py-2 text-sm" />
          <input required placeholder="Phone number" className="rounded-md border border-slate-300 px-3 py-2 text-sm" />
          <button
            type="submit"
            className="mt-2 rounded-md bg-emerald-600 py-2.5 font-medium text-white hover:bg-emerald-700"
          >
            Place order
          </button>
        </form>

        <div className="rounded-xl border border-slate-200 bg-white p-4">
          <h2 className="font-semibold text-slate-800">Order summary</h2>
          <ul className="mt-3 flex flex-col gap-2 text-sm">
            {items.map((item) => (
              <li key={item.id} className="flex justify-between text-slate-600">
                <span>
                  {item.name} × {item.quantity}
                </span>
                <span>{formatPrice(item.sale_price * item.quantity)}</span>
              </li>
            ))}
          </ul>
          <div className="mt-4 flex justify-between border-t border-slate-200 pt-3 font-semibold text-slate-800">
            <span>Total</span>
            <span className="text-emerald-700">{formatPrice(subtotal)}</span>
          </div>
        </div>
      </div>
    </div>
  );
}
