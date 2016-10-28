<?php



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

//Módulo de Catalogo de Productos
Route::get('/','mainController@mostrarProductosCatalogo');
Route::get('productoEspecifico','mainController@personalizarProducto');
Route::get('realizarCompra', 'mainController@realizarCompra');
Route::get('confirmarCompra','mainController@confirmarCompra');
Route::get('productoEspecifico','mainController@productoEspecifico');
//Módulo de Administración -->Admin<--
Route::group(['prefix'=>'admin', 'middleware'=> 'logeo'],function(){
    //Verificar Ventas
    Route::get('revisarVentas','revisarVentaController@mostrarPedidosPendientes');

    //Historial de Ventas
    Route::get('revisarHistorial','revisarVentaController@mostrarHistorialVentas');

    Route::get('actualizarProducto', function () {
    return view('admin/actualizarProducto');
    });

    Route::get('actualizarCombo', function () {
        return view('admin/actualizarCombo');
    });
    Route::get('actualizarIngrediente', function () {
        return view('admin/actualizarIngrediente');
    });
    Route::get('balanceVentas',function(){
        return view('admin/balanceVentas');
    });

    //Salir del módulo de Administración del negocio
    Route::get('logout', 'Auth\LoginController@logout');
});

//Procesar Pedidos
Route::get('admin/procesarPedido/{id}','revisarVentaController@procesarPedido');
Route::get('admin/rechazarPedido/{id}','revisarVentaController@rechazarPedido');
Route::get('admin/reprocesarPedido/{id}','revisarVentaController@reprocesarPedido');


//Recepción de la petición AJAX para mostrar Detalle de Pedido
Route::get('admin/detallePedido/{id}','revisarVentaController@mostrarDetallePedido');
//Recepción de la petición AJAX para mostrar Detalle de Producto
Route::get('admin/detalleProducto/{id}', 'mainController@mostrarDetallePedido');

//Add Carrito
Route::get('addCarrito/{id}','carritoComprasController@addCarrito');
Route::get('eliminarCarrito', 'carritoComprasController@eliminarCarrito');
Route::get('eliminarProductoCarrito/{id}', 'carritoComprasController@eliminarProductoCarrito');

Route::group(['middleware'=> 'guest'],function(){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
});



