<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Roles\PermissionController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Roles\PermisionRoleController;
use App\Http\Controllers\SectionController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('auth')->group(function (){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);    
});




Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles', [RoleController::class, 'store']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

Route::get('/permissions', [PermissionController::class, 'index']);
Route::post('/permissions', [PermissionController::class, 'store']);
Route::put('/permissions/{id}', [PermissionController::class, 'update']); 
Route::delete('/permissions/{id}/delete', [PermissionController::class, 'destroy']); 



Route::middleware('auth:api')->group(function () {
    Route::post('role/{id}/permissions', [PermisionRoleController::class, 'assignPermissions']);
    Route::get('role/permissions', [PermisionRoleController::class, 'getPermissions']);
    Route::delete('role/{role_id}/permissions/{permission_id}', [PermisionRoleController::class, 'removePermissionById']); 
});

Route::middleware(['auth:api'])->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->middleware('permission:created posts');
    Route::get('/posts/index', [PostController::class, 'index'])->middleware('permission:show posts'); 
    Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('permission:edit posts'); 
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('permission:deleted posts'); 
});

// Подраздел

Route::get('/sections/index', [SectionController::class, 'index']);
Route::post('/sections', [SectionController::class, 'store']);
Route::put('/sections/{id}', [SectionController::class, 'update']);
Route::delete('/sections/{id}', [SectionController::class, 'destroy']);


Route::post('sections/{section_id}/roles', [PermisionRoleController::class, 'assignRoleToSection']);
Route::post('/subsections/{subsection_id}/roles', [PermisionRoleController::class, 'assignRoleToSubsection']);





