<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cajeros</title>
	 <style type="text/css">
            /* estilos para el footer y el numero de pagina */
            @page { margin: 180px 75px; }
            #header {
                position: fixed;
                left: 0px;
                top: -170px;
                right: 0px;
                height: 90px;
                background-color: #FFFFFF;
                color: #2E2E2E;
                text-align: center;
            }
            #footer {
                position: fixed;
                left: 0px;
                bottom: -180px;
                right: 0px;
                height: 50px;
                background-color: #FFFFFF;
                color: #2E2E2E;
            }

            #footer2 {
                position: fixed;
                left: 0px;
                bottom: -130px;
                right: 0px;
                height: 5px;
                background-color: #A9D0F5;
                color: #2E2E2E;
            }
            #footer .page:after {
                content: counter(page, decimal);
                float:right;
                color: #848484;
            }
            .page-break {
                page-break-after: always;
            }
            img.alineadoTextoImagenCentro{
                float:left;
                width: 108px;
                height: 83px;
                /* Ojo vertical-align: text-middle no existe*/
            }
            .texto {
                color: #848484;
            }
            #texto2 {
                color: #848484;
                font-family: "Lucida Sans Unicode";
            }
            body {font-family: Arial, Helvetica, sans-serif;}


            table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                        font-size: 11px;    margin-right:50px;     width: 700px; text-align: center;    border-collapse: collapse; }

            th {     font-size: 12px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
                     border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

            td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
                    color: #669;    border-top: 1px solid transparent; }

            tr:hover td { background: #d0dafd; color: #339; }
        </style>

</head>
<body>
        <div id="header">
            <img class="alineadoTextoImagenCentro" src="https://caiutn.files.wordpress.com/2015/05/logo-utn.png?w=480"/><p><b>		UNIVERSIDAD TÉCNICA DEL NORTE<br>
                    FACULTAD DE INGENIERÍA EN CIENCIAS APLICADAS<br>
                    CARRERA DE INGENIERÍA EN SISTEMAS COMPUTACIONALES
                </b>
            </p>
        </div>

        <div id="texto2">
            <caption>REPORTES DEL SISTEMA</caption> <br><br>
            <p>Consulta realizada  : <?=  $date; ?></p>
    <h4>LISTA DE CAJEROS</h4>
        </div>
	
	<table >
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Fecha de nacimiento</th>
			<th>Ciudad</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Email</th>
			<th>Idusuario</th>
			<th>Estado</th>
		</tr>
		<?php foreach($data as $ca) {?>
		<tr>
			<td>{{$ca->idcajero}}</td>
			<td>{{$ca->nombrecajero}}</td>
			<td>{{$ca->fechanacimiento}}</td>
			<td>{{$ca->ciudadnacimiento}}</td>
			<td>{{$ca->direccion}}</td>
			<td>{{$ca->telefono}}</td>
			<td>{{$ca->email}}</td>
			<td>{{$ca->idusuario}}</td>
			<td>{{$ca->estado}}</td>
		</tr>
		<?php } ?>
	</table>

		<div id="footer">
            <!--aqui se muestra el numero de la pagina en numeros romanos-->
            <p class="page"><small class="texto">MÓDULO DE CUENTAS POR COBRAR </small></p>

        </div>
        <div id="footer2">
            <!--aqui se muestra el numero de la pagina en numeros romanos-->
        </div>



</body>
</html>