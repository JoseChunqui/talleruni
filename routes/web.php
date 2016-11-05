<?php

//===>>CATÁLOGO DE PRODUCTOS | PÁGINA DE INICIO DEL NEGOCIO<<===
Route::get('/','mainController@mostrarProductosCatalogo');
Route::get('productoEspecifico','mainController@personalizarProducto');
Route::get('realizarCompra', 'realizarCompraController@realizarCompra');
Route::get('confirmarCompra','mainController@confirmarCompra');
Route::get('productoEspecifico','mainController@productoEspecifico');


//===>>PROCESO DE COMPRA<<===
//--Carrito de Compras--
Route::get('addCarrito/{id}','carritoComprasController@addCarrito');
Route::get('eliminarCarrito', 'carritoComprasController@eliminarCarrito');
Route::get('eliminarProductoCarrito/{id}', 'carritoComprasController@eliminarProductoCarrito');
Route::get('aumentaProducto/{id}', 'carritoComprasController@aumentaProducto');
Route::get('getCarrito', 'carritoComprasController@getCarrito');
//Recepción de la petición AJAX para mostrar Detalle de Producto
Route::get('detalleProducto/{id}', 'mainController@mostrarDetallePedido');
//--Formulario de Compras Online--
Route::post('realizarCompra','realizarCompraController@registrarPedido');
Route::get('precargarProductos','realizarCompraController@precargarProductos');
Route::get('compraRealizada',function(){
    return view('success/compraRealizada');
});

//===>>MÓDULO DE ADMINISTRACIÓN DEL NEGOCIO<<===
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
    //Procesar Pedidos
    Route::get('procesarPedido/{id}','revisarVentaController@procesarPedido');
    Route::get('rechazarPedido/{id}','revisarVentaController@rechazarPedido');
    Route::get('reprocesarPedido/{id}','revisarVentaController@reprocesarPedido');

    //Recepción de la petición AJAX para mostrar Detalle de Pedido
    Route::get('detallePedido/{id}','revisarVentaController@mostrarDetallePedido');


    //Salir del módulo de Administración del negocio
    Route::get('logout', 'Auth\LoginController@logout');
});

//===>AUTENTIFICACIÓN<===
Route::group(['middleware'=> 'guest'],function(){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
});


//Módulo de pruebas
Route::get('eventoPusherTest', function(){
    event(new \App\Events\nuevoPedidoEvent());
    return  view('productoEspecifico');
});
//parte Antonio
Route::get('showList','updIngController@mostrarIng');
Route::get('showDetail/{nameIng}','updIngController@eachSearch');
Route::get('admin/actualizarIngr/{nameIng?}',function ($nameIng=null){
    if($nameIng == null){
        return redirect()->action('updIngController@mostrarIng');
    }else{
        return redirect()->action('updIngController@eachSearch', ['nameIng' => $nameIng]);
    }
});
Route::post('insertIng','updIngController@crear');
Route::get('deleteIng/{id}','updIngController@delete');
Route::post('updIng/{id}','updIngController@update');
Route::get('showdetail/{id}','updIngController@showdetail');
Route::get('/deleteAll','updIngController@deleteAll');

