<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    public $table = "animales";

    protected $fillable = [
        'nombre',
        'especie',
        'urgente',
        'sexo',
        'fecha_nacimiento',
        'edad',
        'tamano',
        'peso',
        'nivel_actividad',
        'imagen_perfil',
        'descripcion',
        'pais',
        'provincia',
        'estado_general',
        'vacunado',
        'enfermo',
        'alergico',
        'tratado',
        'desparasitado',
        'microchip',
        'condiciones_entrega'
    ];

}
