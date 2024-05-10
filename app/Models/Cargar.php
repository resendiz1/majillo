<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargar extends Model
{
    use HasFactory;
    protected $table = 'excel';
    protected $fillable = ['tiempo', 'nombre', 'id_trabajador', 'codigo_pago', 'estado_trabajo', 'nombre_terminal'];
}
