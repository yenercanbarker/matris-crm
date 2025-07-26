<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class RegisterException extends Exception
{
    /**
     * @param $code
     */
    public function __construct($code = 400)
    {
        parent::__construct(__('auth.register_error'), $code);
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
