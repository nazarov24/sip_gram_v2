<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;


class PostSwagger
{

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     summary="Создать новый пост",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "content"},
     *             @OA\Property(property="title", type="string", example="New Post"),
     *             @OA\Property(property="content", type="string", example="This is the content of the post.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Пост создан",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post created successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для создания поста",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="У вас нет прав для создания поста.")
     *         )
     *     )
     * )
     */


    public function store(){}

   /**
     * Получить список всех постов
     * @OA\Get(
     *     path="/api/posts/index",
     *     summary="Получить все посты",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Список постов",
     *         @OA\JsonContent(type="array", @OA\Items())
     *     )
     * )
     */
    public function index(){}


    /**
     * Обновить пост
     * @OA\Put(
     *     path="/api/posts/{id}",
     *     summary="Обновить пост",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "content"},
     *             @OA\Property(property="title", type="string", example="Updated Title"),
     *             @OA\Property(property="content", type="string", example="Updated content of the post.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Пост обновлён",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post updated successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для обновления поста"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */

    public function update(){}

    /**
     * Удалить пост
     * @OA\Delete(
     *     path="/api/posts/{id}",
     *     summary="Удалить пост",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Пост удалён",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для удаления поста"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */

    public function destroy(){}



}
