"use client";

import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { formatPrice } from "@/lib/format";

export default function CartPage() {
  const { items, updateQuantity, remove, subtotal } = useCart();

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
      <h1 className="fs-3 fw-bold mb-4">Your cart</h1>

      <div className="row g-5">
        <div className="col-lg-8">
          <ul className="list-group list-group-flush border rounded">
            {items.map((item) => (
              <li key={item.id} className="list-group-item py-3">
                <div className="row align-items-center g-2">
                  <div className="col-md-6">
                    <div className="d-flex">
                      {item.image && <img src={item.image} alt={item.name} className="icon-shape icon-xxl rounded" />}
                      <div className="ms-3">
                        <h6 className="mb-0">{item.name}</h6>
                        <small className="text-muted">{formatPrice(item.sale_price)}</small>
                      </div>
                    </div>
                  </div>
                  <div className="col-md-3">
                    <div className="input-group input-spinner">
                      <button
                        type="button"
                        className="button-minus btn btn-sm"
                        onClick={() => updateQuantity(item.id, item.quantity - 1)}
                      >
                        -
                      </button>
                      <input
                        type="number"
                        value={item.quantity}
                        onChange={(e) => updateQuantity(item.id, Number(e.target.value))}
                        className="quantity-field form-control-sm form-input text-center"
                      />
                      <button
                        type="button"
                        className="button-plus btn btn-sm"
                        onClick={() => updateQuantity(item.id, item.quantity + 1)}
                      >
                        +
                      </button>
                    </div>
                  </div>
                  <div className="col-md-2 text-md-end">
                    <span className="fw-bold text-danger">{formatPrice(item.sale_price * item.quantity)}</span>
                  </div>
                  <div className="col-md-1 text-md-end">
                    <button type="button" onClick={() => remove(item.id)} className="btn btn-link text-muted p-0">
                      <i className="bi bi-trash" />
                    </button>
                  </div>
                </div>
              </li>
            ))}
          </ul>
        </div>

        <div className="col-lg-4">
          <div className="border rounded p-4">
            <div className="d-flex justify-content-between mb-3">
              <span className="fw-semibold">Subtotal</span>
              <span className="fw-bold text-primary">{formatPrice(subtotal)}</span>
            </div>
            <Link href="/checkout" className="btn btn-primary w-100">
              Proceed to checkout
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
