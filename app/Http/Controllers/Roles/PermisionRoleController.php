<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;

use App\Models\User;
use Mockery\Matcher\Subset;
use Spatie\Permission\PermissionRegistrar;

class PermisionRoleController extends Controller
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
    public function assignPermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        $validated = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionNames = Permission::whereIn('id', $validated['permissions'])->pluck('name');

        $role->syncPermissions($permissionNames);

        $users = User::role($role->name)->get();

        foreach ($users as $user) {
            $user->syncPermissions($permissionNames);
        }

        return response()->json([
            'message' => 'Permissions assigned successfully to the role and all associated users.',
            'role_id' => $role->id,
            'assigned_permissions' => $permissionNames,
        ], 200);
    }


     

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
    public function removePermissionById($role_id, $permission_id)
    {
        $role = Role::findOrFail($role_id);
        $permission = Permission::findOrFail($permission_id);
    
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
    
            $users = User::role($role->name)->get();
    
            foreach ($users as $user) {
                if ($user->hasPermissionTo($permission)) {
                    $user->revokePermissionTo($permission);
                }
            }
        }
    
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    
        return response()->json(['message' => 'Permission removed successfully.'], 200);
    }
    
    



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
    public function assignRoleToSection(Request $request, $section_id)
    {
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $section = Section::find($section_id);
        if (!$section) {
            return response()->json(['message' => 'Section not found.'], 404);
        }
        $role = Role::findOrFail($request->role_id);

        $section->roles()->attach($role->id);

        return response()->json([
            'message' => 'Role assigned to section successfully.',
            'section' => $section->title,
            'role' => $role->name
        ], 200);
    }


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
    public function assignRoleToSubsection(Request $request, $subsection_id)
    {
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $subsection = Subsection::find($subsection_id);
        if (!$subsection) {
            return response()->json(['message' => 'Subsection not found.'], 404);
        }
    
        $role = Role::findOrFail($request->role_id);

        $subsection->roles()->attach($role->id);

        return response()->json([
            'message' => 'Role assigned to subsection successfully.',
            'subsection' => $subsection->title,
            'role' => $role->name
        ], 200);
    }

    


    
}
