<?php

namespace App\Repositories;

use App\Models\materia_espacios_audit;
use App\Repositories\BaseRepository;

/**
 * Class materia_espacios_auditRepository
 * @package App\Repositories
 * @version December 13, 2023, 12:47 pm UTC
*/

class materia_espacios_auditRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'campo',
        'antiguo_valor',
        'nuevo_valor',
        'fecha'
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
        return materia_espacios_audit::class;
    }
}
