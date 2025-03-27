<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RoleSectionResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\SubSectionResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;

class PermisionRoleServices
{
    public static function getPermissions()
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

    
    public static function assignPermissionsToRole(int $roleId, array $permissions): array
    {
        $role = Role::findOrFail($roleId);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name');

        $role->syncPermissions($permissionNames);

        $users = User::role($role->name)->get();

        foreach ($users as $user) {
            $user->syncPermissions($permissionNames);
        }

        return [
            'message' => 'Разрешения успешно назначены роли и всем связанным с ней пользователям.',
            'role_id' => $role->id,
            'assigned_permissions' => $permissionNames,
        ];
    }


    public static function removePermissionById($role_id, $permission_id)
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

        return response()->json(['message' => 'Разрешения удалена'], 200);
    }


    public static function assignSectionsToRole(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);
        $sections = Section::whereIn('id', $request->section_ids)->get();

        if ($sections->isEmpty()) {
            return response()->json(['message' => 'Разделы не найдены.'], 404);
        }

        foreach ($sections as $section) {
            $section->roles()->attach($role->id);
        }

        return response()->json([
            'message' => 'Роль успешно привязана к разделам.',
            'role' => new RoleSectionResource($role),
            'sections' => SectionResource::collection($sections),
        ], 200);
    }

    


    public static function assignRoleToSubsections(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);
        $subsections = Subsection::whereIn('id', $request->subsection_ids)->get();
    
        if ($subsections->isEmpty()) {
            return response()->json(['message' => 'Подразделы не найдены.'], 404);
        }
    
        foreach ($subsections as $subsection) {
            $subsection->roles()->attach($role->id);
        }
    
        return response()->json([
            'message' => 'Роль успешно привязана к подразделам.',
            'role' => new RoleSectionResource($role),
            'subsections' => SubsectionResource::collection($subsections),
        ], 200);
    }
    

}