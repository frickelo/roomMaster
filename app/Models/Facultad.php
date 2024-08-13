<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Facultad
 * @package App\Models
 * @version December 5, 2023, 3:26 pm UTC
 *
 * @property string $nombreFacu
 */
class Facultad extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'facultads';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombreFacu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombreFacu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombreFacu' => 'required'
    ];

    public function facultades()
    {
        return $this->hasMany('App\Models\Facultad');
    }
    
    public function carreras()
    {
        return $this->hasMany('App\Models\Carrera');
    }

    


}
