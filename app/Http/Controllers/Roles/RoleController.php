<?php

namespace App\Http\Controllers\Roles;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Swagger\RoleSwagger;

class RoleController extends Controller
{

    public function index()
    {
        return Role::all();
    }


    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return response()->json($role, 201);
    }



    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return response()->json(['message' => 'Роль удалена'], 200);
    }





}
