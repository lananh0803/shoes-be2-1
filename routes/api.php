<?php

use App\Http\Controllers\api\ApiBrandController;
use App\Http\Controllers\api\ApiCartController;
use App\Http\Controllers\api\ApiCheckOut;
use App\Http\Controllers\api\ApiCommentController;
use App\Http\Controllers\api\ApiProductController;
use App\Http\Controllers\api\ApiProductDetail;
use App\Http\Controllers\api\ApiProductImage;
use App\Http\Controllers\api\ApiProductListController;
use App\Http\Controllers\api\ApiRegistereController;
use App\Http\Controllers\api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//api search sp
Route::get('products/search', [ApiProductController::class, 'search']);
//Api thêm xóa sửa hiện thị , chi tiết sản phẩm
Route::resource('products', ApiProductController::class);
//api phân sản phẩm theo brand
Route::POST('getProductListFilte', [ApiProductListController::class, 'getProductListFilte']);
// Route::POST('getProductOfBrandFilte',[ ApiProductListController::class,'getProductOfBrandFilte']);

//api login
Route::resource('login', LoginController::class);
//api Registere
Route::resource('registere', ApiRegistereController::class);

//api brand
Route::resource('brands', ApiBrandController::class);
//api cart
Route::resource('carts', ApiCartController::class);

//api review
Route::resource('comments', ApiCommentController::class);



//==== AUTH APIS =====
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-password', [AuthController::class, 'changePassWord']);
});

//==== PRODUCT APIS =====
Route::group([
    'middleware' => 'api',
    'prefix' => 'product'
], function ($router) {
    Route::get('/all', [ApiProductController::class, 'getAll']);
    Route::post('/', [ApiProductController::class, 'addNew']);
    Route::put('/', [ApiProductController::class, 'update']);
    Route::delete('/{productId}', [ApiProductController::class, 'delete']);
    Route::get('/news', [ApiProductController::class, 'getNewsProduct']);
    Route::get('/hots', [ApiProductController::class, 'getHotsProduct']);
    Route::get('/{productId}', [ApiProductController::class, 'show']);
});


//brand APIS
Route::group([
    'middleware' => 'api',
    'prefix' => 'brand'
], function ($router) {
    Route::get('/all', [ApiBrandController::class, 'getAll']);
    Route::get('/{brandId}', [ApiBrandController::class, 'show']);
    Route::post('/', [ApiBrandController::class, 'addNew']);
    Route::put('/', [ApiBrandController::class, 'update']);
    Route::delete('/{brandId}', [ApiBrandController::class, 'delete']);
});

//ProductDetail APIS
Route::group([
    'middleware' => 'api',
    'prefix' => 'productDetail'
], function ($router) {
    Route::get('/all', [ApiProductDetail::class, 'getAll']);
    Route::get('/{producDetailtId}', [ApiProductDetail::class, 'show']);
    Route::post('/', [ApiProductDetail::class, 'addNew']);
    Route::put('/', [ApiProductDetail::class, 'update']);
    Route::delete('/{producDetailtId}', [ApiProductDetail::class, 'delete']);
});

//ProductDetail APIS
Route::group([
    'middleware' => 'api',
    'prefix' => 'productImage'
], function ($router) {
    Route::get('/all', [ApiProductImage::class, 'getAll']);
    Route::get('/{productImageId}', [ApiProductImage::class, 'show']);
    Route::post('/', [ApiProductImage::class, 'addNew']);
    Route::put('/', [ApiProductImage::class, 'update']);
    Route::delete('/{productImageId}', [ApiProductImage::class, 'delete']);
});


//Cart APIS
Route::group([
    'middleware' => 'api',
    'prefix' => 'cart'
], function ($router) {
    Route::get('/all', [ApiCartController::class, 'getUserCart']);
    Route::get('/{cartId}', [ApiCartController::class, 'show']);
    Route::post('/', [ApiCartController::class, 'addNew']);
    Route::put('/', [ApiCartController::class, 'update']);
    Route::delete('/{cartId}', [ApiCartController::class, 'delete']);
});

//CheckOut APIS
Route::group([
    'middleware' => 'api',
    'prefix' => 'checkout'
], function ($router) {
    Route::get('/all', [ApiCheckOut::class, 'getAll']);
    Route::get('/{orderId}', [ApiCheckOut::class, 'show']);
    Route::post('/', [ApiCheckOut::class, 'addNew']);
    Route::put('/', [ApiCheckOut::class, 'update']);
    Route::delete('/{orderId}', [ApiCheckOut::class, 'delete']);
});