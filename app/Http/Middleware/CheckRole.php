<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!Auth::check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        if(!in_array(Auth::user()->role, $roles)) {
            abort(403, 'anda tidak memiliki akses ke halaman ini.  ');
        }

        return $next($request);
    }
}