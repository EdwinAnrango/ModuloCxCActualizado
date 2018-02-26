@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('cuentasCobrar.pago.search')

		</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id Cliente</th>
					<th>Nombre Cliente</th>
					<th>Id Factura</th>
					<th>Deuda inicial</th>
					<th>Deuda actual</th>
					<th>Transacciones</th>
					<th>Abonos</th>
				</thead>
				@foreach($pagos as $pa)
				<tr>
					<td>{{$pa->idcliente}}</td>
					<td>{{$pa->nombrecliente}}</td>
					<td>{{$pa->idfactura}}</td>
					<td>{{$pa->deudainicial}}</td>
					<td>{{$pa->deudaactual}}</td>
					<td>
			{!! Form::open(array('url'=>'cuentasCobrar/detallepago','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
						<a><input type="hidden" name="idfactura" value="{{$pa->idfactura}}">
								<button type="submit" class="btn btn-primary">Historial de pagos</button></a>
			{{Form::close()}}
					</td>
					<td>
						<a href="{{URL::action('PagoController@edit',$pa->idfactura)}}"><button class="btn btn-success">Abonar</button></a>
					</td>
					</tr>
				@include('cuentasCobrar.pago.modal')
				@endforeach
			</table>
		</div>
		{{$pagos->render()}}
	</div>	
</div>

@endsection