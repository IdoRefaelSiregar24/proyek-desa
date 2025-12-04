<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    $userRole = Auth::user()->role;

    // Super Admin boleh akses semua halaman
    if ($userRole === 'Super Admin') {
        return $next($request);
    }

    // Role biasa dicek ketat
    if ($userRole === $role) {
        return $next($request);
    }

    return abort(403);
}

}
