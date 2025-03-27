<?php

use App\Http\Controllers\Api\Orders\JournalOrderController;
use App\Http\Controllers\Api\Orders\OrderController;
use App\Http\Controllers\Api\Orders\OrderTariffAllowanceController;
use App\Http\Controllers\Api\Orders\OrderTypeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Roles\PermissionController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Api\Orders\SearchAddressController;
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


// Подраздел

Route::get('/sections/index', [SectionController::class, 'index']);
Route::post('/sections', [SectionController::class, 'store']);
Route::put('/sections/{id}', [SectionController::class, 'update']);
Route::delete('/sections/{id}', [SectionController::class, 'destroy']);

Route::post('sections/{role_id}/roles', [PermisionRoleController::class, 'assignSectionsToRole']);
Route::post('/roles/{role_id}/subsections', [PermisionRoleController::class, 'assignRoleToSubsections']);


