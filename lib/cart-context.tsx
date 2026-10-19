"use client";

import {
  createContext,
  useCallback,
  useContext,
  useMemo,
  useSyncExternalStore,
} from "react";
import { createLocalStore } from "./local-store";

export type CartItem = {
  id: number;
  name: string;
  image: string | null;
  sale_price: number;
  quantity: number;
};

type CartContextValue = {
  items: CartItem[];
  add: (item: Omit<CartItem, "quantity">) => void;
  updateQuantity: (id: number, quantity: number) => void;
  remove: (id: number) => void;
  clear: () => void;
  subtotal: number;
  count: number;
};

const CartContext = createContext<CartContextValue | null>(null);
const cartStore = createLocalStore<CartItem[]>("freshcart:cart", []);

export function CartProvider({ children }: { children: React.ReactNode }) {
  const items = useSyncExternalStore(
    cartStore.subscribe,
    cartStore.getSnapshot,
    cartStore.getServerSnapshot,
  );

  const add = useCallback((item: Omit<CartItem, "quantity">) => {
    cartStore.setState((prev) => {
      const existing = prev.find((i) => i.id === item.id);
      if (existing) {
        return prev.map((i) =>
          i.id === item.id ? { ...i, quantity: i.quantity + 1 } : i,
        );
      }
      return [...prev, { ...item, quantity: 1 }];
    });
  }, []);

  const updateQuantity = useCallback((id: number, quantity: number) => {
    cartStore.setState((prev) =>
      prev.map((i) => (i.id === id ? { ...i, quantity: Math.max(1, quantity) } : i)),
    );
  }, []);

  const remove = useCallback((id: number) => {
    cartStore.setState((prev) => prev.filter((i) => i.id !== id));
  }, []);

  const clear = useCallback(() => cartStore.setState(() => []), []);

  const subtotal = useMemo(
    () => items.reduce((sum, i) => sum + i.sale_price * i.quantity, 0),
    [items],
  );
  const count = useMemo(
    () => items.reduce((sum, i) => sum + i.quantity, 0),
    [items],
  );

  const value = useMemo(
    () => ({ items, add, updateQuantity, remove, clear, subtotal, count }),
    [items, add, updateQuantity, remove, clear, subtotal, count],
  );

  return <CartContext.Provider value={value}>{children}</CartContext.Provider>;
}

export function useCart() {
  const ctx = useContext(CartContext);
  if (!ctx) throw new Error("useCart must be used within CartProvider");
  return ctx;
}
