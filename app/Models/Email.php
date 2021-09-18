<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Email
 * @package App\Models
 * @version September 16, 2020, 3:16 pm -05
 *
 * @property string email
 * @property string cedula
 * @property string tipo_registro
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Email extends Model
{

    public $table = 'pw_email_cliente';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/



    protected $primaryKey = 'id_email_cliente';

    public $fillable = [
        'email',
        'identificacion',
        'tipo_registro'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_email_cliente' => 'integer',
        'email' => 'string',
        'identificacion' => 'string',
        'tipo_registro' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required',
        'identificacion' => 'required',
        'tipo_registro' => 'required'
    ];

    
}
