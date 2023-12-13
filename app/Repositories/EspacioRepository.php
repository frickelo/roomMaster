<?php

namespace App\Repositories;

use App\Models\Espacio;
use App\Repositories\BaseRepository;

/**
 * Class EspacioRepository
 * @package App\Repositories
 * @version December 6, 2023, 5:53 am UTC
*/

class EspacioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'edificioEsp',
        'sectorEsp',
        'capacidadEsp',
        'salaEsp'
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
        return Espacio::class;
    }
}
