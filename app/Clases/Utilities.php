<?php
namespace App\Clases;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
*/
class Utilities{
    /**
     * Esta funcion se inyecta directamente en el codigo dentro de frontend->layouts->app con @inject
     */
    public function filterFixed($array,$value){
        return (Object) array_values(array_filter($array,function($k) use($array,$value){
            return $k["tipo_parametro"]==$value; //dump($k);
        }))[0];
    }

    /**
     * Esta funcion se inyecta directamente en el codigo dentro de frontend->layouts->app con @inject
     */
    public function filterUrlPopup($array){
        return array_values(array_filter($array,function($k) use($array){
            return str_contains($k->url, 'Popup');
        }))[0]->url;
    }

    /**
     * Esta funcion valida la url y devuelve el valor, hay que pasarle el enlace
     */
    public function filterUrlArray($enlace){
        return ($enlace?url($enlace["estado"]=="A"?$enlace["url"]:"/mantenimiento"):"#");
    }

    /**
     * Esta funcion valida la url y devuelve el valor, hay que pasarle el enlace
     */
    public function filterUrlEnloquent($object){
        return ($object->id_enlace?url($object->Enlace()->first()->estado=="A"?$object->Enlace()->first()->url:"/mantenimiento"):"#");
    }
}