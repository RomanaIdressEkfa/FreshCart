<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function createOrUpdate($request, $id = null)
    {
        Brand::updateorcreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'image' => Helper::uploadFile($request->file('image'), 'brand', isset($id) ? Brand::find($id)->image : null),
            ]
            );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
