<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Archive
 * @package App\Models
 * @version September 16, 2020, 4:25 pm -05
 *
 * @property string nombre
 * @property string url_archivo
 * @property string tipo_archivo
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Archive extends Model
{

    public $table = 'pw_archivo';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/



    protected $primaryKey = 'id_archivo';

    public $fillable = [
        'nombre',
        'url_archivo',
        'tipo_archivo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_archivo' => 'integer',
        'nombre' => 'string',
        'url_archivo' => 'string',
        'tipo_archivo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
    ];

    
}
