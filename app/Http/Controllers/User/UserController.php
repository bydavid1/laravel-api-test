<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\OpenApi\RequestBodies\DeleteUserRequestBody;
use App\OpenApi\RequestBodies\ListUsersRequestBody;
use App\OpenApi\RequestBodies\StoreUserRequestBody;
use App\OpenApi\RequestBodies\UpdateUserRequestBody;
use App\OpenApi\Responses\DeleteUserResponse;
use App\OpenApi\Responses\ListUsersResponse;
use App\OpenApi\Responses\StoreUserResponse;
use App\OpenApi\Responses\UpdateUserResponse;
use App\Services\User\UserService;
use App\Traits\ApiResponse;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class UserController extends Controller
{

    use ApiResponse;

    public function __construct(
        private UserService $userService
    )
    { }

    /**
     * List users.
     *
     * List users except user authenticated
     */
    #[OpenApi\Operation(tags: ['user'], method: 'GET')]
    #[OpenApi\RequestBody(factory: ListUsersRequestBody::class)]
    #[OpenApi\Response(factory: ListUsersResponse::class)]
    public function list() {
        return UserCollection::make($this->userService->getUsers());
    }

    /**
     * Create new user.
     *
     * Creates new user with following data
     */
    #[OpenApi\Operation(tags: ['user'], method: 'POST')]
    #[OpenApi\RequestBody(factory: StoreUserRequestBody::class)]
    #[OpenApi\Response(factory: StoreUserResponse::class)]
    public function store(RegisterRequest $request)
    {
        $this->userService->storeUser(data: $request->validated());

        return $this->responseSuccess( message: 'Usuario creado exitosamente', statusCode: 201);
    }

     /**
     * Updates user.
     *
     * Updates user using UpdateRequest
     */
    #[OpenApi\Operation(tags: ['user'], method: 'PUT')]
    #[OpenApi\RequestBody(factory: UpdateUserRequestBody::class)]
    #[OpenApi\Response(factory: UpdateUserResponse::class)]
    public function update(UpdateRequest $request, int $id)
    {
        $this->userService->updateUser(user: $this->userService->getUser($id), data: $request->validated());

        return $this->responseSuccess(message: 'Usuario actualizado exitosamente');
    }

    /**
     * Deletes user
     *
     * Deletes user by id
     */
    #[OpenApi\Operation(tags: ['user'], method: 'DELETE')]
    #[OpenApi\RequestBody(factory: DeleteUserRequestBody::class)]
    #[OpenApi\Response(factory: DeleteUserResponse::class)]
    public function destroy(int $id)
    {
        $this->userService->deleteUser(user: $this->userService->getUser($id));

        return $this->responseSuccess(message: 'Usuario eliminado exitosamente');
    }
}
