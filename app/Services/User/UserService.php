<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getUser(int $id) : User
    {
        return User::findOrFail($id);
    }

    public function getUsers() : LengthAwarePaginator
    {
        return User::where('id', '!=', Auth::user()->id)->paginate();
    }

    public function storeUser(array $data) : User
    {
        $body = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthdate' => $data['birthdate'],
            'password' => bcrypt($data['password'])
        ];

        return User::create($body);
    }

    public function updateUser(User $user, array $data) : bool
    {
        $body = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthdate' => $data['birthdate'],
            'password' => $data['password'],
        ];

        return $user->update($body);
    }

    public function deleteUser(User $user) : bool
    {
        return $user->delete();
    }
}
