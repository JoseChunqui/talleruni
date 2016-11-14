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

    //Balance de Ventas AJAX
    Route::get('periodoBalance','balanceVentasController@periodoBalance');

    Route::get('chartBalance','balanceVentasController@chartBalance');

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



//Modulo data/Actualizar ingrediente
Route::get('/mostrarListaIng','updIngController@mostrarLista')->middleware('logeo');
Route::get('/mostrarListaIng/{nameIng?}','updIngController@eachSearch')->middleware('logeo');
Route::get('/admin/actualizarIngr/{nameIng?}',function ($nameIng=null){
    if($nameIng == null){
        return redirect()->action('updIngController@mostrarLista');
    }else{
        return redirect()->action('updIngController@eachSearch', ['nameIng' => $nameIng]);
    }
});
Route::post('/insertIng','updIngController@crear')->middleware('logeo');
Route::get('/deleteIng/{id}/{nombre}','updIngController@delete')->middleware('logeo');
Route::post('/updIng/{id}','updIngController@update')->middleware('logeo');
Route::get('/showdetailIng/{id}','updIngController@showdetail')->middleware('logeo');
Route::get('/deleteAllIng','updIngController@deleteAll')->middleware('logeo');
Route::get('/logout', 'Auth\LoginController@logout')->middleware('logeo');

//Modulo data/Actualizar producto
Route::get('/mostrarListaProd','updProdController@mostrarLista')->middleware('logeo');
Route::get('/mostrarListaProd/{nameProd?}','updProdController@eachSearch')->middleware('logeo');
Route::get('/admin/actualizarProdu/{nameProd?}',function ($nameProd = null){
    if($nameProd == null){
        return redirect()->action('updProdController@mostrarLista');
    }else{
        return redirect()->action('updProdController@eachSearch', ['nameProd' => $nameProd]);
    }
});
Route::post('/insertProd','updProdController@crear')->middleware('logeo');
Route::get('/deleteProd/{id}/{nombre}','updProdController@delete')->middleware('logeo');
Route::post('/updProd/{id}','updProdController@update')->middleware('logeo');
Route::get('/showdetailProd/{id}','updProdController@showdetail')->middleware('logeo');
Route::get('/deleteAllProd','updProdController@deleteAll')->middleware('logeo');
Route::get('/mostrarIngProd','updProdController@mostrarIngProd')->middleware('logeo');
Route::get('/agregarIngProd/{id_i}/{id_p}','updProdController@agregarIngProd')->middleware('logeo');
Route::get('/deleteIngProd/{id_i}/{id_p}','updProdController@deleteIngProd')->middleware('logeo');

//Modulo data/Actualizar combo
Route::get('/mostrarListaComb','updCombController@mostrarLista')->middleware('logeo');
Route::get('/mostrarListaComb/{nameComb?}','updCombController@eachSearch')->middleware('logeo');
Route::get('/admin/actualizarComb/{nameComb?}',function ($nameComb = null){
    if($nameComb == null){
        return redirect()->action('updCombController@mostrarLista');
    }else{
        return redirect()->action('updCombController@eachSearch', ['nameComb' => $nameComb]);
    }
});
Route::post('/insertComb','updCombController@crear')->middleware('logeo');
Route::get('/deleteComb/{id}/{nombre}','updCombController@delete')->middleware('logeo');
Route::post('/updComb/{id}','updCombController@update')->middleware('logeo');
Route::get('/showdetailComb/{id}','updCombController@showdetail')->middleware('logeo');
Route::get('/deleteAllComb','updCombController@deleteAll')->middleware('logeo');

