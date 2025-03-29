<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermisionRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;

use App\Models\User;
use App\Services\PermisionRoleServices;
use Mockery\Matcher\Subset;
use Spatie\Permission\PermissionRegistrar;
use App\Swagger\Roles\PermisionRoleSwagger;

class PermisionRoleController extends Controller
{
    public function getPermissions()
    {
        return PermisionRoleServices::getPermissions();
    }


    public function assignPermissions(PermisionRoleRequest $request, $user_id)
    {
        $validated = $request->validated();
        $result = PermisionRoleServices::assignPermissionsToUser($user_id, $validated['permissions']);
        return response()->json($result, 200);
    }


    public function removePermissionById($user_id, $permission_id)
    {
       $result = PermisionRoleServices::removePermissionFromUser($user_id, $permission_id);
       return response()->json($result, 200);
    }


    public function assignSectionsToRole(Request $request, $role_id)
    {
        $request->validate([
            'section_ids' => 'required|array',
            'section_ids.*' => 'integer|exists:sections,id',
        ]);
        return PermisionRoleServices::assignSectionsToRole($request, $role_id);
         
    }


    public function assignRoleToSubsections(Request $request, $role_id)
    {
        $request->validate([
            'subsection_ids' => 'required|array',
            'subsection_ids.*' => 'integer|exists:subsections,id',
        ]);
    
        return PermisionRoleServices::assignRoleToSubsections($request, $role_id);
    }



}
