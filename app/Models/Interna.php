<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Interna
 * @package App\Models
 * @version September 9, 2020, 4:14 pm -05
 *
 * @property string titulo
 * @property string url_imagen
 * @property string contenido
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Interna extends Model
{

    public $table = 'pw_interna';
    public $timestamps = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    protected $primaryKey = 'id_interna';

    public $fillable = [
        'titulo',
        'url_imagen',
        'contenido',
        'id_enlace',
        'url_boton'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_interna' => 'integer',
        'titulo' => 'string',
        'url_imagen' => 'string',
        'contenido' => 'string',
        'id_enlace' => 'integer',
        'url_boton' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'contenido' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function Enlace()
    {
        return $this->belongsTo(\App\Models\Enlace::class, 'id_enlace');
    }

    
}
