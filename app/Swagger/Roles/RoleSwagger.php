<?php

namespace App\Swagger\Roles;

use OpenApi\Annotations as OA;


class RoleSwagger
{
     /**
     * @OA\Get(
     *     path="/api/roles",
     *     summary="Получить все роли",
     *     tags={"Roles"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Список всех ролей",
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
     *     path="/api/roles",
     *     summary="Создать новую роль",
     *     tags={"Roles"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="admin")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Роль создана",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string")
     *         )
     *     )
     * )
     */

    public function store(){}


   /**
     * @OA\Delete(
     *     path="/api/roles/{id}",
     *     summary="Удалить роль",
     *     tags={"Roles"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID роли",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Роль удалена",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Роль удалена")
     *         )
     *     )
     * )
     */

    public function destroy($id){}


}
