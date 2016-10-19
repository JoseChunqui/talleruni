<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;

class mainController extends Controller
{
    //
    public function mostrarDetallePedido(Request $request, $id){
    	if($request -> ajax()){
		    $detalleProducto = Producto::where('id','=',$id)->select('id','nombreProducto','precioUnitario','estado','descripcion')->get();
		    $id_producto = $detalleProducto->pluck('id');
		    $nombreProducto = $detalleProducto->pluck('nombreProducto');
		    $precioUnitario = $detalleProducto->pluck('precioUnitario');
		    $estado = $detalleProducto->pluck('estado');
		    $descripcion = $detalleProducto->pluck('descripcion');
			return response()->json([
				'id_producto'=>$id_producto,
				'nombreProducto'=>$nombreProducto,
				'precioUnitario'=>$precioUnitario,
				'estado'=>$estado,
				'descripcion'=>$descripcion		
			]);
		}
		}
}
