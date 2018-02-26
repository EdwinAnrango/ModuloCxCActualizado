<?php

namespace cuentasCobrar;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table='pago';
    protected $primaryKey='idfactura';
    public $timestamps=false;

    protected $fillable=[
    'idcliente',
    'nombrecliente',
    'idfactura',
    'deudainicial',
    'deudaactual'
    ];

    protected $guarded=[];
}
