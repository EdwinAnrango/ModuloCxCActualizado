<?php

namespace cuentasCobrar;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table='tipopago';
    protected $primaryKey='idtipopago';
    public $timestamps=false;
    protected $fillable=[
    'nombretipo',
    'referencia',
    'descripcion',
    'estado'
    ];
    protected $guarded=[];
}
