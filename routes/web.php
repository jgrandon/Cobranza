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
//
// Route::get('/', function () {
//     return redirect(route('web'));
// });
//


Route::get('/web', function(){
  return view('web.main2');
});


Route::get('/deudores', 'CobranzaController@verDeudores')->name('deudores');
Route::post('/cobranza', 'CobranzaController@verCobranza')->name('verCobranza');
Route::post('/cobranza/finalizar', 'CobranzaController@finalizarCobranza')->name('finalizarCobranza');


Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/documentos', 'DocumentoController@verDocumentos')->name('documentos');
Route::get('/documentos:agregar','DocumentoController@verAgregarDocumento')->name('agregarDocumento');
Route::post('/documento:detalle:{id}','DocumentoController@verDetalleDocumento')->name('verDetalleDocumento');

//acciones Cobrador
Route::get('/cobrar', 'CobranzaController@verCobrar')->name('verCobrar');

Route::get('/empresas', 'EmpresasController@listarEmpresas')->name('empresas');
Route::get('/empresas/agregar', 'EmpresasController@agregarEmpresa')->name('agregarEmpresa');
Route::post('/empresas/agregar', 'EmpresasController@agregarEmpresa')->name('agregarEmpresa');

Route::get('/empresas/agregar', 'EmpresasController@agregarEmpresa')->name('agregarEmpresa');
