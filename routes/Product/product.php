<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('products', [ProductController::class,'list']);
    Route::post('product', [ProductController::class,'store']);
    Route::post('product/{id}', [ProductController::class,'update']);
    Route::delete('product/{id}', [ProductController::class,'destroy']);
});
