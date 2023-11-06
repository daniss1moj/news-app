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
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        if ($request->user()) {
            if (!$request->user()->isAdmin() && $role === 'admin') {
                return redirect()->route('profile.show');
            }
            if ($request->user()->isAdmin() && $role === 'user') {
                return redirect()->route('admin.main');
            }
        }


        return $next($request);
    }
}
