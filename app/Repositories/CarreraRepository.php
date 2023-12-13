<?php

namespace App\Repositories;

use App\Models\Carrera;
use App\Repositories\BaseRepository;

/**
 * Class CarreraRepository
 * @package App\Repositories
 * @version December 5, 2023, 3:30 pm UTC
*/

class CarreraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombreCarr'
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
        return Carrera::class;
    }
}
