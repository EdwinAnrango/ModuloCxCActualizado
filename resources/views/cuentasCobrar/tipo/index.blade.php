	@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Tipos de pago<a href="tipo/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('cuentasCobrar.tipo.search')

		</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Opciones</th>
					<th>Id Tipo pago</th>
					<th>Nombre</th>
					<th>Referencia</th>
					<th>Descripción</th>
					
				</thead>
				@foreach($tipos as $ti)
				<tr>
					<td>
						<a href="{{URL::action('TipoController@edit',$ti->idtipopago)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$ti->idtipopago}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					<td>{{$ti->idtipopago}}</td>
					<td>{{$ti->nombretipo}}</td>
					<td>{{$ti->referencia}}</td>
					<td>{{$ti->descripcion}}</td>
					
				</tr>
				@include('cuentasCobrar.tipo.modal')
				@endforeach
			</table>
		</div>
		{{$tipos->render()}}
	</div>	
</div>

@endsection