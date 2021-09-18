<?php

namespace App\Repositories;

use App\Models\Email;
use App\Repositories\BaseRepository;

/**
 * Class EmailRepository
 * @package App\Repositories
 * @version September 16, 2020, 3:16 pm -05
*/

class EmailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'cedula',
        'tipo_registro'
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
        return Email::class;
    }
}
