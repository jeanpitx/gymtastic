<?php

namespace App\Repositories;

use App\Models\Interna;
use App\Repositories\BaseRepository;

/**
 * Class InternaRepository
 * @package App\Repositories
 * @version September 9, 2020, 4:14 pm -05
*/

class InternaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'url_imagen',
        'contenido'
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
        return Interna::class;
    }
}
