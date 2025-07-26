<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class CredentialsNotMatchException extends Exception
{
    /**
     * @param $message
     * @param $code
     */
    public function __construct($message, $code = 400)
    {
        parent::__construct($message, $code);
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
        ], $this->getCode() ?: 400);
    }
}
