@extends('layouts.admin')
@section('contenido')
<div class="row">
	
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID Pago</th>
					<th>Id Factura</th>
					<th>Número de Pago</th>
					<th># Documento</th>
					<th>Fecha Pago</th>
					<th>Descripción</th>
					<th>Saldo anterior</th>
					<th>Abono</th>
					<th>Saldo Actual</th>
				</thead>
				@foreach($detallepagos as $de)
				<tr>
					<td>PAGO-00{{$de->iddetalle}}</td>
					<td>{{$de->idfactura}}</td>
					<td>{{$de->nombretipo}}</td>
					<td>{{$de->numerodocumento}}</td>
					<td>{{$de->fechapago}}</td>
					<td>{{$de->descripcion}}</td>
					<td>{{$de->saldoanterior}}</td>
					<td>{{$de->abono}}</td>
					<td>{{$de->saldoactual}}</td>
				</tr>
				@include('cuentasCobrar.detallepago.modal')
				@endforeach
			</table>
		</div>
	
		
	</div>	
	{{$detallepagos->render()}}
			@foreach($detallepagos as $de)
			@if ($loop->first)
			<tr>
			<td><a href="/cuentasCobrar/pago"><button class="btn btn-warning" type="submit">Regresar</button></a></td>
			<td><a href="/cuentasCobrar/reportes/crear_reporte_pagos/2/{{$de->idfactura}}"><button type="submit" class="btn btn-primary">Imprimir reporte</button></a></td>
			</tr>
			@endif
		@include('cuentasCobrar.detallepago.modal')
		@endforeach
</div>

@endsection