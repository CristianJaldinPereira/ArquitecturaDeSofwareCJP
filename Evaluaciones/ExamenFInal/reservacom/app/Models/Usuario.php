<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Reserva;
use App\Models\Espacio;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    public function getAuthPassword()
    {
        return $this->password;
    }

    
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    // Relaciones
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }

    public function espaciosAsignados()
    {
        return $this->hasMany(Espacio::class, 'encargado_id');
    }
}
