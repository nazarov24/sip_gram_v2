<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;


class PermissionSwagger
{
    /**
     * @OA\Get(
     *     path="/api/permissions",
     *     summary="Получить все разрешения",
     *     tags={"Permissions"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Список разрешений",
     *         @OA\JsonContent(type="array", @OA\Items(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string")
     *         ))
     *     )
     * )
     */
    public function index(){}

    /**
     * @OA\Post(
     *     path="/api/permissions",
     *     summary="Создать разрешение",
     *     tags={"Permissions"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="edit posts")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Разрешение создано",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string")
     *         )
     *     )
     * )
     */
    public function store(){}

    /**
     * @OA\Put(
     *     path="/api/permissions/{id}",
     *     summary="Обновить разрешение",
     *     tags={"Permissions"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID разрешения",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="edit articles")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Разрешение обновлено",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string")
     *         )
     *     )
     * )
     */
    public function update(){}

    /**
     * @OA\Delete(
     *     path="/api/permissions/{id}/delete",
     *     summary="Удалить разрешение",
     *     tags={"Permissions"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID разрешения",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Разрешение удалено"
     *     )
     * )
     */
    public function destroy(){}

}
