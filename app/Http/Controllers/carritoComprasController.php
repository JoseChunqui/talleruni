<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

use App\Http\Requests;
use \Illuminate\Http\Response;

define ('TIME_CARRITO',100);

class carritoComprasController extends Controller
{

	//Agrega Productos al Carrito de Compras
    public function addCarrito(Request $request, $id){
		if($request -> ajax()){
			$response = new Response;
			$cookieCarritoOld =  $request->cookie('cookieCarrito');
			if($cookieCarritoOld==null){
				$cookieCarritoOld = array([],[],[],[],[]);
			}else{				
				if(($key = array_search($id,$cookieCarritoOld[0])) !== false){					
					$cookieCarritoOld[4][$key] ++;
					$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld, TIME_CARRITO);
					$response->withCookie($cookieCarrito);
					return $response->header('stats',1);// stats 1: Producto Existente en el carrito
				}				
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

			$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld, TIME_CARRITO);
			$response->withCookie($cookieCarrito);
			return $response->header('stats',0); //stats 0: Producto no existente en el carrito
		}
	}

	//Vacia todo el carrito de Compras
	public function eliminarCarrito(Request $request){
		if($request -> ajax()){
			$response = new Response;
			$cookie = Cookie::forget('cookieCarrito');
			return $response->withCookie($cookie);
		}
	}
	//Elimina un producto del carrito de Compras
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
				$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld,TIME_CARRITO);
				$response->withCookie($cookieCarrito);
				return $response;
			}
		}
	}
	//Aumenta la cantidad de un productos en el carrito
	public function aumentaProducto(Request $request,$id){
		if($request -> ajax()){
			$response = new Response;
			$cookieCarritoOld =  $request->cookie('cookieCarrito');
			if($cookieCarritoOld!=null){
				foreach ($cookieCarritoOld[0] as $key => $value){
					if($value == $id){
						$cookieCarritoOld[4][$key] = $request->cantidadProd;
						break;
					}
				}
			}
			$cookieCarrito = cookie('cookieCarrito', $cookieCarritoOld, TIME_CARRITO);
			$response->withCookie($cookieCarrito);
			return $response;
		}		
	}
	//Devuelve el carrito de compras actual codificado a JSON para su uso en JavaScript
	public function getCarrito(Request $request){
		if($request -> ajax()){
			$cookieCarritoOld =  $request->cookie('cookieCarrito');
			if($cookieCarritoOld!=null){
				return response()->json([
				'idProd'=>$cookieCarritoOld[0],
				'imagenProducto'=>$cookieCarritoOld[1],
				'nomProd'=>$cookieCarritoOld[2],
				'precioProd'=>$cookieCarritoOld[3],
				'cantidadProd'=>$cookieCarritoOld[4]
				]);
			}
		}
	}



}
