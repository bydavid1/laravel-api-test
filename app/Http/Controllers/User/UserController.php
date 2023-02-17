<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Services\User\UserService;
use App\Traits\ApiResponse;

class UserController extends Controller
{

    use ApiResponse;

    public function __construct(
        private UserService $userService
    )
    { }

    public function list() {
        return UserCollection::make($this->userService->getUsers());
    }

    public function store(RegisterRequest $request)
    {
        $this->userService->storeUser(data: $request->validated());

        return $this->responseSuccess( message: 'Usuario creado exitosamente', statusCode: 201);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $this->userService->updateUser(user: $this->userService->getUser($id), data: $request->validated());

        return $this->responseSuccess(message: 'Usuario actualizado exitosamente');
    }

    public function destroy(int $id)
    {
        $this->userService->deleteUser(user: $this->userService->getUser($id));

        return $this->responseSuccess(message: 'Usuario eliminado exitosamente');
    }
}
