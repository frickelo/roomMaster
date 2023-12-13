<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Materia
 * @package App\Models
 * @version December 6, 2023, 5:03 am UTC
 *
 * @property string $nombreMat
 */
class Materia extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'materias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cursos_id',
        'nombreMat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombreMat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombreMat' => 'required'
    ];

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso','cursos_id');
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
