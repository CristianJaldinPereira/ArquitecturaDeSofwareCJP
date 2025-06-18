<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Espacio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad',
        'ubicacion',
        'horarios_permitidos',
        'encargado_id',
    ];
    public function encargado() {
    return $this->belongsTo(Usuario::class, 'encargado_id');
}

public function reservas() {
    return $this->hasMany(Reserva::class);
}

}
