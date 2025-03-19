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
use App\Swagger\PermisionRoleSwagger;

class PermisionRoleController extends Controller
{
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
