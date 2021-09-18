<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Parametro;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class IpMiddleware
{

    public $restrictIps = [];
    public $whiteIps = ['::1', '192.168.1.132', '127.0.0.1'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $whiteIps=Parametro::where("tipo","whiteIps")->first();
        $whiteIps=explode(",",$whiteIps->parametro);
        $restrictIps=Parametro::where("tipo","restrictIps")->first();
        $restrictIps=explode(",",$restrictIps->parametro);
        $tipo=Parametro::where("tipo","tipoIP")->first();
        //dd($request->getClientIp());
        if($tipo->parametro=="ALL"){
            if (in_array($request->getClientIp(), $restrictIps)) 
                abort(403, 'Equipo no autorizado.');
        }else{
            if (!in_array($request->getClientIp(), $whiteIps)) 
                abort(403, 'Equipo no autorizado.');
        }
    
        return $next($request);
    }
}
