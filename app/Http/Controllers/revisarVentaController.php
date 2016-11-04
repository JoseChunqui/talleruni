<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DetalleOrdenCompra;
use App\OrdenCompra;

class revisarVentaController extends Controller
{

    public function mostrarPedidosPendientes(){
        $ordenesCompra = OrdenCompra::join('clientes','orden_compras.id_cliente','=','clientes.id')
        ->join('distritos','clientes.id_distrito','=','distritos.id')
        ->select('orden_compras.id',
                'orden_compras.fechaPedido',
                'distritos.nombreDistrito',
                'orden_compras.estadoOrden')
        ->where('orden_compras.estadoOrden','=','pendiente')
        ->orderBy('orden_compras.fechaPedido','ASC')
        ->get();
        return view('admin/revisarVentas', compact('ordenesCompra'));
    }

    public function mostrarHistorialVentas(){
        $ordenesCompra = OrdenCompra::join('clientes','orden_compras.id_cliente','=','clientes.id')
            ->join('distritos','clientes.id_distrito','=','distritos.id')
            ->select('orden_compras.id',
                    'orden_compras.fechaPedido',
                    'distritos.nombreDistrito',
                    'orden_compras.estadoOrden',
                    'orden_compras.updated_at'
                    )
            ->where('orden_compras.estadoOrden','=','procesado')
            ->orWhere('orden_compras.estadoOrden','=','rechazado')
            ->orderBy('orden_compras.fechaPedido','ASC')
            ->get();    
        return view('admin/revisarHistorial', compact('ordenesCompra'));        
    }

    public function mostrarDetallePedido(Request $request, $id){
    	if($request -> ajax()){
    		$ordenCompra = OrdenCompra::join('clientes','orden_compras.id_cliente','=','clientes.id')
            ->join('distritos','clientes.id_distrito','=','distritos.id')
            ->select('orden_compras.fechaPedido',
                    'clientes.nombre',
                    'clientes.apellidos',
                    'clientes.dni',
                    'distritos.nombreDistrito',
                    'clientes.domicilio')
            ->where('orden_compras.id','=',(int)$id)
            ->get();

            //Productos comprados (Detalle de Orden)
            $productosComprados = DetalleOrdenCompra::join('productos','detalle_orden_compras.id_producto','=','productos.id')
            ->select('productos.nombreProducto','productos.id as id_producto','productos.precioUnitario', 'detalle_orden_compras.cantidad')
            ->where('detalle_orden_compras.id_orden_compra','=',(int)$id)
            ->get();

    		$fechaPedido = $ordenCompra->pluck("fechaPedido");
    		$nombre = $ordenCompra->pluck("nombre");
    		$apellidos = $ordenCompra->pluck("apellidos");
    		$dni = $ordenCompra->pluck("dni");
            $nombreDistrito = $ordenCompra->pluck("nombreDistrito");
            $domicilio = $ordenCompra->pluck("domicilio");

    		return response()->json([
                'codPedido' => $id,
                'fechaPedido'=>$fechaPedido,
    			'nombre'=>$nombre,
    			'apellidos'=>$apellidos,
                'dni'=>$dni,
                'nombreDistrito'=>$nombreDistrito,
                'domicilio'=>$domicilio,
                'productosComprados'=>$productosComprados
    			]);
    	}
    }

    //PROCESAR PEDIDOS ---UPDATE---
    public function procesarPedido(Request $request, $id){
        if($request -> ajax()){
            $ordenCompra = OrdenCompra::where('id','=',(int)$id)
            ->update(['estadoOrden'=>'procesado']);
            return response()->json(['respuesta'=>'procesado']);
        }
    }
    public function rechazarPedido(Request $request, $id){
        if($request -> ajax()){
            $ordenCompra = OrdenCompra::where('id','=',(int)$id)
            ->update(['estadoOrden'=>'rechazado']);
            return response()->json(['respuesta'=>'rechazado']);
        }
    }
    public function reprocesarPedido(Request $request, $id){
        if($request -> ajax()){
            $ordenCompra = OrdenCompra::where('id','=',(int)$id)
            ->update(['estadoOrden'=>'pendiente']);
            return response()->json(['respuesta'=>'pendiente']);
        }
    }
}
