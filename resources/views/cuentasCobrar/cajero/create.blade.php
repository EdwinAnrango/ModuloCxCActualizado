@extends('layouts.admin')
@section('contenido')



<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Cajero</h3>
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
	
	{!!Form::open(array('url'=>'cuentasCobrar/cajero','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="form-group">
			<label for="user">Usuario</label><Span class = "red"> * </ span>
			<select name="idusuario" class="form-control" >
				<?php foreach ($usuarios as $us): ?>
				<option  value="{{$us->id}}">{{$us->name}}</option>
				<?php endforeach ?>
			</select>
	</div>

	<div class="form-group">
		<label>e-mail</label><Span class = "red"> * </ span>
		<select name="email" class="form-control">
				<?php foreach ($usuarios as $us): ?>
					<option  value="{{$us->email}}">{{$us->email}}</option>
				<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label>Identificación</label> <Span class = "red"> * </ span>
		<input type="text" name="idcajero" value="{{old('idcajero')}}" class="form-control" placeholder="Cédula,RUC,pasaporte...">
	</div>
	<div class="form-group">
		<label>Nombre y Apellido</label> <Span class = "red"> * </ span>
		<input type="text" name="nombrecajero" value="{{old('nombrecajero')}}" class="form-control"  placeholder="Nombre y Apellido...">
	</div>
	<div class="form-group">
		<label>Fecha Nac.</label> <Span class = "red"> * </ span>
		<input type="date" name="fechanacimiento" value="{{old('fechanacimiento')}}" class="form-control" placeholder="Fecha Nac.">
	</div>
	<div class="form-group">
		<label>Ciudad Nac.</label> <Span class = "red"> * </ span>
		<input type="text" name="ciudadnacimiento" value="{{old('ciudadnacimiento')}}" class="form-control" placeholder="Ciudad Nacimiento...">
	</div>
	<div class="form-group">
		<label>Dirección</label><Span class = "red"> * </ span>
		<input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
	</div>
	<div class="form-group">
		<label>Teléfono</label><Span class = "red"> * </ span>
		<input type="number" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Telefono...">
	</div>

	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
	</div>

	{!!Form::close()!!}
	<a href="/cuentasCobrar/cajero"><button class="btn btn-danger" type="submit">Cancelar</button></a>
	</div>
</div>
@endsection