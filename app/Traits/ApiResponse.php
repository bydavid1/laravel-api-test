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
    public function responseSuccess($data = null, $message = null, int $statusCode = 200): JsonResponse
    {
        $response = [];

        if ($data != null) $response['data'] = $data;
        if ($message != null) $response['message'] = $message;

        return new JsonResponse($response, $statusCode);
    }


    /**
     * Returns error response
     *
     * @param string $message
     * @param array|null $report
     * @param integer $statusCode
     * @return JsonResponse
     */
    public function responseError($message, $report = null, $statusCode = 500): JsonResponse
    {
        $error = [];
        $error['code'] = (string) $statusCode;
        $error['title'] = $message;
        if ($report != null) $error['source'] = $report;

        return new JsonResponse(['error' => $error], $statusCode);
    }
}
