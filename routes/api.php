<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::middleware('api')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
});
