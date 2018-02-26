@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Tipo de pago</h3>
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
	{!!Form::open(array('url'=>'cuentasCobrar/tipo','method'=>'POST','autocomplete'=>'off' ))!!}
	{{Form::token()}}
		<div class="form-group">
			<label for="idtipopago">ID</label>
			<input type="text" name="idtipopago" required value="{{old('idtipopago')}}" class="form-control" placeholder="ID de 8 caracteres...">	
		</div>
		<div class="form-group">
			<label for="nombretipo">Nombre</label>
			<input type="text" name="nombretipo" required class="form-control" placeholder="Denominación del tipo de pago...">
		</div>
		<div class="form-group">
			<label for="nombretipo">Referencia</label>
			<input type="text" name="referencia" required class="form-control" placeholder="Breve referencia...">
		</div>
		<div class="form-group">
			<label for="descripcion">Descripción</label>
			<input type="text" name="descripcion" required class="form-control" placeholder="Breve descripción del tipo de pago...">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
		</div>
	{!!Form::close()!!}
	<a href="/cuentasCobrar/pago"><button class="btn btn-danger" type="submit">Cancelar</button></a>
@endsection