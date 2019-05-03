<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TratamientoUsers extends Model
{
    
    protected $table = 'tratamiento_usuario';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_tratamiento',
        'id_usuario',
        'precio',
        'restante',
        'estado',
        'fechaInicio',
        'fechaFin'
    ];
}
