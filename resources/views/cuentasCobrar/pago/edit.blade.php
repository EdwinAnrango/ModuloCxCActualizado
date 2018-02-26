@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" align="center">
	<h3 >NUEVO ABONO</h3>
	</div>
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<tr>
	<td><h3>FACTURA #: {{$pago->idfactura}}</h3></td>
	<td><h3>CLIENTE: {{$pago->nombrecliente}}</h3></td>
	<td><h3>DEUDA ACTUAL: {{$pago->deudaactual}}</h3></td>
	</tr>
	</div>
</div>
	<div>
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
	{!!Form::model($pago,['method'=>'PATCH','route'=>['pago.update',$pago->idfactura]])!!}	
	{{Form::token()}}
	<input type="hidden" name="idfactura" value="{{$pago->idfactura}}">
	<input type="hidden" name="idcliente" value="{{$pago->idcliente}}">
	<input type="hidden" name="deudaactual" id="deudaactual" value="{{$pago->deudaactual}}">
	<div class="form-group">
			<label for="idtipopago">Tipo de pago</label>
			<select name="idtipopago" class="form-control">
				<?php foreach ($tipo as $ti): ?>
					><option  value="{{$ti->idtipopago}}">{{$ti->nombretipo}}</option>
				<?php endforeach ?>
			</select>
	</div>
	<div class="form-group">
		<label>Número de documento</label>
		<input type="number" name="numerodocumento" class="form-control" placeholder="En caso de depósito o transferencia...">
	</div>
	<div class="form-group">
		<label>Descripción</label>
		<input type="text" name="descripcion" class="form-control" placeholder="Descripción del pago...">
	</div>

		<div class="form-group">
		<label>Abono</label>
		<input type="number" name="abono" id="abono" required value="" step="any" class="form-control" placeholder="Abono en dólares $..."
		>
	</div>
	
	<div class="form-group">
		<button class="btn btn-primary" type="submit" >Finalizar cobro</button>
	</div>	
	{!!Form::close()!!}
	<a href="/cuentasCobrar/pago"><button class="btn btn-danger" type="submit">Cancelar</button></a>
@endsection