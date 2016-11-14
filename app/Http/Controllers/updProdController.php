<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Requests\ProdCreateRequest;
use App\Http\Requests\ProdModifyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;

class updProdController extends Controller
{
	function mostrarLista(){
		$productos = DB::select('select a.id, a.nombreProducto, b.nombreImagen
			from productos a, imagen_productos b
			where a.id=b.id_producto');
		return view('admin.actualizarProducto', ['productos' => $productos]);
	}
	function eachSearch($nameProd){
		$likeSql="%".$nameProd."%";
		$productos = DB::select('select a.id, a.nombreProducto, b.nombreImagen 
			from productos a, imagen_productos b
			where a.nombreProducto like ?
			and a.id=b.id_producto',[$likeSql]);
		return view('admin.actualizarProducto', ['productos' => $productos]);
	}
	function crear(ProdCreateRequest $request){
			$nombre = $request->input('nombre');
			$precio = $request->input('precio');
			$estado = $request->input('estado');
			$descripcion = $request->input('descripcion');
			$file = $request->file('image');
			$extension=$file->getClientOriginalExtension();
			$descripcionImagen = $request->input('descripcionImagen');

			DB::insert('insert into productos (id_administrador,id_promocion,nombreProducto , precioUnitario , estado , descripcion) values(?,?,?,?,?,?)',['1','0',$nombre,$precio,$estado,$descripcion]);

			$id = DB::select('select distinct id from productos where nombreProducto=?',[$nombre]);
			$nombre = str_replace(' ', '', $nombre);
			$destinationPath = 'Imagenes/productos/sandwichs';
			$nombre = $nombre.".".$extension;
	        $file->move($destinationPath,$nombre);
			DB::insert('insert into imagen_productos (id_producto,nombreImagen,estado,descripcion) values(?,?,?,?)',[$id[0]->id,$nombre,'',$descripcionImagen]);

		return "exito";
	}
	function update(ProdModifyRequest $request,$id){
			$nombre = $request->input('nombreProdu');
			$precio = $request->input('precioProdu');
			$estado = $request->input('estadoProdu');
			$descripcion = $request->input('descripcionProdu');
			$descripcionImagen = $request->input('descripcionImagen');
		try{
			DB::beginTransaction();
			DB::update('update productos set id_administrador=?,id_promocion=?,nombreProducto=?, precioUnitario=? , estado=? , descripcion=? where id=?',['1','0',$nombre,$precio,$estado,$descripcion,$id]);
			if ($request->hasFile('image')) {
				$dek=DB::select('select nombreImagen from imagen_productos where id_producto =?',[$id]);
				$file = $request->file('image');
				$extension=$file->getClientOriginalExtension();
				$nombre = str_replace(' ', '_', $nombre);
				$destinationPath = 'Imagenes/productos/sandwichs';
				$nombre = $nombre.".".$extension;
			    $file->move($destinationPath,$nombre);
			    DB::update('update imagen_productos set nombreImagen=?,estado=?,descripcion=? where id_producto=?',[$nombre,"",$descripcionImagen,$id]);
			    Storage::disk('storeProd')->delete($dek[0]->nombreImagen);
			}else{
				DB::update('update imagen_productos set estado=?,descripcion=? where id_producto=?',["",$descripcionImagen,$id]);
			}
			DB::commit();
			return "exito";
		}catch(\Exception $e){
			DB::rollBack();
			return "fallo";
		}	

	}
	function showdetail($id){
		$data = DB::select('select a.nombreProducto, a.precioUnitario, a.estado, a.descripcion, b.nombreImagen, b.descripcion as descripcionImagen
			from productos a, imagen_productos b
			where a.id=?
			and a.id=b.id_producto', [$id]);
		$ing=DB::select('select a.id_ingrediente, b.id, b.nombreIngrediente 
			from detalle_sandwichs a, ingredientes b
			where a.id_producto=?
			and a.id_ingrediente = b.id',[$id]);
		return response()->json([
				"nombreProducto"=> $data[0]->nombreProducto,
				"precioUnitario"=>$data[0]->precioUnitario,
				"estado"=>$data[0]->estado,
				"descripcion"=>$data[0]->descripcion,
				"nombreImagen"=>$data[0]->nombreImagen,
				"descripcionImagen"=>$data[0]->descripcionImagen,
				"ingredientes"=>$ing
			]);
	}
	function delete($id,$nombre){
		try{
			DB::beginTransaction();
	        $exists = Storage::disk('storeProd')->exists($nombre);
	        if ($exists) {
	            Storage::disk('storeProd')->delete($nombre);
	        }
			DB::delete('delete from imagen_productos where id_producto=?',[$id]);
			DB::delete('delete from detalle_sandwichs where id_producto=?',[$id]);
			DB::delete('delete from productos where id=?',[$id]);
			DB::commit();
			return "exito";
		}catch(\Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}
	function deleteAll(Request $request){
		$delsId = $request->input('id');
		$delsName = $request->input('nombreImagen');
		try{
			DB::beginTransaction();
			foreach ($delsId as $del) {
				DB::delete('delete from imagen_productos where id_producto=?',[$del]);
				DB::delete('delete from detalle_sandwichs where id_producto=?',[$del]);
				DB::delete('delete from productos where id=?',[$del]);
			}
			DB::commit();
			foreach ($delsName as $ex) {
				$ex = str_replace(' ', '', $ex);
		    	Storage::disk('storeProd')->delete($ex);
			}
			return "exito";
		}catch(\Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}
	function mostrarIngProd(){
		$dat = DB::select('select id,nombreIngrediente from ingredientes');
		return $dat;
	}
	function agregarIngProd($id_i,$id_p){
		try{
			DB::beginTransaction();
			DB::insert('insert into detalle_sandwichs (id_ingrediente,id_producto,cantidad , predeterminado) values(?,?,?,?)',[$id_i,$id_p,'1','1']);
			DB::commit();
			return "exito";
		}catch(\Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}	
	function deleteIngProd($id_i,$id_p){
		try{
			DB::beginTransaction();
			DB::delete('delete from detalle_sandwichs where id_producto = ? and id_ingrediente =?',[$id_p,$id_i]);
			DB::commit();
			return "exito";
		}catch(\Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}	


}