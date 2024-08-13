<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Carrera
 * @package App\Models
 * @version December 5, 2023, 3:30 pm UTC
 *
 * @property string $nombreCarr
 */
class Carrera extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'carreras';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'facultades_id',
        'nombreCarr'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombreCarr' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombreCarr' => 'required'
    ];
    public function facultad()
    {
        return $this->belongsTo('App\Models\Facultad','facultades_id');
    }

   

    public function carreras()
    {
        return $this->hasMany('App\Models\Carrera');
    }
    
    public function cursos()
    {
        return $this->hasMany('App\Models\Curso');
    }
    
    public function materias()
    {
        return $this->hasMany('App\Models\Materia');
    }

    public function materia_espacios()
    {
        return $this->hasMany('App\Models\Materia_espacio');
    }
    


}
