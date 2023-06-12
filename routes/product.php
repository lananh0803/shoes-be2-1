<?php

use App\Http\Controllers\api\ApiProductController;
use Illuminate\Support\Facades\Route;

//==== PRODUCT APIS =====
Route::group([
    'middleware' => 'api',
    'prefix' => 'product'
], function ($router) {
    Route::get('/all', [ApiProductController::class, 'getAll']);
    Route::get('/{productId}', [ApiProductController::class, 'show']);
    Route::post('/', [ApiProductController::class, 'addNew']);
    Route::put('/', [ApiProductController::class, 'update']);
    Route::delete('/{productId}', [ApiProductController::class, 'delete']);
});