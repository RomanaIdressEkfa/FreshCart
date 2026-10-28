"use client";

import Link from "next/link";
import { useCart } from "@/lib/cart-context";
import { formatPrice } from "@/lib/format";

export function CartOffcanvas() {
  const { items, updateQuantity, remove, subtotal } = useCart();

  return (
    <div className="offcanvas offcanvas-end" tabIndex={-1} id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
      <div className="offcanvas-header border-bottom">
        <div className="text-start">
          <h5 id="cartOffcanvasLabel" className="mb-0 fs-4">
            Shop Cart
          </h5>
          <small>{items.length} item(s)</small>
        </div>
        <button type="button" className="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" />
      </div>
      <div className="offcanvas-body d-flex flex-column">
        {items.length === 0 ? (
          <p className="text-muted">Your cart is empty.</p>
        ) : (
          <ul className="list-group list-group-flush">
            {items.map((item) => (
              <li key={item.id} className="list-group-item py-3 ps-0">
                <div className="row align-items-center g-2">
                  <div className="col-7">
                    <div className="d-flex">
                      {item.image && (
                        <img src={item.image} alt={item.name} className="icon-shape icon-xxl rounded" />
                      )}
                      <div className="ms-3">
                        <h6 className="mb-0">{item.name}</h6>
                        <span>
                          <small className="text-muted">{formatPrice(item.sale_price)}</small>
                        </span>
                        <div className="mt-2 small lh-1">
                          <button
                            type="button"
                            onClick={() => remove(item.id)}
                            className="btn btn-link p-0 text-decoration-none text-muted small"
                          >
                            <i className="bi bi-trash text-success me-1" />
                            Remove
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="col-3">
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
                  <div className="col-2 text-end">
                    <span className="fw-bold text-danger">{formatPrice(item.sale_price * item.quantity)}</span>
                  </div>
                </div>
              </li>
            ))}
          </ul>
        )}

        <div className="mt-auto">
          <div className="d-flex justify-content-between align-items-center border-top pt-3 mb-3">
            <span className="fw-bold">Subtotal</span>
            <span className="fw-bold text-danger">{formatPrice(subtotal)}</span>
          </div>
          <div className="d-flex justify-content-between gap-2">
            <Link href="/cart" data-bs-dismiss="offcanvas" className="btn btn-outline-dark w-50">
              View cart
            </Link>
            <Link href="/checkout" data-bs-dismiss="offcanvas" className="btn btn-primary w-50">
              Checkout
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
