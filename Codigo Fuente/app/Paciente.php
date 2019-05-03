<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use Notifiable;

    protected $table = 'pacientes';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'apellidos',
        'dni',
        'fecha_de_nacimiento',
        'genero',
        'direccion',
        'celular',
        'telefono',
        'imagen',
        'enfermedades',
        'medicamentos',
        'alergias',
        'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ]; 
}
