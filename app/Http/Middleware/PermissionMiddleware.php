<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if (!Auth::user()->can($permission)) {
            Log::warning('Permission check failed for user: ' . Auth::user()->id);
            return response()->json(['message' => 'У вас нет доступа.'], 403);
        }
        
        return $next($request);

    }
}
