<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'espacio_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'motivo_rechazo',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function espacio()
    {
        return $this->belongsTo(Espacio::class);
    }

    public function penalidad()
    {
        return $this->hasOne(Penalidad::class);
    }
}
