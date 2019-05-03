<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTratamiento extends Model
{
    protected $table = 'detalle_tratamiento';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id',
       'id_tratamiento_usuario',
       'id_cita',
       'pago',
    ];

}
