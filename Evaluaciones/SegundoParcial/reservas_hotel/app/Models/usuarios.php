<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'telefono',
        'direccion',
        'tipo_usuario',
    ];

    // Ocultar password y remember_token al convertir a array o JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Si quieres, puedes agregar un accessor para que Laravel entienda el "nombre" como "name" en la app
    public function getNameAttribute()
    {
        return $this->nombre;
    }
}
