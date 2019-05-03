<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use Notifiable;

    protected $table = 'medicos';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'apellido_paterno',
        'apellido_materno',
        'dni',
        'cmp',
        'direccion',
        'celular',
        'telefono',
        'imagen',
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
