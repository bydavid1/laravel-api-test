<?php

namespace App\Services\Auth;

use App\Models\User;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

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
}
