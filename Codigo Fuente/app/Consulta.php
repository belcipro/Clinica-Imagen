<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'tipo_consulta';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'descripcion',
        'precio'
    ];

}
