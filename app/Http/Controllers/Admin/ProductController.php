<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index', [
            'sl' => !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0,
            'products' => Product::latest()->paginate(8),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'subsubcategories' => SubSubCategory::all(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',

        ]);

        $productData = $request->only(['name']);
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $productData['sub_category_id'] = $request->sub_category_id;
        }

        Product::createOrUpdate($request);
        return redirect()->route('product.index')->with('status', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('backend.category.index', [
        //     'category' => Category::find($id)
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Product::createOrUpdate($request, $id);
        return redirect()->route('product.index')->with('status', 'Product updated successfully');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            $imagePath = public_path($product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the category
        $product->delete();

        // Category::destroy($id);
        return redirect()->route('product.index')->with('status', 'Product deleted successfully');
    }
    public function getsubcategory(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }

    public function getsubsubcategory(Request $request)
    {
        $subsubcategories = SubSubCategory::where('sub_category_id', $request->sub_category_id)->get();
        return response()->json($subsubcategories);
    }
}
