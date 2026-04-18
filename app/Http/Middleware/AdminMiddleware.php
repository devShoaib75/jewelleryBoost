<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated (session or token)
        if (!auth('sanctum')->check() && !auth('web')->check()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }
            return redirect('/login');
        }

        $user = auth('sanctum')->user() ?? auth('web')->user();

        // Check if user is an admin (user_id 1 is considered admin or add is_admin column)
        if ($user->id !== 1) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Forbidden - Admin privileges required'], 403);
            }
            abort(403, 'Unauthorized access. Admin privileges required.');
        }

        return $next($request);
    }
}

