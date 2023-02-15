<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication routes
*/

Route::post('login', [AuthController::class,'signIn']);
Route::post('signup', [AuthController::class,'signup']);
