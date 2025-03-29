<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;


class SectionSwagger
{

   /**
     * @OA\Get(
     *     path="/api/sections/index",
     *     summary="Получить все разделы с ролями и разрешениями",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Orders"),
     *                 @OA\Property(property="roles", type="array", @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="role", type="string", example="admin"),
     *                     @OA\Property(property="permissions", type="array", @OA\Items(type="string", example="edit posts"))
     *                 ))
     *             )
     *         )
     *     )
     * )
     */

    public function index(){}


   /**
     * @OA\Post(
     *     path="/api/sections",
     *     summary="Создать новый раздел с подразделами",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "icon", "subsections"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="icon", type="string"),
     *             @OA\Property(
     *                 property="subsections",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="component_id", type="string")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создание успешно",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */

    public function store(){}


   /**
     * @OA\Put(
     *     path="/api/sections/{id}",
     *     summary="Обновить раздел с подразделами",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID раздела",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "icon", "subsections"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="icon", type="string"),
     *             @OA\Property(
     *                 property="subsections",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer", description="ID подраздела (для обновления)"),
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="component_id", type="string")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Обновление успешно",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */

    public function update(){}

    
    /**
     * @OA\Delete(
     *     path="/api/sections/{id}",
     *     summary="Удалить раздел",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID раздела для удаления",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Раздел успешно удален",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Раздел не найден",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Раздел не найден")
     *         )
     *     )
     * )
     */
    public function destroy(){}


   
}
