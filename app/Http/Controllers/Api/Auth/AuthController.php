<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\CredentialsNotMatchException;
use app\Exceptions\RegisterException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Auth\AuthService;
use App\Http\Services\Common\ResponseService;
use Illuminate\Http\JsonResponse;

class AuthController
{
    public function __construct(protected readonly AuthService $authService)
    {
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws CredentialsNotMatchException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return ResponseService::success(__('auth.login'), $this->authService->login($request));
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     * @throws RegisterException
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return ResponseService::success(__('auth.register'), $this->authService->register($request));
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return ResponseService::success(__('auth.logout'));
    }
}
