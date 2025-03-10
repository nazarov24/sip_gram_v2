<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class PermisionRoleController extends Controller
{
    
    /**
     * Назначить разрешения пользователю
     * @OA\Post(
     *     path="/api/role/{id}/permissions",
     *     summary="Назначить разрешения пользователю",
     *     tags={"Assign permissions role"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID пользователя",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"permissions"},
     *             @OA\Property(property="permissions", type="array", @OA\Items(type="string", example="created posts"))
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
    public function assignPermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);

       
        $validated = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $user->syncPermissions($validated['permissions']);

        
        return response()->json(['message' => 'Permissions assigned successfully.'], 200);
    }

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
    public function getPermissions()
    {
        $users = User::all();
    
        $permissions = $users->map(function($user) {
            return [
                'role_id' => $user->id,
                'permissions' => $user->getAllPermissions()->pluck('name') 
            ];
        });
    
        return response()->json($permissions, 200);
    }

    /**
     * Удалить разрешения у пользователя
     * @OA\Delete(
     *     path="/api/role/{id}/permissions",
     *     summary="Удалить разрешения у пользователя",
     *     tags={"Assign permissions role"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID пользователя",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"permissions"},
     *             @OA\Property(property="permissions", type="array", @OA\Items(type="string", example="edit posts"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Разрешения удалены",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Permissions removed successfully.")
     *         )
     *     )
     * )
     */
    public function removePermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $permissions = is_array($request->permissions) ? $request->permissions : [$request->permissions];
    
        foreach ($permissions as $permission) {
            if ($user->hasPermissionTo($permission)) {
                $user->revokePermissionTo($permission);
            }
        }
    
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    
        return response()->json(['message' => 'Permissions removed successfully.'], 200);
    }
    
}
