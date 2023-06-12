<?php

use App\Http\Controllers\api\ApiBrandController;
use App\Http\Controllers\api\ApiCartController;
use App\Http\Controllers\api\ApiCommentController;
use App\Http\Controllers\api\ApiProductController;
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