<?php

namespace App\Http\Services\Common;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    /**
     * @param $message
     * @param $data
     * @return JsonResponse
     */
    public static function success($message, $data = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * @param $message
     * @param int $statusCode
     * @param $data
     * @return JsonResponse
     */
    public static function error($message, int $statusCode = 400, $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
