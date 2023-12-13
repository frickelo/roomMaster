<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Curso
 * @package App\Models
 * @version December 6, 2023, 2:28 am UTC
 *
 * @property string $nombreCur
 */
class Curso extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cursos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'carreras_id',
        'nombreCur'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombreCur' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombreCur' => 'required'
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera','carreras_id');
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
