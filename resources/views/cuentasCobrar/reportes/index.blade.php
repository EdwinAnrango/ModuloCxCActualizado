 @extends('layouts.admin')
@section('contenido')

<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="box-title">Reportes del sistema</h3>
		</div>
</div>
<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead><tr>
                      <th>ID</th>
                      <th>reporte</th>
                      <th>ver</th>
                      <th>descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reporte de listados de cajeros</td>
                      <td><a href="reportes/crear_reporte_cajero/1" target="_blank" ><button class="btn btn-block btn-primary">Ver</button></a></td>
                      <td><a href="reportes/crear_reporte_cajero/2" target="_blank" ><button class="btn btn-block btn-success">Descargar</button></a></td>
                    
                    </tr>
                   <tr>
                      <td>2</td>
                      <td>Reporte de saldos de clientes</td>
                      <td><a href="reportes/crear_reporte_saldo/1" target="_blank" ><button class="btn btn-block btn-primary">Ver</button></a></td>
                      <td><a href="reportes/crear_reporte_saldo/1" target="_blank" ><button class="btn btn-block btn-success">Descargar</button></a></td>
                    
                    </tr>
                  </tbody>
              </table>
                </div><!-- /.box-body -->
            </div>
 </div>
@endsection