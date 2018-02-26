<?php

namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\Detallepago;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\DetallepagoFormRequest;
use DB;

class DetallepagoController extends Controller
{
         public function __construct()
    {
$this-> middleware('auth');
    }
    public function index(Request $request)
    {
		if($request)
		{
			$query=trim($request->get('idfactura'));
			$detallepagos=DB::table('detallepago as de')
            ->join('tipopago as ti','de.idtipopago','=','ti.idtipopago')
            ->select('de.iddetalle','de.numeropago','de.idfactura','ti.nombretipo','de.numerodocumento','de.fechapago','de.descripcion','de.saldoanterior','de.abono','de.saldoactual')
            ->where('idfactura','LIKE','%'.$query.'%')
			->paginate(15);
			return view('cuentasCobrar.detallepago.index',["detallepagos"=>$detallepagos,"idfactura"=>$query]);
		}

    }

    public function create()
    {
        $pagos=DB::table('pago')->get();
        $tipopagos=DB::table('tipopago')->get();
    	return view("cuentasCobrar.detallepago.create",["pagos"=>$pagos,"tipopagos"=>$tipopagos]);
    }
    public function store(DetallepagoFormRequest $request)
    {
    	$now = new \DateTime();
		echo $now->format('d-m-Y H:i:s');
    	$detallepago=new Detallepago;
    	$detallepago->idfactura=$request->get('idfactura');
    	$detallepago->idtipopago=$request->get('idtipopago');
    	$detallepago->numerodocumento=$request->get('numerodocumento');
    	$detallepago->fechapago=$now;
    	$detallepago->abono=$request->get('abono');
    	$detallepago->save();
    	return Redirect::to('cuentasCobrar/detallepago');
    }
     public function show($id)
    {
    	return view("cuentasCobrar.detallepago.show",["detallepago"=>Detallepago::findOrFail($id)]);
    }
    public function edit($id)
    {
    $detallepago=Detallepago::find($id);
    $pagos=DB::table('pago')->get();
    $tipopagos=DB::table('tipopago')->get();
    return view("cuentasCobrar.cajero.edit",compact('detallepago','pagos','tipopagos'));
    }
     public function update(CajeroFormRequest $request, $id)
    {
    	$cajero=Cajero::findOrFail($id);
    	$cajero->nombrecajero=$request->get('nombrecajero');
    	$cajero->fechanacimiento=$request->get('fechanacimiento');
    	$cajero->ciudadnacimiento=$request->get('ciudadnacimiento');
    	$cajero->direccion=$request->get('direccion');
    	$cajero->telefono=$request->get('telefono');
    	$cajero->email=$request->get('email');
    	$cajero->update();
    	return Redirect::to('cuentasCobrar/cajero');
    }
    public function destroy($id)
    {
    	$cajero=Cajero::findOrFail($id);
    	$cajero->estado='0';
    	$cajero->update();
    	return Redirect::to('cuentasCobrar/cajero');
    }

}
