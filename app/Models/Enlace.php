<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Enlace
 * @package App\Models
 * @version September 17, 2020, 2:04 pm -05
 *
 * @property \Illuminate\Database\Eloquent\Collection pwCarousels
 * @property \Illuminate\Database\Eloquent\Collection pwFixedOptions
 * @property \Illuminate\Database\Eloquent\Collection pwFooters
 * @property \Illuminate\Database\Eloquent\Collection pwMenus
 * @property \Illuminate\Database\Eloquent\Collection pwMenu1s
 * @property \Illuminate\Database\Eloquent\Collection pwMenuPnivels
 * @property \Illuminate\Database\Eloquent\Collection pwTarjeta
 * @property string referencia
 * @property string url
 * @property string metodo
 * @property string estado
 * @property string privilegios
 */
/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Enlace extends Model
{

    public $table = 'pw_enlace';
    public $timestamps = false;
    
    /*const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/



    protected $primaryKey = 'id_enlace';

    public $fillable = [
        'referencia',
        'url',
        'metodo',
        'estado',
        'privilegios'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_enlace' => 'integer',
        'referencia' => 'string',
        'url' => 'string',
        'metodo' => 'string',
        'estado' => 'string',
        'privilegios' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'referencia' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Carousel()
    {
        return $this->hasMany(\App\Models\Carousel::class, 'id_enlace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Fija()
    {
        return $this->hasMany(\App\Models\Fija::class, 'id_enlace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function FooterElement()
    {
        return $this->hasMany(\App\Models\FooterElement::class, 'id_enlace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Menu()
    {
        return $this->hasMany(\App\Models\Menu::class, 'id_enlace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function MenuPnivel()
    {
        return $this->hasMany(\App\Models\MenuPnivel::class, 'id_enlace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function MenuSnivel()
    {
        return $this->hasMany(\App\Models\MenuSnivel::class, 'id_enlace');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Tarjeta()
    {
        return $this->hasMany(\App\Models\Tarjeta::class, 'id_enlace');
    }
}
