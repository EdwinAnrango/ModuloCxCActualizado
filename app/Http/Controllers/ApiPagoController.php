<?php

namespace cuentasCobrar\Http\Controllers;
use cuentasCobrar\Pago;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiPagoController extends Controller
{
    public function index(){
$pago=Pago::all()->toArray();
return response()->json($pago);

    }
}
