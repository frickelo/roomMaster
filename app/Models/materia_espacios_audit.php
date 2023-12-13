<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class materia_espacios_audit
 * @package App\Models
 * @version December 13, 2023, 12:47 pm UTC
 *
 * @property string $campo
 * @property string $antiguo_valor
 * @property string $nuevo_valor
 * @property string $fecha
 */
class materia_espacios_audit extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'materia_espacios_audits';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'campo',
        'antiguo_valor',
        'nuevo_valor',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'campo' => 'string',
        'antiguo_valor' => 'string',
        'nuevo_valor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
