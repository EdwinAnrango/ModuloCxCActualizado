@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Usuarios</h3>
				<a href="usuario/create"><button class="btn btn-success">Nuevo</button></a>
				<a href="reportes/"><button class="btn btn-info">Imprimir reportes</button></a>
			@include('cuentasCobrar.usuario.search')

		</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Usuario</th>
					<th>Rol</th>
					<th>User</th>
					<th>password</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach($usuarios as $us)
				<tr>
					<td>{{$us->id}}</td>
					<td>{{$us->nombrerol}}</td>
					<td>{{$us->name}}</td>
					<td>{{$us->password}}</td>
					<td>{{$us->estado}}</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$us->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('cuentasCobrar.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>	
</div>

@endsection