<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckOutController;
use App\Http\Controllers\front\CommentDetailController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ProductDetailController as FrontProductDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\front\ProductListController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('front.home');
// });
Route::get('/', [HomeController::class,'getProduct'])->name('home.getProduct');
Route::get('/productsList/search/', [ProductListController::class, 'searchProduct'])->name('productsList.search');
Route::get('/productLists', [ProductListController::class,'getProductNew'])->name('productLists.new');
Route::get('/productLists/brand/{id}', [ProductListController::class,'getProductOfBrand'])->name('productLists.brand');
Route::get('/productLists/category/{id}', [ProductListController::class,'getProductOfGander'])->name('productLists.category');
Route::resource('/viewCart', CartController::class);
Route::get('/productDetail/{id}', [FrontProductDetailController::class,'show'])->name('productDetail.show');
Route::resource('comments', CommentDetailController::class);
Route::resource('checkouts', CheckOutController::class);


Route::prefix('admin')->middleware('auth', 'can:view-admin')->group(function () {
    Route::get('/', [DashboardController::class, 'statistical']);
    Route::get('/products/search/', [ProductController::class, 'search'])->name('products.search');
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::get('products', [ProductController::class, 'getAll'])->name('products.getAll');
    Route::resource('productImages', ProductImageController::class);
    Route::get('productImages', [ProductImageController::class, 'getAll'])->name('productImages.getAll');
    Route::resource('productDetails', ProductDetailController::class);
    Route::get('productDetails', [ProductDetailController::class, 'getAll'])->name('productDetails.getAll');
    Route::resource('orders', OrderController::class);
    Route::get('orders', [OrderController::class, 'getAll'])->name('orders.getAll');
    Route::resource('users', UserController::class);
    Route::get('users', [UserController::class, 'getAll'])->name('users.getAll');
    Route::post('users/role/{id}', [UserController::class, 'role'])->name('users.role');
});


require __DIR__ . '/auth.php';
