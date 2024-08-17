<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('backend.brand.index', [
            'sl' => !is_null(\request()->page) ? (\request()->page -1 )* 5 : 0,
            'brands' => Brand::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.index');
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

        Brand::createOrUpdate($request);
        return redirect()->route('brand.index')->with('status', 'Brand created successfully');
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

        Brand::createOrUpdate($request, $id);
        return redirect()->route('brand.index')->with('status', 'Brand updated successfully');
    }


    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->image) {
            $imagePath = public_path($brand->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the category
        $brand->delete();

        // Category::destroy($id);
        return redirect()->route('brand.index')->with('status', 'Brand deleted successfully');
    }
}
