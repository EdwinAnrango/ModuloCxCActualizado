<?php

namespace cuentasCobrar\Http\Controllers;
use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\Tipo;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\TipoFormRequest;
use DB;

class TipoController extends Controller
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
	$tipos=DB::table('tipopago')->where('nombretipo','LIKE','%'.$query.'%')
	->where('estado','=','1')
	->paginate(7);
	return view('cuentasCobrar.tipo.index',["tipos"=>$tipos,"searchText"=>$query]);
}
    }
    public function create()
    {
    	return view("cuentasCobrar.tipo.create");
    }
    public function store(TipoFormRequest $request)
    {
    	$tipo=new Tipo;
    	$tipo->nombretipo=$request->get('nombretipo');
    	$tipo->referencia=$request->get('referencia');
    	$tipo->descripcion=$request->get('descripcion');
    	$tipo->estado='1';
    	$tipo->save();
    	return Redirect::to('cuentasCobrar/tipo');
    }
    public function show($id)
    {
    	return view("cuentasCobrar.tipo.show",["tipo"=>Tipo::findOrFail($id)]);
    }
    public function edit($id)
    {

        $tipo=Tipo::find($id);
        return view ('cuentasCobrar.tipo.edit',compact('tipo'));   
//    return view("cuentasCobrar.tipo.edit",["tipo"=>Tipo::findOrFail($id)]);	
    }
    public function update(TipoFormRequest $request, $id)
    {
    	$tipo=Tipo::findOrFail($id);
    	$tipo->nombretipo=$request->get('nombretipo');
    	$tipo->referencia=$request->get('referencia');
    	$tipo->descripcion=$request->get('descripcion');
    	$tipo->update();
    	return Redirect::to('cuentasCobrar/tipo');
    }
    public function destroy($id)
    {
    	$tipo=Tipo::findOrFail($id);
    	$tipo->estado='0';
    	$tipo->update();
    	return Redirect::to('cuentasCobrar/tipo');
    }
}
