<?php

namespace App\Repositories;

use App\Models\Facultad;
use App\Repositories\BaseRepository;

/**
 * Class FacultadRepository
 * @package App\Repositories
 * @version December 5, 2023, 3:26 pm UTC
*/

class FacultadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombreFacu'
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
        return Facultad::class;
    }
}
