<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPayment extends Model
{
    protected $table = 'detalle_pago';
    protected $primaryKey = 'id';
    public $timestamps = true; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idcita', 
        'tipo_pago',
        'total',
        'abono',
        'card_number',
        'email',
        'client_ip',
        'card_brand',
        'card_type',
        'card_category',
        'estado',
        'created_at',
        'updated_at'
    ];
}
