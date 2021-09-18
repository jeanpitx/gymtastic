<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Parametro
 * @package App\Models
 * @version August 5, 2020, 4:19 pm UTC
 *
 * @property string tipo
 * @property string descripcion
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Parametro extends Model
{

    public $table = 'de_parametro';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/



    protected $primaryKey = 'id_parametro';

    public $fillable = [
        'tipo',
        'parametro',
        'detalle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_parametro' => 'integer',
        'tipo' => 'string',
        'parametro' => 'string',
        'detalle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required',
        'parametro' => 'required',
        'detalle' => 'required'
    ];

    
}
