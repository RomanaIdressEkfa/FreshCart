-- FreshCart Supabase schema
-- Run this once in the Supabase SQL editor (Project > SQL Editor > New query) on a fresh project.

-- ========== updated_at trigger helper ==========
create or replace function set_updated_at()
returns trigger as $$
begin
  new.updated_at = now();
  return new;
end;
$$ language plpgsql;

-- ========== profiles ==========
create table if not exists profiles (
  id uuid primary key references auth.users (id) on delete cascade,
  full_name text,
  is_admin boolean not null default false,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create trigger profiles_set_updated_at
  before update on profiles
  for each row execute function set_updated_at();

-- Auto-create a profile row whenever a new auth user signs up.
create or replace function handle_new_user()
returns trigger as $$
begin
  insert into public.profiles (id, full_name)
  values (new.id, new.raw_user_meta_data ->> 'full_name');
  return new;
end;
$$ language plpgsql security definer set search_path = public;

create trigger on_auth_user_created
  after insert on auth.users
  for each row execute function handle_new_user();

-- Helper used by RLS policies below.
create or replace function is_admin()
returns boolean as $$
  select exists (
    select 1 from profiles where id = auth.uid() and is_admin = true
  );
$$ language sql security definer set search_path = public;

-- ========== categories ==========
create table if not exists categories (
  id bigint generated always as identity primary key,
  name text not null,
  image text,
  svg_code text,
  description text,
  meta_title text,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create trigger categories_set_updated_at
  before update on categories
  for each row execute function set_updated_at();

-- ========== sub_categories ==========
create table if not exists sub_categories (
  id bigint generated always as identity primary key,
  category_id bigint not null references categories (id) on delete cascade,
  name text not null,
  image text,
  heading text,
  topbar_description text,
  bottom_description text,
  meta_title text,
  meta_url text,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create trigger sub_categories_set_updated_at
  before update on sub_categories
  for each row execute function set_updated_at();

-- ========== sub_sub_categories ==========
create table if not exists sub_sub_categories (
  id bigint generated always as identity primary key,
  category_id bigint not null references categories (id) on delete cascade,
  sub_category_id bigint not null references sub_categories (id) on delete cascade,
  name text not null,
  topbar_heading text,
  topbar_description text,
  bottom_description text,
  meta_title text,
  meta_url text,
  total_product text,
  image text,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create trigger sub_sub_categories_set_updated_at
  before update on sub_sub_categories
  for each row execute function set_updated_at();

-- ========== brands ==========
create table if not exists brands (
  id bigint generated always as identity primary key,
  name text not null,
  image text,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create trigger brands_set_updated_at
  before update on brands
  for each row execute function set_updated_at();

-- ========== products ==========
create table if not exists products (
  id bigint generated always as identity primary key,
  category_id bigint not null references categories (id) on delete cascade,
  sub_category_id bigint references sub_categories (id) on delete cascade,
  sub_sub_category_id bigint references sub_sub_categories (id) on delete cascade,
  brand_id bigint references brands (id) on delete set null,
  name text not null,
  image text,
  description text,
  discount text,
  rating numeric,
  regular_price integer,
  sale_price integer,
  product_status text,
  product_code text,
  key_features text,
  slug text,
  meta_title text,
  meta_url text,
  topbar_heading text,
  topbar_description text,
  bottom_description text,
  is_best_seller boolean default false,
  sale_end_date timestamptz,
  created_at timestamptz not null default now(),
  updated_at timestamptz not null default now()
);

create trigger products_set_updated_at
  before update on products
  for each row execute function set_updated_at();

create index if not exists products_category_id_idx on products (category_id);
create index if not exists products_best_seller_idx on products (is_best_seller, sale_end_date);

-- ========== Row Level Security ==========
alter table profiles enable row level security;
alter table categories enable row level security;
alter table sub_categories enable row level security;
alter table sub_sub_categories enable row level security;
alter table brands enable row level security;
alter table products enable row level security;

-- profiles: everyone can read their own row; admins can read all; users manage their own row.
create policy "profiles select own" on profiles for select using (auth.uid() = id or is_admin());
create policy "profiles update own" on profiles for update using (auth.uid() = id);

-- catalog tables: public read, admin-only writes.
create policy "categories public read" on categories for select using (true);
create policy "categories admin write" on categories for all using (is_admin()) with check (is_admin());

create policy "sub_categories public read" on sub_categories for select using (true);
create policy "sub_categories admin write" on sub_categories for all using (is_admin()) with check (is_admin());

create policy "sub_sub_categories public read" on sub_sub_categories for select using (true);
create policy "sub_sub_categories admin write" on sub_sub_categories for all using (is_admin()) with check (is_admin());

create policy "brands public read" on brands for select using (true);
create policy "brands admin write" on brands for all using (is_admin()) with check (is_admin());

create policy "products public read" on products for select using (true);
create policy "products admin write" on products for all using (is_admin()) with check (is_admin());

-- ========== Storage ==========
-- Public bucket for category/sub-category/sub-sub-category/product/brand images.
insert into storage.buckets (id, name, public)
values ('images', 'images', true)
on conflict (id) do nothing;

create policy "images public read" on storage.objects
  for select using (bucket_id = 'images');

create policy "images admin write" on storage.objects
  for insert with check (bucket_id = 'images' and is_admin());

create policy "images admin update" on storage.objects
  for update using (bucket_id = 'images' and is_admin());

create policy "images admin delete" on storage.objects
  for delete using (bucket_id = 'images' and is_admin());

-- ========== After running this file ==========
-- 1. Sign up once via the app's /register page.
-- 2. Find your user id: select id, email from auth.users;
-- 3. Grant yourself admin access:
--    update profiles set is_admin = true where id = '<your-user-id>';
