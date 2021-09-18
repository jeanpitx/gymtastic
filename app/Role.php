<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
class Role extends Model
{
    //si no se especifica toma el nombre como roles
    protected $table = 'role';
    protected $primaryKey = 'id_role';

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
