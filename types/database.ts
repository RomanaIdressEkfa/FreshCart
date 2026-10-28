export type Category = {
  id: number;
  name: string;
  image: string | null;
  svg_code: string | null;
  description: string | null;
  meta_title: string | null;
  created_at: string;
  updated_at: string;
};

export type SubCategory = {
  id: number;
  category_id: number;
  name: string;
  image: string | null;
  heading: string | null;
  topbar_description: string | null;
  bottom_description: string | null;
  meta_title: string | null;
  meta_url: string | null;
  created_at: string;
  updated_at: string;
};

export type SubSubCategory = {
  id: number;
  category_id: number;
  sub_category_id: number;
  name: string;
  topbar_heading: string | null;
  topbar_description: string | null;
  bottom_description: string | null;
  meta_title: string | null;
  meta_url: string | null;
  total_product: string | null;
  image: string | null;
  created_at: string;
  updated_at: string;
};

export type Brand = {
  id: number;
  name: string;
  image: string | null;
  created_at: string;
  updated_at: string;
};

export type Product = {
  id: number;
  category_id: number;
  sub_category_id: number | null;
  sub_sub_category_id: number | null;
  brand_id: number | null;
  name: string;
  image: string | null;
  description: string | null;
  discount: string | null;
  rating: number | null;
  regular_price: number | null;
  sale_price: number | null;
  product_status: string | null;
  product_code: string | null;
  key_features: string | null;
  slug: string | null;
  meta_title: string | null;
  meta_url: string | null;
  topbar_heading: string | null;
  topbar_description: string | null;
  bottom_description: string | null;
  is_best_seller: boolean | null;
  sale_end_date: string | null;
  created_at: string;
  updated_at: string;
};

export type Profile = {
  id: string;
  full_name: string | null;
  is_admin: boolean;
  created_at: string;
  updated_at: string;
};

export type ProductWithRelations = Product & {
  category: Pick<Category, "id" | "name"> | null;
  brand: Pick<Brand, "id" | "name"> | null;
};
