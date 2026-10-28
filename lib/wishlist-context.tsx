"use client";

import {
  createContext,
  useCallback,
  useContext,
  useMemo,
  useSyncExternalStore,
} from "react";
import { createLocalStore } from "./local-store";

export type WishlistItem = {
  id: number;
  name: string;
  image: string | null;
  sale_price: number | null;
  regular_price: number | null;
};

type WishlistContextValue = {
  items: WishlistItem[];
  toggle: (item: WishlistItem) => void;
  remove: (id: number) => void;
  has: (id: number) => boolean;
};

const WishlistContext = createContext<WishlistContextValue | null>(null);
const wishlistStore = createLocalStore<WishlistItem[]>("freshcart:wishlist", []);

export function WishlistProvider({ children }: { children: React.ReactNode }) {
  const items = useSyncExternalStore(
    wishlistStore.subscribe,
    wishlistStore.getSnapshot,
    wishlistStore.getServerSnapshot,
  );

  const toggle = useCallback((item: WishlistItem) => {
    wishlistStore.setState((prev) =>
      prev.some((i) => i.id === item.id)
        ? prev.filter((i) => i.id !== item.id)
        : [...prev, item],
    );
  }, []);

  const remove = useCallback((id: number) => {
    wishlistStore.setState((prev) => prev.filter((i) => i.id !== id));
  }, []);

  const has = useCallback((id: number) => items.some((i) => i.id === id), [items]);

  const value = useMemo(
    () => ({ items, toggle, remove, has }),
    [items, toggle, remove, has],
  );

  return (
    <WishlistContext.Provider value={value}>{children}</WishlistContext.Provider>
  );
}

export function useWishlist() {
  const ctx = useContext(WishlistContext);
  if (!ctx) throw new Error("useWishlist must be used within WishlistProvider");
  return ctx;
}
