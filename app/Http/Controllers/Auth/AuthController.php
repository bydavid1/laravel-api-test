<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\Auth\AuthService;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AuthService $authService
    )
    {

    }

    public function signIn(LoginRequest $request)
    {
        $user = $this->authService->signIn(['email' => $request->input('email'), 'password' => $request->input('password')]);

        return $this->responseSuccess(new AuthResource($user));
    }

    public function signUp(RegisterRequest $request)
    {
        $user = $this->authService->signUp($request->validated());

        return $this->responseSuccess(new AuthResource($user));
    }
}
