<?php

namespace App\Repositories;

use App\Models\Enlace;
use App\Repositories\BaseRepository;

/**
 * Class EnlaceRepository
 * @package App\Repositories
 * @version September 7, 2020, 6:08 pm UTC
*/

class EnlaceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'referencia',
        'url',
        'metodo',
        'estado'
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
        return Enlace::class;
    }
}
