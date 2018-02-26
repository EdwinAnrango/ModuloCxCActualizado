<?php

namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\Pago;
use cuentasCobrar\Detallepago;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\PagoFormRequest;
use cuentasCobrar\Http\Requests\DetallepagoFormRequest;
use DB;


class PagoController extends Controller
{
    public function __construct()
    {
$this-> middleware('auth');
    }
    public function index(Request $request)
    {
if($request)
{
	$query=trim($request->get('searchText'));
	$pagos=DB::table('pago')->where('idcliente','LIKE','%'.$query.'%')
	->paginate(15);
	return view('cuentasCobrar.pago.index',["pagos"=>$pagos,"searchText"=>$query]);
}
    }
     public function create()
    {
        $tipos=DB::table('tipo')->where('estado','=','1')->get();
    	return view("cuentasCobrar.tipo.create",["tipos"=>$tipos]);
    }
    public function store(PagoFormRequest $request)
    {
    	$detallepago=new Detallepago;
    	$detallepago->iddetalle='1';
    	$detallepago->idfactura=$request->get('idfactura');
    	$cajero->fechanacimiento=$request->get('fechanacimiento');
    	$cajero->ciudadnacimiento=$request->get('ciudadnacimiento');
    	$cajero->direccion=$request->get('direccion');
    	$cajero->telefono=$request->get('telefono');
    	$cajero->email=$request->get('email');
        $cajero->idusuario=$request->get('idusuario');
    	$cajero->estado='1';
    	$cajero->save();
    	return Redirect::to('cuentasCobrar/cajero');
    }
    public function show($id)
    {
    	return view("cuentasCobrar.pago.show",["pago"=>Pago::findOrFail($id)]);
    }
    public function edit($id)
    {
        $pago=Pago::find($id);
        $tipo=DB::table('tipopago')->get();
        return view ('cuentasCobrar.pago.edit',compact('pago','tipo'));
    }
    public function update(PagoFormRequest $request, $id)
    {
       	$detallepago=new Detallepago;
    	$detallepago->idfactura=$request->get('idfactura');
    	$detallepago->idtipopago=$request->get('idtipopago');
    	$detallepago->numerodocumento=$request->get('numerodocumento');
    	$detallepago->descripcion=$request->get('descripcion');
    	$detallepago->abono=$request->get('abono');
        if((($request->get('deudaactual'))+1)>($request->get('abono')))
        {
        $detallepago->save();    
        return Redirect::to('cuentasCobrar/pago');
        }   
    	else
        {
         return $this->edit($request->get('idfactura'));
        }

    }
   }
