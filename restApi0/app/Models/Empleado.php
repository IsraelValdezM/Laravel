<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'edad',
        'genero',
        'estatus'
    ];

    //protected $primaryKey='expediente';
    //protected $keytype='string';
    //public $incrementig = false;
}
