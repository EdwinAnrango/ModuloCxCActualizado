<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
	|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('cuentasCobrar/cajero','CajeroController');
Route::resource('cuentasCobrar/usuario','UsuarioController');
Route::resource('cuentasCobrar/rol','RolController');
Route::resource('cuentasCobrar/tipo','TipoController');
Route::resource('cuentasCobrar/detallepago','DetallepagoController');
Route::resource('cuentasCobrar/pago','PagoController');
Route::resource('cuentasCobrar/reportes','ReporteController');

Auth::routes();

 Route::get('/home','AdminCxCController@index');
 Route::get('reportes', 'ReporteController@index');
 Route::get('cuentasCobrar/reportes/crear_reporte_cajero/{tipo}', 'ReporteController@crear_reporte_cajero');
 Route::get('cuentasCobrar/reportes/crear_reporte_saldo/{tipo}', 'ReporteController@crear_reporte_saldo');
 Route::get('cuentasCobrar/reportes/crear_reporte_pagos/{tipo}/{id}', 'ReporteController@crear_reporte_pagos');
