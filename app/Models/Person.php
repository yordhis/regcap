<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name', // Apellido
        'email',
        'dni',  // Documento Nacional de Identidad
        'state', // Estado
        'city', // Ciudad
        'parish', // Parroquia
        'phone', // Teléfono
        'voting_center', // Centro de votaciones
        'address', // Dirección
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
