<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idEspecialidad',
        'idPaciente',
        'idEspecialista',
        'fechaInicio',
        'fechaFin',
        'color',
        'titulo',
        'tipo_consulta',
        'estado',
        'created_at', 
        'updated_at',
        'payment_time',
    ];
    public $timestamps = true;
}
