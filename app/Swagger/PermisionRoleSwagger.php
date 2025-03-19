<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;


class PermisionRoleSwagger
{

      /**
     * Получить разрешения пользователя
     * @OA\Get(
     *     path="/api/role/permissions",
     *     summary="Получить разрешения пользователя",
     *     tags={"Assign permissions role"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Разрешения пользователя",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(type="string", example="edit-posts")
     *         )
     *     )
     * )
     */

    public function getPermissions(){}

   /**
     * Назначить разрешения роли и всем пользователям с этой ролью
     * @OA\Post(
     *     path="/api/role/{id}/permissions",
     *     summary="Назначить разрешения роли и пользователям",
     *     tags={"Assign permissions role"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID роли",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"permissions"},
     *             @OA\Property(property="permissions", type="array", @OA\Items(type="integer", example=1))
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Разрешения успешно назначены",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Permissions assigned successfully.")
     *         )
     *     )
     * )
     */


    public function assignPermissions(){}




   /**
     * Удалить разрешение по ID у пользователя
     * @OA\Delete(
     *     path="/api/role/{role_id}/permissions/{permission_id}",
     *     summary="Удалить разрешение по ID у пользователя",
     *     tags={"Assign permissions role"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="role_id",
     *         in="path",
     *         required=true,
     *         description="ID роля",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="permission_id",
     *         in="path",
     *         required=true,
     *         description="ID разрешения",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Разрешение удалено",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Permission removed successfully.")
     *         )
     *     )
     * )
     */


    public function removePermissionById(){}



    /**
     * @OA\Post(
     *     path="/api/sections/{section_id}/roles",
     *     summary="Назначить роль на раздел",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="section_id",
     *         in="path",
     *         required=true,
     *         description="ID раздела",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"role_id"},
     *             @OA\Property(property="role_id", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Роль успешно назначена на раздел",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Role assigned to section successfully."),
     *             @OA\Property(property="section", type="string", example="Orders"),
     *             @OA\Property(property="role", type="string", example="Manager")
     *         )
     *     )
     * )
     */


    public function assignRoleToSection(){}


    /**
     * @OA\Post(
     *     path="/api/subsections/{subsection_id}/roles",
     *     summary="Назначить роль на подраздел",
     *     tags={"Subsection"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="subsection_id",
     *         in="path",
     *         required=true,
     *         description="ID подраздела",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"role_id"},
     *             @OA\Property(property="role_id", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Роль успешно назначена на подраздел",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Role assigned to subsection successfully."),
     *             @OA\Property(property="subsection", type="string", example="User Management"),
     *             @OA\Property(property="role", type="string", example="Admin")
     *         )
     *     )
     * )
     */

    public function assignRoleToSubsection(){}

}
