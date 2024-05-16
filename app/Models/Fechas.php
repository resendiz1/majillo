<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fechas extends Model
{
    use HasFactory;
    protected $table = 'fechas';
    protected $fillable = ['fecha', 'id_trabajador'];
}
