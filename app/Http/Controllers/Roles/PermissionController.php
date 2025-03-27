<?php

namespace App\Http\Controllers\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Swagger\Roles\PermissionSwagger;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }


    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        return response()->json($permission, 201);
    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|unique:permissions,name|max:255',]);
        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->name]);
        return response()->json($permission);
    }


    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return response()->json(['message' => 'Разрешение удалена.'], 200);
    }


}
