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
    //

    public function catalogoMenu(){
    	$catalogo = TipoSandwich::all();
    	return $catalogo;
    }
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
		->select('productos.id as id_producto',
	        'productos.nombreProducto',
	        'productos.precioUnitario',
	        'imagen_productos.nombreImagen as nombreImagenProducto'
	        )
		->get();

		//Recuperar Cookie del Carrito de Compras
		$productosCarrito = $request->cookie('cookieCarrito');

		$catalogo = $this->catalogoMenu();
    	return view('main', compact('productos', 'catalogo','productosCarrito'));
	}

	public function realizarCompra(Request $request){
		$productosCarrito = $request->cookie('cookieCarrito');		
		return view('realizarCompra',compact('productosCarrito'));
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

