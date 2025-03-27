<?php

namespace App\Swagger\Auth;

use OpenApi\Annotations as OA;


class AuthSwagger
{
     /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     summary="Авторизация и получение токена",
     *     tags={"Login"},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=true,
     *         description="Email пользователя",
     *         @OA\Schema(type="string", example="operator@example.com")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         required=true,
     *         description="Пароль пользователя",
     *         @OA\Schema(type="string", example="operator123")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Токен аутентификации",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", example="your-jwt-token-here")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Неверные учетные данные",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     )
     * )
     */

     public function login(){}
 
 
     /**
      * @OA\Post(
      *     path="/api/auth/register",
      *     summary="Регистрация нового пользователя с ролью",
      *     tags={"Register"},
      *     @OA\Parameter(
      *         name="name",
      *         in="query",
      *         required=true,
      *         description="Имя пользователя",
      *         @OA\Schema(type="string", example="Operator User")
      *     ),
      *     @OA\Parameter(
      *         name="email",
      *         in="query",
      *         required=true,
      *         description="Email пользователя",
      *         @OA\Schema(type="string", format="email", example="operator@example.com")
      *     ),
      *     @OA\Parameter(
      *         name="password",
      *         in="query",
      *         required=true,
      *         description="Пароль пользователя",
      *         @OA\Schema(type="string", example="operator123")
      *     ),
      *     @OA\Parameter(
      *         name="password_confirmation",
      *         in="query",
      *         required=true,
      *         description="Подтверждение пароля",
      *         @OA\Schema(type="string", example="operator123")
      *     ),
      *     @OA\Parameter(
      *         name="role",
      *         in="query",
      *         required=true,
      *         description="Роль пользователя",
      *         @OA\Schema(type="string", example="operator")
      *     ),
      *     @OA\Response(
      *         response=201,
      *         description="Пользователь успешно зарегистрирован",
      *         @OA\JsonContent(
      *             @OA\Property(property="message", type="string", example="User registered successfully"),
      *             @OA\Property(property="user", type="object",
      *                 @OA\Property(property="id", type="integer", example=1),
      *                 @OA\Property(property="name", type="string", example="Operator User"),
      *                 @OA\Property(property="email", type="string", format="email", example="operator@example.com"),
      *                 @OA\Property(property="role", type="string", example="operator")
      *             )
      *         )
      *     ),
      *     @OA\Response(
      *         response=422,
      *         description="Ошибка валидации",
      *         @OA\JsonContent(
      *             @OA\Property(property="message", type="string", example="The email field is required.")
      *         )
      *     )
      * )
      */
     public function register(){}
}
