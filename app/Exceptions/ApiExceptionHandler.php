<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiExceptionHandler extends ExceptionHandler
{
    use ApiResponse;

    public function render($request, $exception)
    {
        // If the exception is of type HttpResponseException, return the response without processing it
        if ($exception instanceof HttpResponseException) {
            return parent::render($request, $exception);
        }

        // If the exception is of type ValidationException, return an error response with the first validation message
        if ($exception instanceof ValidationException) {
            $error = $exception->validator->errors()->first();
            return $this->responseError(message: $error, statusCode: 422);
        }

        // If the exception is of type NotFoundHttpException, return an error message
        if ($exception instanceof NotFoundHttpException) {
            return $this->responseError(message: 'Recurso no encontrado', statusCode: 404);
        }

        // If the exception is of type AuthenticationException, return an error message
        if ($exception instanceof AuthenticationException) {
            return $this->responseError(message: 'Los datos de inicio de sesión son incorrectos', statusCode: 401);
        }

        // If the exception is of any other type, return an error response with a generic message and status code 500
        return $this->responseError(
            message: 'Ha ocurrido un error',
            report: config('app.debug') ? ['errors' => $exception->getMessage(), 'trace' => $exception->getTrace()] : null,
            statusCode: 500
        );
    }
}
