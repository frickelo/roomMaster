<?php

namespace App\Repositories;

use App\Models\Materia;
use App\Repositories\BaseRepository;

/**
 * Class MateriaRepository
 * @package App\Repositories
 * @version December 6, 2023, 5:03 am UTC
*/

class MateriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombreMat'
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
        return Materia::class;
    }
}
