<?php

namespace App\Http\Middleware;

use Closure;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class CheckLocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $user = $request->user();
        if ($user->estado=="locked" && $type=="next")
            return  redirect()->route('locked');

            
        if ($user->estado!="locked" && $type=="home")
            return  redirect()->route('home');

        return $next($request);
    }
}
