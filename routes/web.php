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
    return view('welcome');
});

Route::get('listaFactura', 'FacturaController@index')->name('listaFactura');

Route::get('dataFacturas', 'FacturaController@dataFacturas')->name('dataFacturas');

Route::get('showDetalle/{factura_id}', 'FacturaController@showdetalle')->name('showDetalle');




