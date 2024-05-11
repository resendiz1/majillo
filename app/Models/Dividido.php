<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dividido extends Model
{
    use HasFactory;

    protected $table= 'divididos';
    protected $fillable = ['nombre_completo','fecha', 'hora', 'id_trabajador', 'estado', 'terminal'];
}
