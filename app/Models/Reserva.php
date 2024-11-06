<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_huesped';
    protected $fillable = [
        'id_cuarto',
        'id_huesped',
        'fecha_inicio',
        'fecha_fin',
        'monto_total',
        'estado'
    ];
}
