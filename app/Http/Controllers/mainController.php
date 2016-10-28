<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;
use App\TipoSandwich;

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

		    $catalogo = $this->catalogoMenu();
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
		$cookieCarritoOld = $request->cookie('cookieCarrito');
		$productosCarrito = array([],[],[],[]);
		/*
		0: Id del producto (id_producto)	
		1: Imagen (nombreImagenProducto)
		2: Nombre del producto (nombreProducto)
		3: Precio Unitario (precioUnitario)
		4: numero de un producto en carrito (carrito)
		*/
		for($i=0 ; $i < count($cookieCarritoOld[0]); $i++){
			for($j = 0; $j <count($productos); $j++){
				if($productos[$j]->id_producto == $cookieCarritoOld[0][$i]){
					array_push($productosCarrito[0], $productos[$j]->id_producto);
					array_push($productosCarrito[1], $productos[$j]->nombreImagenProducto);
					array_push($productosCarrito[2], $productos[$j]->nombreProducto);
					array_push($productosCarrito[3], $productos[$j]->precioUnitario);
				}
			}
		}


		$catalogo = $this->catalogoMenu();
    	return view('main', compact('productos', 'catalogo','productosCarrito'));
	}

	public function personalizarProducto(Request $request){
		$catalogo = $this->catalogoMenu();
    	return view('productoEspecifico', compact('catalogo'));
	}

	public function addCarrito(Request $request, $id){
		if($request -> ajax()){
			$response = new response;
			$cookieCarritoOld =  $request->cookie('cookieCarrito');
			if($cookieCarritoOld==null){
				$arrayCarrito = array(array(),array());
				array_push($arrayCarrito[0], $id);
				array_push($arrayCarrito[1], 1);
				$cookieCarrito = cookie('cookieCarrito', $arrayCarrito, 1);
				$response->withCookie($cookieCarrito);
				return $response;
			}else{
				array_push($cookieCarritoOld[0], $id);
				array_push($cookieCarritoOld[1], 1);
				$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld, 1);
				$response->withCookie($cookieCarrito);
				return $response;
			}
		}
	}
}

