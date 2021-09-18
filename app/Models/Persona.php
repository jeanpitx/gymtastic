<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Persona
 * @package App\Models
 * @version July 29, 2020, 1:34 pm UTC
 *
 * @property \App\Models\DeCatalogo idNacionalidad
 * @property \Illuminate\Database\Eloquent\Collection prPersonaSolicitantes
 * @property \Illuminate\Database\Eloquent\Collection prPersonaSolicitante1s
 * @property \Illuminate\Database\Eloquent\Collection deCatalogo2s
 * @property string identificacion
 * @property string primer_apellido
 * @property string segundo_apellido
 * @property string nombres
 * @property string fecha_nacimiento
 * @property string sexo
 * @property string estado_civil
 * @property integer id_nacionalidad
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Persona extends Model
{

    public $table = 'pr_persona';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/



    protected $primaryKey = 'id_persona';

    public $fillable = [
        'identificacion',
        'primer_apellido',
        'segundo_apellido',
        'nombres',
        'fecha_nacimiento',
        'sexo',
        'estado_civil',
        'nacionalidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_persona' => 'integer',
        'identificacion' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string',
        'nombres' => 'string',
        'fecha_nacimiento' => 'date',
        'sexo' => 'string',
        'estado_civil' => 'string',
        'nacionalidad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'identificacion' => 'required',
        'primer_apellido' => 'required',
        'segundo_apellido' => 'max:25',
        'nombres' => 'required',
        'fecha_nacimiento' => 'required',
        'sexo' => 'required',
        'estado_civil' => 'required',
        'nacionalidad' => 'required'
    ];
}
