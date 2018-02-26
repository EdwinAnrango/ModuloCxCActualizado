<?php
 
namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\User;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
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
			$usuarios=DB::table('users as u')
			->join ('rol as r','u.idrol','=','r.idrol')
			->select('u.id','r.nombrerol as nombrerol','u.name','u.password','u.estado','r.idrol')
			->where('u.name','LIKE','%'.$query.'%')
            ->where('u.estado','=','1')
			->orderBy('u.id','desc')
			->paginate(7);
			return view('cuentasCobrar.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
		}

    }

    public function create()
    {
    	$roles=DB::table('rol')->where('estado','=','1')->get();
    	return view("cuentasCobrar.usuario.create",["roles"=>$roles]);
    }
    public function store(UsuarioFormRequest $request)
    {
    	$usuario=new User;
    	$usuario->idrol=$request->get('idrol');
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=password_hash($request->get('password'),PASSWORD_DEFAULT);
        $usuario->estado='1';
    	$usuario->save();
    	return Redirect::to('cuentasCobrar/usuario');
    }
     public function show($id)
    {
    	return view("cuentasCobrar.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
    }
    public function edit($id)
    {

     $usuario=User::find($id);
      $roles=DB::table('rol')->orderBy('idrol')->get();
       return view ('cuentasCobrar.usuario.edit',compact('usuario','roles'));	
    }
     public function update(UsuarioFormRequest $request, $id)
    {
    	$usuario=User::findOrFail($id);
        $usuario->idrol=$request->get('idrol');
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=password_hash($request->get('password'),PASSWORD_DEFAULT);
    	$usuario->update();
    	return Redirect::to('cuentasCobrar/usuario');
    }
    public function destroy($id)
    {
    	$usuario=User::findOrFail($id);
    	$usuario->estado='0';
    	$usuario->update();
    	return Redirect::to('cuentasCobrar/usuario');
    }
}
