<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bautismo extends Model
{
    protected $table = 'bautismos';

    protected $fillable = [
        'numero_partida',
        'libro',
        'folio',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'fecha_bautismo',
        'lugar_bautismo',
        'nombre_padre',
        'nombre_madre',
        'nombre_padrino',
        'nombre_madrina',
        'ministro_celebrante',
        'observaciones',
        'notas_marginales',
    ];

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'fecha_bautismo' => 'date',
        ];
    }
}
