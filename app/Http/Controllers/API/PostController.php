<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   
    /**
     * @OA\Post(
     *     path="/api/posts",
     *     summary="Создать новый пост",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "content"},
     *             @OA\Property(property="title", type="string", example="New Post"),
     *             @OA\Property(property="content", type="string", example="This is the content of the post.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Пост создан",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post created successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для создания поста",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="У вас нет прав для создания поста.")
     *         )
     *     )
     * )
     */


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

   /**
     * Получить список всех постов
     * @OA\Get(
     *     path="/api/posts/index",
     *     summary="Получить все посты",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Список постов",
     *         @OA\JsonContent(type="array", @OA\Items())
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Post::all(), 200);
    }


    /**
     * Обновить пост
     * @OA\Put(
     *     path="/api/posts/{id}",
     *     summary="Обновить пост",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "content"},
     *             @OA\Property(property="title", type="string", example="Updated Title"),
     *             @OA\Property(property="content", type="string", example="Updated content of the post.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Пост обновлён",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post updated successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для обновления поста"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
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

    /**
     * Удалить пост
     * @OA\Delete(
     *     path="/api/posts/{id}",
     *     summary="Удалить пост",
     *     tags={"Posts"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Пост удалён",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Нет доступа для удаления поста"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
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


