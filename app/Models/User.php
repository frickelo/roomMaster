<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'carrera',
        'curso',
        'facultades_id', // Cambiado de 'facultad' a 'facultades_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'carrera' => 'required',
        'curso' => 'required',
        'facultades_id' => 'required', // Regla para el nuevo atributo facultades_id
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultades_id');
    }
}