<?php

namespace App\Repositories;

use App\User;
use App\Repositories\BaseRepository;

/**
 * Class RoleUserRepository
 * @package App\Repositories
 * @version July 7, 2020, 4:53 pm UTC
*/

class RoleUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return User::class;
    }
}
