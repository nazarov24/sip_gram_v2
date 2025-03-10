<?php

namespace App\Http\Controllers\Roles;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;

use Spatie\Permission\Models\Permission;



class PermissionController extends Controller
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
    public function index()
    {
        return Permission::all();
    }

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
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web' 
        ]);
        return response()->json($permission, 201);
        
    }

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->name]);

        return response()->json($permission);
    }

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
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['message' => 'Permissions removed successfully.'], 200);
    }


}
