<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Espacio
 * @package App\Models
 * @version December 6, 2023, 5:53 am UTC
 *
 * @property string $edificioEsp
 * @property string $sectorEsp
 * @property integer $capacidadEsp
 * @property string $salaEsp
 */
class Espacio extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'espacios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'edificioEsp',
        'sectorEsp',
        'capacidadEsp',
        'salaEsp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'edificioEsp' => 'string',
        'sectorEsp' => 'string',
        'capacidadEsp' => 'integer',
        'salaEsp' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'edificioEsp' => 'required',
        'sectorEsp' => 'required',
        'capacidadEsp' => 'required',
        'salaEsp' => 'required'
    ];

    public function espacios()
    {
        return $this->hasMany('App\Models\Escapio');
    }
    
    public function materia_espacios()
    {
        return $this->hasMany('App\Models\Materia_espacio');
    }
    
}
