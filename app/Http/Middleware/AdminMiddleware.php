<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $guard = config('filament.auth.guard', 'web');
        if ($request->routeIs('filament.admin.auth.login')) {
            return $next($request);
        }

        if (!Auth::guard($guard)->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        $user = Auth::guard($guard)->user();

        if (!$user->is_admin) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
