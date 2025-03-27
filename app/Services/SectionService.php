<?php

namespace App\Services;

use App\Http\Requests\SectionRequest;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\User;
use Illuminate\Http\Request;

class SectionService
{

    public static function index()
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

        return $sections;
    }


    public static function store(SectionRequest $request)
    {
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

        return $section;
    }


    public static function update(SectionRequest $request, $id)
    {
        $section = Section::find($id);

        if (!$section) {
            return ['message' => 'Раздел не найден'];
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

        return $section;
    }


    public static function destroy($id)
    {
        $section = Section::find($id);

        if (!$section) {
            return ['message' => 'Раздел не найден'];
        }

        $section->subsections()->delete();

        $section->delete();

        return ['message' => "Раздел удалена"];

    }

}