<?php

use App\OrdenCompra;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actualizarIngrediente',function () {
	return view('actualizarIngrediente');
});

Route::get('revisarVentas', function () {
    $ordenesCompra = OrdenCompra::join('clientes','orden_compras.id_cliente','=','clientes.id')->join('distritos','clientes.id_distrito','=','distritos.id')->select('orden_compras.id','orden_compras.fechaPedido','distritos.nombreDistrito','orden_compras.estadoOrden')->get();

    return view('revisarVentas', compact('ordenesCompra'));
});

Route::get('detallePedido/{id}','revisarVentaController@mostrarDetallePedido');
