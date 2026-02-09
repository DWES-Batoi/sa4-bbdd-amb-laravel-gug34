<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureNotConvidat
{
    public function handle($request, Closure $next)
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        if ($user && $user->role === \App\Models\User::ROLE_CONVIDAT) {
            abort(403, 'El invitado no tiene permisos para modificar datos.');
        }

        return $next($request);
    }
}
