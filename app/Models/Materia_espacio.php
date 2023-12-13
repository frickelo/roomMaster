<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Materia_espacio
 * @package App\Models
 * @version December 6, 2023, 6:02 am UTC
 *
 * @property string $dia_semana
 * @property time $hora_entrada
 * @property time $hora_salida
 * @property string $periodo
 */
class Materia_espacio extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'materia_espacios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'materias_id',
        'espacios_id',
        'dia_semana',
        'hora_entrada',
        'hora_salida',
        'periodo',
        'carreras_id', 
        'cursos_id'    
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dia_semana' => 'date',
        'periodo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dia_semana' => 'required',
        'hora_entrada' => 'required',
        'hora_salida' => 'required',
        'periodo' => 'required'
    ];
    public function materia()
    {
        return $this->belongsTo('App\Models\Materia','materias_id');
    }

    public function espacio()
    {
        return $this->belongsTo('App\Models\Espacio','espacios_id');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera','carreras_id');
    }

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso','cursos_id');
    }
    
}
