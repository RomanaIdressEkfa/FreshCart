<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('backend.subcategory.index', [
            'sl' => !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0,
            'subcategories' => SubCategory::latest()->paginate(8),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.subcategory.index', [
            // 'categories' => Category::all()
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
            'category_id' => 'required|string|max:255',


        ]);

        SubCategory::createOrUpdate($request);
        return redirect()->route('subcategory.index')->with('status', 'SubCategory created successfully');
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
            'category_id' => 'required|string|max:255',
        ]);

        SubCategory::createOrUpdate($request, $id);
        return redirect()->route('subcategory.index')->with('status', 'SubCategory updated successfully');
    }


    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->image) {
            $imagePath = public_path($subcategory->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the category
        $subcategory->delete();

        // Category::destroy($id);
        return redirect()->route('subcategory.index')->with('status', 'SubCategory deleted successfully');
    }
}
