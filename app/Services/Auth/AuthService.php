<?php

namespace App\Services\Auth;

use App\Exceptions\ResetPasswordCodeExpiredException;
use App\Mail\RecoveryPasswordMail;
use App\Models\ResetPasswordCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    /**
     * Const  save token name change .Env
     */
    const TOKEN_NAME = 'LaravelBase8Token';

    public function signIn(array $credentials) : User
    {
        if (!Auth::attempt($credentials)) {
            throw new AuthenticationException();
        }

        $user = Auth::user();
        $user['access_token'] = $user->createToken(self::TOKEN_NAME)->plainTextToken;

        return $user;
    }

    public function signUp(array $data) : User
    {
        $body = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthdate' => $data['birthdate'],
            'password' => bcrypt($data['password'])
        ];

        $user = User::create($body);
        $user['access_token'] = $user->createToken(self::TOKEN_NAME)->plainTextToken;
        return $user;
    }

    public function forgotPassword(string $email) : void
    {
        $user = User::where('email', $email)->first();

        if ($user) {

            $recovery = ResetPasswordCode::where('email', $email)->first();

            if($recovery != null) $recovery->delete();

            $recoveryCode = $this->generateRecoveryCode();
            ResetPasswordCode::create([
                'email' => $email,
                'code' => $recoveryCode,
                'expires_at' => Carbon::now()->addMinutes(15)
            ]);

            Mail::to($email)->send(new RecoveryPasswordMail($recoveryCode));
        }
    }

    private function generateRecoveryCode(): string
    {
        return strval(rand(100000, 999999));
    }

    public function resetPassword(array $credentials) : void
    {
        $passwordReset = ResetPasswordCode::where('code', $credentials['code'])->first();

        if ($passwordReset->created_at > $passwordReset->expires_at) {
            $passwordReset->delete();
            throw new ResetPasswordCodeExpiredException();
        }

        $user = User::where('email', $passwordReset->email)->first();

        $user->update([
            'password' => bcrypt($credentials['password'])
        ]);

        $passwordReset->delete();
    }
}
