<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Uso: ->middleware('role:admin,dentista')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $rol = $user->rol ?? null;
        if (!$rol || (!empty($roles) && !in_array($rol, $roles, true))) {
            abort(403);
        }

        return $next($request);
    }
}

