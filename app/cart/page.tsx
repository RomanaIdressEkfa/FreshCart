"use client";

import Image from "next/image";
import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { formatPrice } from "@/lib/format";

export default function CartPage() {
  const { items, updateQuantity, remove, subtotal } = useCart();

  if (items.length === 0) {
    return (
      <div className="mx-auto max-w-3xl px-4 py-16 text-center">
        <h1 className="text-xl font-semibold text-slate-800">Your cart is empty</h1>
        <Link href="/" className="mt-4 inline-block text-emerald-600 hover:underline">
          Continue shopping
        </Link>
      </div>
    );
  }

  return (
    <div className="mx-auto max-w-3xl px-4 py-8">
      <h1 className="text-2xl font-bold text-slate-800">Your cart</h1>

      <div className="mt-6 divide-y divide-slate-200 rounded-xl border border-slate-200 bg-white">
        {items.map((item) => (
          <div key={item.id} className="flex items-center gap-4 p-4">
            <div className="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md bg-slate-100">
              {item.image ? (
                <Image src={item.image} alt={item.name} width={64} height={64} className="h-full w-full object-cover" />
              ) : null}
            </div>
            <div className="flex-1">
              <p className="font-medium text-slate-800">{item.name}</p>
              <p className="text-sm text-slate-500">{formatPrice(item.sale_price)}</p>
            </div>
            <input
              type="number"
              min={1}
              value={item.quantity}
              onChange={(e) => updateQuantity(item.id, Number(e.target.value))}
              className="w-16 rounded-md border border-slate-300 px-2 py-1 text-center"
            />
            <p className="w-20 text-right font-medium text-slate-800">
              {formatPrice(item.sale_price * item.quantity)}
            </p>
            <button
              type="button"
              onClick={() => remove(item.id)}
              className="text-slate-400 hover:text-red-600"
              aria-label="Remove item"
            >
              ✕
            </button>
          </div>
        ))}
      </div>

      <div className="mt-6 flex items-center justify-between rounded-xl border border-slate-200 bg-white p-4">
        <span className="text-lg font-semibold text-slate-800">Subtotal</span>
        <span className="text-lg font-bold text-emerald-700">{formatPrice(subtotal)}</span>
      </div>

      <Link
        href="/checkout"
        className="mt-6 block rounded-md bg-emerald-600 py-3 text-center font-medium text-white hover:bg-emerald-700"
      >
        Proceed to checkout
      </Link>
    </div>
  );
}
