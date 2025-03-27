<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\ModelHasPermision;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\User;
use App\Services\SectionService;
use Illuminate\Http\Request;
use App\Swagger\SectionSwagger;

class SectionController extends Controller
{

    public function index()
    {
        return SectionService::index();
    }


    public function store(SectionRequest $request)
    {
        $section = SectionService::store($request);
        return response()->json(['data' => $section], 201);
        
    }


    public function update(SectionRequest $request, $id)
    {
        $section = SectionService::update($request, $id);
        return response()->json([$section]);
    }


    public function destroy($id)
    {
        $section = SectionService::destroy($id);
        return response()->json([$section]);
    }

}

