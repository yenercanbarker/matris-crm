<?php

namespace App\Http\Services\Auth;

use App\Exceptions\CredentialsNotMatchException;
use App\Exceptions\RegisterException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Common\ResponseService;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param LoginRequest $request
     * @return array
     * @throws CredentialsNotMatchException
     */
    public function login(LoginRequest $request): array
    {
        $user = User::where(['email' => $request->email])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return [
                'token' => $user->createToken('api-token')->plainTextToken,
            ];
        }

        throw new CredentialsNotMatchException(__('auth.failed'));
    }

    /**
     * @param RegisterRequest $request
     * @return array
     * @throws RegisterException
     */
    public function register(RegisterRequest $request): array
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return [
                'user' => $user,
                'token' => $user->createToken('api-token')->plainTextToken
            ];

        } catch (Exception $exception) {
            throw new RegisterException($exception->getMessage());
        }
    }
}
