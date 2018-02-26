<?php

namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Cajero;
use cuentasCobrar\Pago;
use cuentasCobrar\Detallepago;
use PDF;
use DB;


class ReporteController extends Controller
{
	public function __construct()
    {
		$this-> middleware('auth');
    }
    
    public function index()
    {
        return view("cuentasCobrar.reportes.index");
    }
    

	public function pdfcajero($datos,$vistaurl,$tipo)
	{
		$data = $datos;
        $date = date('Y-m-d');
		$view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('cajeros');}
        if($tipo==2){return $pdf->download('cajeros.pdf'); }
	}


  	public function crear_reporte_cajero($tipo)
  	{

     $vistaurl="cuentasCobrar.reportes.reporte_cajero";
     $cajeros=Cajero::all();
     
     return $this->pdfcajero($cajeros, $vistaurl,$tipo);

}




	public function pdfsaldo($datos,$vistaurl,$tipo)
	{
		$data = $datos;
        $date = date('Y-m-d');
		$view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('saldos');}
        if($tipo==2){return $pdf->download('saldos.pdf'); }
	}


  	public function crear_reporte_saldo($tipo)
  	{

     $vistaurl="cuentasCobrar.reportes.reporte_saldo";
     $pagos=Pago::all();
     
     return $this->pdfsaldo($pagos, $vistaurl,$tipo);

	}




public function pdfpagos($datos,$vistaurl,$tipo)
    {
        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        if($tipo==1){return $pdf->stream('Detallepagos');}
        if($tipo==2){return $pdf->download('Detallepagos.pdf'); }
        
    }


    public function crear_reporte_pagos($tipo,$id)
    {
        $vistaurl="cuentasCobrar.reportes.reporte_pagos";
        $detallepagos=DB::table('detallepago')->select('*')->where('idfactura','=',$id)->take(10)->get();
        return $this->pdfpagos($detallepagos,$vistaurl,$tipo);

    }

 
}
