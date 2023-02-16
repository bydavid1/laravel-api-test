<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication routes
*/

Route::post('login', [AuthController::class,'signIn'])->name('login');
Route::post('signup', [AuthController::class,'signup']);
Route::post('forgot-password', [AuthController::class, 'recoveryPassword']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
