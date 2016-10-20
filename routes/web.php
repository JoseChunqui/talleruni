<?php

use App\OrdenCompra;
use App\Producto;
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
    $productos = Producto::all();
    return view('main', compact('productos'));
});

Route::get('login', function () {
    return view('login');
});
Route::get('admin/actualizarProducto', function () {
    return view('admin/actualizarProducto');
});

Route::get('admin/actualizarCombo', function () {
    return view('admin/actualizarCombo');
});
Route::get('admin/actualizarIngrediente', function () {
    return view('admin/actualizarIngrediente');
});


Route::get('admin/detalleProducto/{id}', 'mainController@mostrarDetallePedido');
//Procesar Pedidos
Route::get('admin/procesarPedido/{id}','revisarVentaController@procesarPedido');
Route::get('admin/rechazarPedido/{id}','revisarVentaController@rechazarPedido');
Route::get('admin/reprocesarPedido/{id}','revisarVentaController@reprocesarPedido');

Route::get('admin/revisarVentas', function () {
    $ordenesCompra = OrdenCompra::join('clientes','orden_compras.id_cliente','=','clientes.id')->join('distritos','clientes.id_distrito','=','distritos.id')->select('orden_compras.id','orden_compras.fechaPedido','distritos.nombreDistrito','orden_compras.estadoOrden')->get();

    return view('admin/revisarVentas', compact('ordenesCompra'));
});

Route::get('admin/detallePedido/{id}','revisarVentaController@mostrarDetallePedido');


//Historial de Ventas
Route::get('admin/revisarHistorial', function(){
    $ordenesCompra = OrdenCompra::join('clientes','orden_compras.id_cliente','=','clientes.id')->join('distritos','clientes.id_distrito','=','distritos.id')->select('orden_compras.id','orden_compras.fechaPedido','distritos.nombreDistrito','orden_compras.estadoOrden')->where('orden_compras.estadoOrden','=','procesado')->orWhere('orden_compras.estadoOrden','=','rechazado')->get();	
	return view('admin/revisarHistorial', compact('ordenesCompra'));
});

//productoEspecifico
Route::get('productoEspecifico',function(){
    return view('productoEspecifico');
});

//infoConsumidor
Route::get('confirmarCompra',function(){
    return view('confirmarCompra');
});