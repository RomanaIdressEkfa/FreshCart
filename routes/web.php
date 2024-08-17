<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('backend.master');
// });
// Route::get('/home', function () {
//     return view('frontend.master');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [FrontendController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [FrontendController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [FrontendController::class, 'remove'])->name('remove_from_cart');
Route::get('/allProduct/{id}', [FrontendController::class, 'allProduct'])->name('allProduct');
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');


Route::get('/backend', [BackendController::class, 'index'])->name('backend');


// Backend Controller start
Route::resource('/category', CategoryController::class);
Route::resource('/subcategory', SubCategoryController::class);
Route::resource('/subsubcategory', SubSubCategoryController::class);
Route::resource('/product', ProductController::class);
Route::resource('/brand', BrandController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
