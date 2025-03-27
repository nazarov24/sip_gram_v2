<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;
use App\Swagger\Auth\AuthSwagger;

class MenusController extends Controller
{
     public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        $menus = Menus::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => \Auth::id(),
        ]);

        return response()->json([
            'message' => 'Mеню успешно создан.',
            'menus' => $menus
        ], 201);
    }




    public function index()
    {
        return response()->json(Menus::all(), 200);
    }



    public function update(Request $request, $id)
    {

        $menus = Menus::find($id);
        if(!$menus){return response()->json(['message' => 'Menus not found'], 404);}


        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $menus->update($validated);

        return response()->json([
            'message' => 'Mеню успешно обновлён.',
            'menus' => $menus
        ], 200);
    }



    public function destroy($id)
    {
        $menus = Menus::findOrFail($id);

        $menus->delete();

        return response()->json(['message' => 'Mеню успешно удалён.'], 200);
    }

}
