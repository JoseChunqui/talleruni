<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;
use App\TipoSandwich;

class mainController extends Controller
{
    //

    public function catalogoMenu(){
    	$catalogo = TipoSandwich::all();
    	return $catalogo;
    }
    public function mostrarDetallePedido(Request $request, $id){
    	if($request -> ajax()){
		    $detalleProducto = Producto::where('id','=',$id)->select('id','nombreProducto','precioUnitario','estado','descripcion')->get();
		    $id_producto = $detalleProducto->pluck('id');
		    $nombreProducto = $detalleProducto->pluck('nombreProducto');
		    $precioUnitario = $detalleProducto->pluck('precioUnitario');
		    $estado = $detalleProducto->pluck('estado');
		    $descripcion = $detalleProducto->pluck('descripcion');

		    $catalogo = $this->catalogoMenu();
			return response()->json([
				'id_producto'=>$id_producto,
				'nombreProducto'=>$nombreProducto,
				'precioUnitario'=>$precioUnitario,
				'estado'=>$estado,
				'descripcion'=>$descripcion		
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
		$catalogo = $this->catalogoMenu();
    	return view('main', compact('productos', 'catalogo'));
	}

	public function personalizarProducto(Request $request){
		$catalogo = $this->catalogoMenu();
    	return view('productoEspecifico', compact('catalogo'));
	}
}
