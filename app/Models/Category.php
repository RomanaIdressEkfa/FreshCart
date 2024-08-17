<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function createOrUpdate($request, $id = null)
    {
        Category::updateorcreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'image' => Helper::uploadFile($request->file('image'), 'category', isset($id) ? Category::find($id)->image : null),
            ]
            );
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function subSubCategories()
    {
        return $this->hasManyThrough(SubSubCategory::class, SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
