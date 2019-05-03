<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'horariosnodisponibles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fechaInicio',
        'fechaFin',
        'color',
        'titulo',
        'created_at', 
        'updated_at',
    ];
    public $timestamps = true;
}
