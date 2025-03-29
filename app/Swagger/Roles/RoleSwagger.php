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

    /**
     * @OA\Post(
     *     path="/api/users/{user_id}/roles",
     *     summary="Назначить роль пользователю",
     *     tags={"Roles"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="path",
     *         description="ID пользователя, которому нужно назначить роль",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="role_id", type="integer", description="ID роли, которую нужно назначить пользователю")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Роль успешно назначена пользователю",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Роль успешно назначена пользователю."),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="role_name", type="string", example="admin")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пользователь или роль не найдены",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Пользователь или роль не найдены.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный запрос",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Роль не найдена")
     *         )
     *     )
     * )
     */

     public function assignRoleToUser(){}



}
