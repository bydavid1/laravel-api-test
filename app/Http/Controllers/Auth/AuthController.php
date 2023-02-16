<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\Auth\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

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

    public function recoveryPassword(Request $request) {
        $this->validate($request, [
            'email' => 'required', 'email'
        ]);

        $this->authService->forgotPassword($request->input('email'));

        return $this->responseSuccess([], 'Si la dirección de correp esta registrado se enviará un correo con la información para recuperar');
    }

    public function resetPassword(ResetPasswordRequest $request) {
        $this->authService->resetPassword($request->only('email', 'password', 'password_confirmation', 'code'));

        return $this->responseSuccess([], 'Contraseña actualizada');
    }
}
