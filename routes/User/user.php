<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication routes
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('users', [UserController::class,'list']);
    Route::post('user', [UserController::class,'store']);
    Route::put('user/{id}', [UserController::class,'update']);
    Route::delete('user/{id}', [UserController::class,'destroy']);
});
