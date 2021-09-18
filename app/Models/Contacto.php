<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Contacto
 * @package App\Models
 * @version July 29, 2020, 1:01 pm UTC
 *
 * @property \App\Models\PrPersonaSolicitante idPersonaSolicitante
 * @property string tipo_contacto
 * @property string tipo_fin
 * @property string contacto
 * @property string extension
 * @property integer id_persona_solicitante
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Contacto extends Model
{

    public $table = 'pr_contacto';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/


    protected $primaryKey = 'id_contacto';

    public $fillable = [
        'tipo_contacto',
        'tipo_fin',
        'contacto',
        'extension',
        'id_persona_solicitante'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_contacto' => 'integer',
        'tipo_contacto' => 'string',
        'tipo_fin' => 'string',
        'contacto' => 'string',
        'extension' => 'string',
        'id_persona_solicitante' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_contacto' => 'required',
        'tipo_fin' => 'required',
        'contacto' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function PersonaSolicitante()
    {
        return $this->belongsTo(\App\Models\PersonaSolicitante::class, 'id_persona_solicitante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function Actividad()
    {
        return $this->belongsTo(\App\Models\Actividad::class, 'id_actividad');
    }
}
