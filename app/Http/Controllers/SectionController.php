<?php

namespace App\Http\Controllers;

use App\Models\ModelHasPermision;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\User;
use Illuminate\Http\Request;

class SectionController extends Controller
{

  

   /**
     * @OA\Get(
     *     path="/api/sections/index",
     *     summary="Получить все разделы с ролями и разрешениями",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Orders"),
     *                 @OA\Property(property="roles", type="array", @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="role", type="string", example="admin"),
     *                     @OA\Property(property="permissions", type="array", @OA\Items(type="string", example="edit posts"))
     *                 ))
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $sections = Section::with('subsections')->get();
    
        $sections->transform(function ($section) {
    
            $roles = Role::whereHas('sections', function ($query) use ($section) {
                $query->where('sections.id', $section->id);
            })->get();
    
            $section->roles = $roles->map(function ($role) {
                return [
                    'role' => $role->name,
                    'permissions' => $role->permissions->pluck('name') 
                ];
            });
    
            $section->subsections->transform(function ($subsection) {
                $subsectionRoles = Role::whereHas('subsections', function ($query) use ($subsection) {
                    $query->where('subsections.id', $subsection->id);
                })->get();
    
                $subsection->roles = $subsectionRoles->map(function ($role) {
                    return [
                        'role' => $role->name,
                        'permissions' => $role->permissions->pluck('name') 
                    ];
                });
    
                return $subsection;
            });
    
            return $section;
        });
    
        return response()->json($sections, 200);
    }
    
    
    

    


   /**
     * @OA\Post(
     *     path="/api/sections",
     *     summary="Создать новый раздел с подразделами",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "icon", "subsections"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="icon", type="string"),
     *             @OA\Property(
     *                 property="subsections",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="component_id", type="string")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Создание успешно",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'icon' => 'required|string',
            'subsections' => 'required|array',
            'subsections.*.title' => 'required|string',
            'subsections.*.component_id' => 'required|string',
        ]);

        $section = Section::create([
            'title' => $request->title,
            'icon' => $request->icon,
        ]);

        $subsections = collect($request->subsections)->map(function ($subsection) use ($section) {
            return new Subsection([
                'title' => $subsection['title'],
                'component_id' => $subsection['component_id'],
                'section_id' => $section->id,
            ]);
        });

        $section->subsections()->saveMany($subsections);

        return response()->json($section, 201);
    }


   /**
     * @OA\Put(
     *     path="/api/sections/{id}",
     *     summary="Обновить раздел с подразделами",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID раздела",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "icon", "subsections"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="icon", type="string"),
     *             @OA\Property(
     *                 property="subsections",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer", description="ID подраздела (для обновления)"),
     *                     @OA\Property(property="title", type="string"),
     *                     @OA\Property(property="component_id", type="string")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Обновление успешно",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'icon' => 'required|string',
            'subsections' => 'required|array',
            'subsections.*.title' => 'required|string',
            'subsections.*.component_id' => 'required|string',
        ]);

        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Раздел не найден'], 404);
        }

        $section->update([
            'title' => $request->title,
            'icon' => $request->icon,
        ]);

        foreach ($request->subsections as $subsectionData) {
            if (isset($subsectionData['id'])) {
                $subsection = Subsection::find($subsectionData['id']);
                if ($subsection) {
                    $subsection->update([
                        'title' => $subsectionData['title'],
                        'component_id' => $subsectionData['component_id'],
                    ]);
                }
            } else {
                $section->subsections()->create([
                    'title' => $subsectionData['title'],
                    'component_id' => $subsectionData['component_id'],
                ]);
            }
        }

        return response()->json($section, 200);
    }


    /**
     * @OA\Delete(
     *     path="/api/sections/{id}",
     *     summary="Удалить раздел",
     *     tags={"Section"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID раздела для удаления",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Раздел успешно удален",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Раздел не найден",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Раздел не найден")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Раздел не найден'], 404);
        }

        $section->subsections()->delete(); 

        $section->delete();

        return response()->json(null, 204);
    }

}

