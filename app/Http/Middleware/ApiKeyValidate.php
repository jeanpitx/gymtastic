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
class ApiKeyValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->header("apikey")) { //$request->headers->all()
            return response()->json([
              'status' => 401,
              'message' => 'Acceso no autorizado',
            ], 401);
        }
      
        if ($request->headers->has("apikey")) {
            $api_key = "key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBBBCM";
            if ($request->header("apikey") != $api_key) {
              return response()->json([
                'status' => 401,
                'message' => 'Acceso no autorizado',
              ], 401);
            }
        }

        return $next($request);
    }
}
