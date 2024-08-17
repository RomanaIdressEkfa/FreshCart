<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function createOrUpdate($request, $id = null)
    {
        SubCategory::updateorcreate(
            ['id' => $id],
            [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'heading' => $request->heading,
                'topbar_description' => $request->topbar_description,
                'bottom_description' => $request->bottom_description,
                'meta_title' => $request->meta_title,
                'meta_url' => $request->meta_url,
                'image' => Helper::uploadFile($request->file('image'), 'subcategory', isset($id) ? SubCategory::find($id)->image : null),
            ]
            );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subSubCategories()
    {
        return $this->hasMany(SubSubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
