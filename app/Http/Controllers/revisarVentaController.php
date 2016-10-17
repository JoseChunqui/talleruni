<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DetalleOrdenCompra;

class revisarVentaController extends Controller
{
    public function mostrarDetallePedido(Request $request, $id){
    	if($request -> ajax()){


    		//$detalleOrdenCompra =  DetalleOrdenCompra::where('id_orden_compra','=',$id)->get();
    		$detalleOrdenCompra =  DetalleOrdenCompra::join('orden_compras','detalle_orden_compras.id_orden_compra','=','orden_compras.id')->join('clientes','orden_compras.id_cliente','=','clientes.id')->join('distritos','distritos.id','=','clientes.id_distrito')->select('detalle_orden_compras.id_orden_compra','clientes.nombre','clientes.apellidos','distritos.nombreDistrito','clientes.domicilio','detalle_orden_compras.cantidad')->where('id_orden_compra','=',$id)->get();
    		$id_orden_compra=$detalleOrdenCompra->pluck("id_orden_compra");
    		$nombre=$detalleOrdenCompra->pluck("nombre");
    		$apellidos=$detalleOrdenCompra->pluck("apellidos");
    		$cantidad=$detalleOrdenCompra->pluck("cantidad");
    		return response()->json([
    			'id_orden_compra'=>$id_orden_compra,
    			'nombre'=>$nombre,
    			'apellidos'=>$apellidos,
    			'cantidad'=>$cantidad
    			]);
    	}
    }	

    //


}
