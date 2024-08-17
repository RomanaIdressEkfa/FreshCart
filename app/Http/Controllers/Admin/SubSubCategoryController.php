<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubSubCategoryController extends Controller
{
    public function index()
    {
        return view('backend.subsubcategory.index', [
            'sl' => !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0,
            'subsubcategories' => SubSubCategory::latest()->paginate(8),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.subsubcategory.index',[
            // 'categories' => Category::all(),
            // 'subcategories' => SubCategory::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            // 'category_id' => 'required|string|max:255',
            // 'subcategory_id' => 'required|string|max:255',

        ]);

        SubSubCategory::createOrUpdate($request);
        return redirect()->route('subsubcategory.index')->with('status', 'SubSubCategory created successfully');
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
            // 'category_id' => 'required|string|max:255',
            // 'subcategory_id' => 'required|string|max:255',
        ]);

        SubSubCategory::createOrUpdate($request, $id);
        return redirect()->route('subsubcategory.index')->with('status', 'SubSubCategory updated successfully');
    }


    public function destroy(string $id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        if ($subsubcategory->image) {
            $imagePath = public_path($subsubcategory->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the category
        $subsubcategory->delete();

        // Category::destroy($id);
        return redirect()->route('subsubcategory.index')->with('status', 'SubSubCategory deleted successfully');
    }
}
