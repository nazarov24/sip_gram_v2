<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;


class MenusSwagger
{

    /**
     * @OA\Post(
     *     path="/api/menus",
     *     summary="Создать новый меню",
     *     tags={"Menus"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "content"},
     *             @OA\Property(property="title", type="string", example="New Menus"),
     *             @OA\Property(property="content", type="string", example="This is the content of the menus.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="меню создан",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Menus created successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для создания меню",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="У вас нет прав для создания меню.")
     *         )
     *     )
     * )
     */


    public function store(){}

   /**
     * Получить список всех менюов
     * @OA\Get(
     *     path="/api/menus/index",
     *     summary="Получить все меню",
     *     tags={"Menus"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Список меню",
     *         @OA\JsonContent(type="array", @OA\Items())
     *     )
     * )
     */
    public function index(){}


    /**
     * Обновить меню
     * @OA\Put(
     *     path="/api/menus/{id}",
     *     summary="Обновить меню",
     *     tags={"Menus"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID меню",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "description"},
     *             @OA\Property(property="title", type="string", example="Updated Title"),
     *             @OA\Property(property="description", type="string", example="Updated description of the menus.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="меню обновлён",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Menus updated successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для обновления меню"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Mеню не найден"
     *     )
     * )
     */

    public function update(){}

    /**
     * Удалить меню
     * @OA\Delete(
     *     path="/api/menus/{id}",
     *     summary="Удалить меню",
     *     tags={"Menus"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID меню",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="меню удалён",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Menus deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для удаления меню"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="меню не найден"
     *     )
     * )
     */

    public function destroy(){}



}
