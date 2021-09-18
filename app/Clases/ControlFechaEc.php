<?php

namespace App\Clases;
use DateTime;
use Lang;
use App;


/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
*/
class ControlFechaEc
{
	public static function obtFecha()
    {
    	$locale = App::getLocale();
		if (App::isLocale('es')) {
	       //enviamos fecha actual
	        $dias = array("","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
	        $mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	        $var = new DateTime();
	        $hoy= $dias[$var->format('w').""].", ".$var->format('d')." de ".$mes[$var->format('n').""]." del ".$var->format('Y');
	        return $hoy;
    	}else{
    		$hoy = new DateTime();
    		$hoy=$hoy->format('l, d \d\e F \d\e\l Y');
    		return $hoy;
    	}
    }

    public static function obtFechayHora()
    {
    	$locale = App::getLocale();
		if (App::isLocale('es')) {
	       //enviamos fecha actual
	        $dias = array("","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
	        $mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	        $var = new DateTime();
	        $hoy= $dias[$var->format('w').""].", ".$var->format('d')." de ".$mes[$var->format('n').""]." del ".$var->format('Y')." a las ".$var->format('H:i:s');
	        return $hoy;
    	}else{
    		$hoy = new DateTime();
    		$hoy=$hoy->format('l, d \d\e F \d\e\l Y \a \l\a\s H:i:s');
    		return $hoy;
    	}
    }
    

}