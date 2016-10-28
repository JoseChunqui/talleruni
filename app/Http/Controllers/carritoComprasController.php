<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

use App\Http\Requests;
use \Illuminate\Http\Response;

class carritoComprasController extends Controller
{
	//Agrega Productos al Carrito de Compras
    public function addCarrito(Request $request, $id){
		if($request -> ajax()){
			$response = new Response;
			$cookieCarritoOld =  $request->cookie('cookieCarrito');
			if($cookieCarritoOld==null){
				$cookieCarritoOld = array([],[],[],[],[]);
			}
			/*
			0: ID del producto añadido al Carrito
			1: Imagen del producto añadido al Carrito
			2: Nombre del producto añadido al Carrito
			3: Precio del producto añadido al Carrito
			4: Cantidad del producto añadido al Carrito
			*/
			array_push($cookieCarritoOld[0], $id);
			array_push($cookieCarritoOld[1], $request->imagenProducto);
			array_push($cookieCarritoOld[2], $request->nomProd);
			array_push($cookieCarritoOld[3], $request->precioProd);
			array_push($cookieCarritoOld[4], 1);

			$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld, 1);
			$response->withCookie($cookieCarrito);
			return $response;
		}
	}

	public function eliminarCarrito(Request $request){
		if($request -> ajax()){
			$response = new Response;
			$cookie = Cookie::forget('cookieCarrito');
			return $response->withCookie($cookie);
		}
	}
	public function eliminarProductoCarrito(Request $request,$id){
		if($request -> ajax()){
			$response = new Response;
			$cookieCarritoOld =  $request->cookie('cookieCarrito');
			if($cookieCarritoOld!=null){
				foreach ($cookieCarritoOld[0] as $key => $value) {
					if($value == $id){
						for ($i = 0; $i<5; $i++){
							unset($cookieCarritoOld[$i][$key]);
						}
						break;
					}
				}
				$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld, 1);
				$response->withCookie($cookieCarrito);
				return $response;
			}
		}
	}



}
