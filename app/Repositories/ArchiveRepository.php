<?php

namespace App\Repositories;

use App\Models\Archive;
use App\Repositories\BaseRepository;

/**
 * Class ArchiveRepository
 * @package App\Repositories
 * @version September 16, 2020, 4:25 pm -05
*/

class ArchiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'url_archivo',
        'tipo_archivo'
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
        return Archive::class;
    }
}
