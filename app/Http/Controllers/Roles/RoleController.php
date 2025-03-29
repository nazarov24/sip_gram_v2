<?php

namespace App\Http\Controllers\Roles;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Swagger\Roles\RoleSwagger;

class RoleController extends Controller
{

    public function index(){return Role::all();}


    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'api'
        ]);
        return response()->json($role, 201);
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return response()->json(['message' => 'Роль удалена'], 200);
    }

    public function assignRoleToUser(Request $request, $user_id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($user_id);

        $role = Role::findOrFail($request->role_id);

        $user->assignRole($role);

        return response()->json([
            'message' => 'Роль успешно назначена пользователю.',
            'user_id' => $user->id,
            'role_name' => $role->name
        ], 200);
    }





}
