<?php

namespace App\Http\Middleware;

use Closure;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        $roles = strpos($rol, '|') !== false?explode('|', $rol):$rol;
        $request->user()->authorizeRoles($roles);
        return $next($request);
    }
}
