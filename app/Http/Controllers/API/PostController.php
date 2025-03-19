<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Swagger\PostSwagger;

class PostController extends Controller
{

    public function store(Request $request)
    {

        // if (!Auth::user()->can('edit posts')) {
        //     return response()->json([
        //         'message' => 'У вас нет прав для создания поста.'
        //     ], 403);
        // }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);


        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Пост успешно создан.',
            'post' => $post
        ], 201);
    }




    public function index()
    {
        return response()->json(Post::all(), 200);
    }



    public function update(Request $request, $id)
    {

        $post = Post::find($id);
        if(!$post){return response()->json(['message' => 'Post not found'], 404);}

        // if (!Auth::user()->can('edit posts')) {
        //     return response()->json(['message' => 'У вас нет прав для обновления поста.'], 403);
        // }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return response()->json([
            'message' => 'Пост успешно обновлён.',
            'post' => $post
        ], 200);
    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // if (!Auth::user()->can('delete posts')) {
        //     return response()->json(['message' => 'У вас нет прав для удаления поста.'], 403);
        // }

        $post->delete();

        return response()->json(['message' => 'Пост успешно удалён.'], 200);
    }

}


