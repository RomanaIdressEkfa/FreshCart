<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {

        // $categories = Category::with('products')->get();
        // $allProducts = $categories->flatMap(function($category) {
        //     return $category->products;
        $categories = Category::with(['subcategories.products'])->get();
        $allProducts = $categories->flatMap(function ($category) {
            return $category->subcategories->flatMap(function ($subcategory) {
                return $subcategory->products;
            });
        })->take(5);
        $bestSellingProducts = Product::where('is_best_seller', true)
            ->whereDate('sale_end_date', '>=', now())->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
            $productId = $request->query('id');
            // Fetch data as needed
            $product = $productId ? Product::find($productId) : null;
        return view('frontend.master', [
            'categories' => Category::orderBy('created_at', 'desc')->get(),
            'products' => Product::orderBy('created_at', 'desc')->take(10)->get(),
            'fruitProducts' => Category::whereIn('name', ['Fruits'])->orderBy('created_at', 'desc')->get(),
            'vegetableProducts' => Category::whereIn('name', ['Vegetables'])->orderBy('created_at', 'desc')->get(),
            'allProducts' => $allProducts,
            'bestSellingProducts' => $bestSellingProducts,
            'product' => $product,

        ]);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "sale_price" => $product->sale_price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    // public function update(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart successfully updated!');
    //     }
    // }
    public function update(Request $request)
{
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);

        $subtotal = $cart[$request->id]["sale_price"] * $cart[$request->id]["quantity"];
        $total = 0;

        foreach ($cart as $details) {
            $total += $details['sale_price'] * $details['quantity'];
        }

        return response()->json([
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }
}

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function allProduct($id){
        return view('frontend.allProduct',[
        'cat' => Category::find($id),
            'categories' => Category::all(),
            "products" => Product::where("category_id", $id)->paginate(10),

        ]);
    }
    // public function allProduct($id)
    // {
    //     $category = Category::find($id);

    //     // Check if the category exists
    //     if (!$category) {
    //         return abort(404, 'Category not found'); // Handle the case where the category doesn't exist
    //     }

    //     $products = Product::where("category_id", $id)->paginate(10);

    //     return view('frontend.allProduct', [
    //         'category' => $category,
    //         'categories' => Category::all(),
    //         'products' => $products,
    //     ]);
    // }
    public function wishlist(){
        return view('frontend.wishlist');
    }
    public function checkout(){
        return view('frontend.checkout');
    }

}
