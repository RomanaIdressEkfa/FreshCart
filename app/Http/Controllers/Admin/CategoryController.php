<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index', [
            'sl' => !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0,
            'categories' => Category::latest()->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
     // return $request->all();
     // dd ($request->all());
    // public function store(Request $request)
    // {

    //     $this->validate($request, [
    //         'name' => 'required',

    //     ]);

    //     Category::createOrUpdate($request);
    //     return redirect()->route('category.index')->with('status', 'Category created successfully');
    // }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'svg_code' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Handle file upload
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        } elseif ($request->filled('svg_code')) {
            // Store the SVG code
            $data['image'] = $request->input('svg_code');
        }

        // Save the category with either the image or SVG code
        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
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

        Category::createOrUpdate($request, $id);
        return redirect()->route('category.index')->with('status', 'Category updated successfully');
    }


    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            $imagePath = public_path($category->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the category
        $category->delete();

        // Category::destroy($id);
        return redirect()->route('category.index')->with('status', 'Category deleted successfully');
    }
}
