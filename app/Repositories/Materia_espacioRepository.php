<?php

namespace App\Repositories;

use App\Models\Materia_espacio;
use App\Repositories\BaseRepository;

/**
 * Class Materia_espacioRepository
 * @package App\Repositories
 * @version December 6, 2023, 6:02 am UTC
*/

class Materia_espacioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dia_semana',
        'hora_entrada',
        'hora_salida',
        'periodo'
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
        return Materia_espacio::class;
    }
}
