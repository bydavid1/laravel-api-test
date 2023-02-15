<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    /**
     * Returns success response
     *
     * @param mixed $data
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseSuccess($data, $message = null): JsonResponse
    {
        if ($message != null) {
            return new JsonResponse([
                'success' => true,
                'payload' => $data,
                'message' => $message
            ], 200);
        }

        return new JsonResponse([
            'success' => true,
            'payload' => $data
        ]);
    }

    /**
     * Returns error response
     *
     * @param string|null $message
     * @param integer $statusCode
     * @return JsonResponse
     */
    public function responseError($message = null, $statusCode = 500): JsonResponse
    {
        return new JsonResponse([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }
}
