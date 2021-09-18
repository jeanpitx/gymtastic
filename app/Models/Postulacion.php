<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Postulacion
 * @package App\Models
 * @version December 18, 2020, 2:33 pm -05
 *
 * @property \App\Models\PrPersona $idPersona
 * @property integer $id_persona
 * @property string $correo_electronico
 * @property string $telefono
 * @property string $direccion
 * @property string $expectativas
 * @property string $f_curriculum
 * @property integer $id_ciudad
 */
class Postulacion extends Model
{

    public $table = 'pr_postulacion';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/



    protected $primaryKey = 'id_postulacion';

    public $fillable = [
        'id_persona',
        'correo_electronico',
        'telefono',
        'direccion',
        'expectativas',
        'f_curriculum',
        'id_ciudad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_postulacion' => 'integer',
        'id_persona' => 'integer',
        'correo_electronico' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'expectativas' => 'string',
        'f_curriculum' => 'string',
        'id_ciudad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'correo_electronico' => 'required|string|max:80',
        'telefono' => 'required|string|max:12',
        'direccion' => 'required|string|max:100',
        'expectativas' => 'required|string|max:100',
        'id_ciudad' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function Persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'id_persona', 'id_persona');
    }
}
