import Script from "next/script";
import { Navbar } from "@/components/shop/Navbar";
import { Footer } from "@/components/shop/Footer";
import { CartOffcanvas } from "@/components/shop/CartOffcanvas";
import { CartProvider } from "@/lib/cart-context";
import { WishlistProvider } from "@/lib/wishlist-context";

export default function ShopLayout({ children }: { children: React.ReactNode }) {
  return (
    <CartProvider>
      <WishlistProvider>
        <link rel="stylesheet" href="/ui/frontend/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="/ui/frontend/assets/css/theme.min.css" />
        <Script src="/ui/frontend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js" strategy="afterInteractive" />

        <Navbar />
        <CartOffcanvas />
        <main>{children}</main>
        <Footer />
      </WishlistProvider>
    </CartProvider>
  );
}
