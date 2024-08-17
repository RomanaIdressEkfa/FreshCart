<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        Product::updateorcreate(
            ['id' => $id],
            [
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'sub_sub_category_id' => $request->sub_sub_category_id,
                'brand_id' => $request->brand_id,
                'name' => $request->name,
                'description' => $request->description,
                'discount' => $request->discount,
                'rating' => $request->rating,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'product_status' => $request->product_status,
                'product_code' => $request->product_code,
                'key_features' => $request->key_features,
                'slug' => $request->slug,
                'topbar_heading' => $request->topbar_heading,
                'topbar_description' => $request->topbar_description,
                'bottom_description' => $request->bottom_description,
                'meta_title' => $request->meta_title,
                'meta_url' => $request->meta_url,
                'is_best_seller' => $request->is_best_seller,
                'sale_end_date' => $request->sale_end_date,
                'image' => Helper::uploadFile($request->file('image'), 'product', isset($id) ? Product::find($id)->image : null),
            ]
            );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function subSubCategory()
    {
        return $this->belongsTo(SubSubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
