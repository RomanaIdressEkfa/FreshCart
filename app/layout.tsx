import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: "FreshCart — Fresh groceries, delivered",
  description: "FreshCart online grocery store built with Next.js and Supabase.",
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <body>{children}</body>
    </html>
  );
}
