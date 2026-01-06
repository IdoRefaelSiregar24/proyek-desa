<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {

        if (!session()->get('is_login')) {
            return redirect('/login');
        }

        $userRole = session()->get('role');

        // 2. SUPER ADMIN AKSES SEMUA
        if ($userRole === 'Super Admin') {
            return $next($request);
        }

        // 3. ADMIN AKSES SEMUA
        if ($userRole === 'Admin') {
            return $next($request);
        }

        // 4. ROLE BIASA HARUS SESUAI
        if ($userRole === $role) {
            return $next($request);
        }

        // 5. DITOLAK
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
