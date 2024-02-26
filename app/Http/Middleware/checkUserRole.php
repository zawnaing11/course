<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        if (Auth::check()) {
            $slug = auth()->user()->roles->first()->slug;
            if ($slug == $role) {
                return $next($request);
            }
            if ($role == 'admin_staff' && ($slug == 'admin' || $slug == 'staff')) {
                return $next($request);
            }
        }

        return redirect()->route('dashboard');
    }
}
