<?php

namespace cuentasCobrar;

use Illuminate\Database\Eloquent\Model;

class Detallepago extends Model
{
  protected $table='detallepago';
    protected $primaryKey='iddetalle';
    public $timestamps=false;

    protected $fillable=[
    'idfactura',
    'idtipopago',
    'numerodocumento',
    'fechapago',
    'descripcion',
    'saldoanterior',
    'abono',
    'saldoactual'
    ];

    protected $guarded=[];
}
