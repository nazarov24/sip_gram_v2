<?php

namespace App\Http\Controllers;

use App\Models\ModelHasPermision;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Swagger\SectionSwagger;

class SectionController extends Controller
{


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

