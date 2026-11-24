<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuraciones';

    protected $fillable = [
        'nombre_parroquia',
        'nombre_diocesis',
        'direccion',
        'municipio',
        'departamento',
        'telefono',
        'correo',
        'nombre_parroco',
        'logo',
        'sello',
    ];
}
