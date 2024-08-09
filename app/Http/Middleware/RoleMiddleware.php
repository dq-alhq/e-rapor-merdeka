<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            session(['role' => 'admin']);
        } elseif (auth()->check() && auth()->user()->isTeacher()) {
            session(['role' => 'teacher']);
        } elseif (auth()->check() && auth()->user()->isStudent()) {
            session(['role' => 'student']);
        } else {
            session(['role' => 'guest']);
        }
        return $next($request);
    }
}
