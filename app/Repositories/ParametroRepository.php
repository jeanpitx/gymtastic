<?php

namespace App\Repositories;

use App\Models\Parametro;
use App\Repositories\BaseRepository;

/**
 * Class ParametroRepository
 * @package App\Repositories
 * @version August 5, 2020, 4:19 pm UTC
*/

class ParametroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'descripcion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Parametro::class;
    }
}
