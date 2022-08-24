<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'alumnos';
    protected $fillable=[
        'nombre',
        'edad',
        'genero',
        'carrera',
        'ednia_indigena',
        'horario',
        'calificacion_prepa',
        'becado',
        'problemas_de_salud'
    ];
    use HasFactory;
}
