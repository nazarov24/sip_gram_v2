<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthService
{
    public static function login(array $credentials): JsonResponse
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->accessToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public static function register(RegisterRequest $request): array
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        return [
            'message' => 'User registered successfully',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $validated['role']
            ]
        ];
    }
}
