@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar Tipo de pago: {{$tipo->nombretipo}}</h3>
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@<?php foreach ($errors->all() as $error): ?>
				<li>
					{{$error}}
				</li>
			<?php endforeach ?>
				
			</ul>	
		</div>

	@endif
	</div>
</div>	
	{!!Form::model($tipo,['method'=>'PATCH','route'=>['tipo.update',$tipo->idtipopago]])!!}	
	{{Form::token()}}
		<div class="form-group">
			<label for="nombretipo">Nombre Tipo de pago</label>
			<input type="text" name="nombretipo" required value="{{$tipo->nombretipo}}" class="form-control">	
		</div>
		<div class="form-group">
			<label for="nombretipo">Referencia</label>
			<input type="text" name="referencia" required value="{{$tipo->referencia}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="descripcion">Descripción</label>
			<input type="text" name="descripcion" required value="{{$tipo->descripcion}}" class="form-control">
		</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
	
	</div>

	{!!Form::close()!!}
	<a href="/cuentasCobrar/tipo"><button class="btn btn-danger" type="submit">Cancelar</button></a>
@endsection