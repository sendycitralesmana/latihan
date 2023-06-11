<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOrTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // bisa melewati middleware jika role = admin atau teacher
        // daftarkan middleware ini ke ctrl p Kernel.php

        if(Auth::user()->id_role != 1 && Auth::user()->id_role != 2) {
            abort(404);
        }

        return $next($request);
    }
}
