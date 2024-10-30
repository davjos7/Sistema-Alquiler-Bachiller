<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuarto extends Model
{
    use HasFactory;
    protected $table = 'cuartos';
    protected $primaryKey = 'id_cuarto';
    protected $fillable = [
        'nombre_cuarto',
        'descripcion_cuarto',
        'precio_cuarto',
        'disponible_cuarto'
    ];
}
