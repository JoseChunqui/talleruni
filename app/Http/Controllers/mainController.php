<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;
use App\TipoSandwich;
use App\CookieCarrito;
use \Illuminate\Http\Response;

class mainController extends Controller
{
    //Muestra productos por categoría
	/*public function menuProductos(Request $request, $categoryProds){
		$productos = Producto::join('imagen_productos','productos.id','=','imagen_productos.id_producto')
		->join('sandwichs','productos.id','=','sandwichs.id_producto')
		->join('tipo_sandwichs','sandwichs.id_tipo_sandwich','=','tipo_sandwichs.id')
		->select('productos.id as id_producto',
	        'productos.nombreProducto',
	        'productos.precioUnitario',
	        'imagen_productos.nombreImagen as nombreImagenProducto',
	        'tipo_sandwichs.nombreSandwich as tipoSanwich'
	        )
		->where('tipo_sandwichs.nombreSandwich','=',$categoryProds)
		->get();
    	return view('main', compact('productos'));

	}*/


    public function mostrarDetallePedido(Request $request, $id){
    	if($request -> ajax()){
    		$detalleProducto = Producto::join('imagen_productos','productos.id','=','imagen_productos.id_producto')
    		->select('productos.id as id_producto',
    			'productos.nombreProducto',
    			'productos.precioUnitario',
    			'productos.estado',
    			'productos.descripcion',
    			'imagen_productos.nombreImagen as imagenProducto')
    		->where('productos.id','=',$id)
    		->get();
		    /*$detalleProducto = Producto::where('id','=',$id)->select('id','nombreProducto','precioUnitario','estado','descripcion')->get();*/
		    $id_producto = $detalleProducto->pluck('id_producto');
		    $nombreProducto = $detalleProducto->pluck('nombreProducto');
		    $precioUnitario = $detalleProducto->pluck('precioUnitario');
		    $estado = $detalleProducto->pluck('estado');
		    $descripcion = $detalleProducto->pluck('descripcion');
		    $imagenProducto = $detalleProducto->pluck('imagenProducto');

			return response()->json([
				'id_producto'=>$id_producto,
				'nombreProducto'=>$nombreProducto,
				'precioUnitario'=>$precioUnitario,
				'estado'=>$estado,
				'descripcion'=>$descripcion,
				'imagenProducto'=>$imagenProducto		
			]);
		}
	}

	public function mostrarProductosCatalogo(Request $request){
		$productos = Producto::join('imagen_productos','productos.id','=','imagen_productos.id_producto')
		->join('sandwichs','productos.id','=','sandwichs.id_producto')
		->join('tipo_sandwichs','sandwichs.id_tipo_sandwich','=','tipo_sandwichs.id')
		->select('productos.id as id_producto',
	        'productos.nombreProducto',
	        'productos.precioUnitario',
	        'imagen_productos.nombreImagen as nombreImagenProducto',
	       	'tipo_sandwichs.nombreTipoSandwich as tipoSandwich'
	        )
		->get();

		//Recuperar Cookie del Carrito de Compras
		$productosCarrito = $request->cookie('cookieCarrito');
    	return view('main', compact('productos','productosCarrito'));
	}

	public function confirmarCompra(Request $request){
		$productosCarrito = $request->cookie('cookieCarrito');
		return view('confirmarCompra',compact('productosCarrito'));
	}
	public function productoEspecifico(Request $request){
		$productosCarrito = $request->cookie('cookieCarrito');
		return view('productoEspecifico',compact('productosCarrito'));
	}


}

