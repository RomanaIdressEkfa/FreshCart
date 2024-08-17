<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        SubSubCategory::updateorcreate(
            ['id' => $id],
            [
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'name' => $request->name,
                'topbar_heading' => $request->topbar_heading,
                'topbar_description' => $request->topbar_description,
                'bottom_description' => $request->bottom_description,
                'meta_title' => $request->meta_title,
                'meta_url' => $request->meta_url,
                'total_product' => $request->total_product,
                'image' => Helper::uploadFile($request->file('image'), 'subsubcategory', isset($id) ? SubSubCategory::find($id)->image : null),
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
