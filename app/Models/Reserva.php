<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    protected $fillable = [
        'id_cuarto',
        'id_huesped',
        'fecha_inicio',
        'fecha_fin',
        'monto_total',
        'estado'
    ];
}
