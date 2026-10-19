# FreshCart

Online grocery storefront + admin panel, built with Next.js (App Router) and Supabase. This replaces the project's original Laravel implementation (still on `main`); this rewrite lives on the `nextjs-rewrite` branch.

## Stack

- **Next.js 16** (App Router, TypeScript, Tailwind CSS v4)
- **Supabase**: Postgres (catalog data + profiles), Auth (email/password), Storage (product/category images)
- **Vercel** for deployment

## Features

- Storefront: home page, category listing (paginated), product detail
- Cart & wishlist: guest-friendly, stored in the browser (`localStorage`) — no account required, matching the original app's session-based cart
- Checkout: order summary + shipping form (no payment gateway, same scope as the original)
- Auth: sign up / sign in / profile editing via Supabase Auth
- Admin panel (`/admin`, restricted to accounts with `profiles.is_admin = true`): full CRUD for categories, sub-categories, sub-sub-categories, brands and products, including image upload to Supabase Storage and cascading category → sub-category → sub-sub-category selects

## 1. Create a Supabase project

1. Go to [supabase.com](https://supabase.com), create a free project.
2. Open **SQL Editor** → **New query**, paste the contents of [`supabase/schema.sql`](supabase/schema.sql), and run it. This creates all tables, RLS policies, the `images` storage bucket, and the trigger that creates a `profiles` row for every new signup.
3. Open **Project Settings → API** and copy the **Project URL** and **anon public key**.

## 2. Configure environment variables

Copy `.env.local.example` to `.env.local` and fill in the values from step 1:

```bash
cp .env.local.example .env.local
```

```
NEXT_PUBLIC_SUPABASE_URL=https://your-project-ref.supabase.co
NEXT_PUBLIC_SUPABASE_ANON_KEY=your-anon-public-key
```

## 3. Run locally

```bash
npm install
npm run dev
```

Open [http://localhost:3000](http://localhost:3000).

## 4. Become an admin

1. Sign up once via `/register`.
2. In the Supabase SQL editor, find your user id:
   ```sql
   select id, email from auth.users;
   ```
3. Grant yourself admin access:
   ```sql
   update profiles set is_admin = true where id = '<your-user-id>';
   ```
4. Sign out and back in, then visit `/admin`.

## 5. Deploy to Vercel

1. Push this branch to GitHub (already done if you're reading this from the repo).
2. In [Vercel](https://vercel.com/new), import the repo and pick the `nextjs-rewrite` branch (or merge it into `main` first and deploy that).
3. Framework preset: Next.js (auto-detected).
4. Add the two environment variables from step 2 (`NEXT_PUBLIC_SUPABASE_URL`, `NEXT_PUBLIC_SUPABASE_ANON_KEY`) in the Vercel project settings.
5. Deploy.
6. Back in Supabase, go to **Authentication → URL Configuration** and add your Vercel deployment URL to **Site URL** and **Redirect URLs**, so auth email links and redirects work in production.

## Project structure

- `app/` — routes (App Router)
- `app/admin/` — admin panel, protected by `is_admin`
- `lib/supabase/` — Supabase client factories (browser + server)
- `lib/cart-context.tsx`, `lib/wishlist-context.tsx` — localStorage-backed cart/wishlist state
- `components/` — shared UI
- `supabase/schema.sql` — database schema, RLS policies, storage bucket setup
- `proxy.ts` — Next.js proxy (formerly "middleware"): refreshes the Supabase session and guards `/admin`, `/dashboard`, `/profile`
