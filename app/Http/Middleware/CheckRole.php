<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        $user = auth()->guard('admin')->user();

        if (!$user) {
            abort(403, 'Kamu belom login sebagai admin');
        }

        $user->refresh();

        if (! in_array($user->role, $roles)) {
            abort(403, 'Kamu tidak memiliki akses ke halaman ini');
        }
        return $next($request);
    }
}
