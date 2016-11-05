<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class updIngController extends Controller
{
	function mostrarIng(){
		$ingredientes = DB::select('select a.id, a.nombreIngrediente, b.nombreImagen
			from ingredientes a, imagen_ingredientes b
			where a.id=b.id_ingrediente');
		return view('admin.actualizarIngrediente', ['ingredientes' => $ingredientes]);
	}
	function eachSearch($nameIng){
		$likeSql="%".$nameIng."%";
		$ingredientes = DB::select('select a.id, a.nombreIngrediente, b.nombreImagen 
			from ingredientes a, imagen_ingredientes b
			where a.nombreIngrediente like ?
			and a.id=b.id_ingrediente',[$likeSql]);
		return view('admin.actualizarIngrediente', ['ingredientes' => $ingredientes]);
	}
	function crear(Request $request){
			$nombre = $request->input('nombre');
			$precio = $request->input('precio');
			$estado = $request->input('estado');
			$descripcion = $request->input('descripcion');
			$file = $request->file('image');
			$descripcionImagen = $request->input('descripcionImagen');

			DB::insert('insert into ingredientes (id_administrador,id_promocion,nombreIngrediente , precionUnitario , estado , descripcion) values(?,?,?,?,?,?)',['1','0',$nombre,$precio,$estado,$descripcion]);

			$id = DB::select('select distinct id from ingredientes where nombreIngrediente=?',[$nombre]);
			$nombre = str_replace(' ', '', $nombre);
			$destinationPath = 'Imagenes/Ingredientes';
			$nombre = $nombre.".jpg";
	        $file->move($destinationPath,$nombre);
			DB::insert('insert into imagen_ingredientes (id_ingrediente,nombreImagen,estado,descripcion) values(?,?,?,?)',[$id[0]->id,$nombre,'',$descripcionImagen]);


		return redirect('admin/actualizarIngr');
	}
	function update(Request $request,$id){
			$nombre = $request->input('nombreIngr');
			$precio = $request->input('precioIngr');
			$estado = $request->input('estadoIngr');
			$descripcion = $request->input('descripcionIngr');
			$file = $request->file('image');
			$descripcionImagen = $request->input('descripcionImagen');
		try{
			DB::update('update ingredientes set id_administrador=?,id_promocion=?,nombreIngrediente=? , precionUnitario=? , estado=? , descripcion=? where id=?',['1','0',$nombre,$precio,$estado,$descripcion,$id]);
				$nombre = str_replace(' ', '', $nombre);
				$destinationPath = 'Imagenes/Ingredientes';
				$nombre = $nombre.".jpg";
			if ($request->hasFile('image')) {
			    $file->move($destinationPath,$nombre);
			}
			DB::beginTransaction();
			DB::update('update imagen_ingredientes set nombreImagen=?,estado=?,descripcion=? where id_ingrediente=?',[$nombre,"",$descripcionImagen,$id]);
			DB::commit();
			return redirect('admin/actualizarIngr');
		}catch(Exception $e){
			DB::rollBack();
			return "fallo";
		}			

	}
	function showdetail($id){
		$data = DB::select('select a.nombreIngrediente, a.precionUnitario, a.estado, a.descripcion, b.nombreImagen, b.descripcion as descripcionImagen
			from ingredientes a, imagen_ingredientes b
			where a.id=?
			and a.id=b.id_ingrediente', [$id]);
		return response()->json([
				"nombreIngrediente"=> $data[0]->nombreIngrediente,
				"precionUnitario"=>$data[0]->precionUnitario,
				"estado"=>$data[0]->estado,
				"descripcion"=>$data[0]->descripcion,
				"nombreImagen"=>$data[0]->nombreImagen,
				"descripcionImagen"=>$data[0]->descripcionImagen
			]);
	}
	function delete($id){
		$nombre = DB::select('select nombreImagen from imagen_ingredientes where id_ingrediente=?',[$id]);
		try{
			DB::beginTransaction();
	        $exists = Storage::disk('storageApp')->exists($nombre->nombreImagen);
	        if ($exists) {
	            Storage::disk('storageApp')->delete($nombre->nombreImagen);
	        }
			DB::delete('delete from imagen_ingredientes where id_ingrediente=?',[$id]);
			DB::delete('delete from ingredientes where id=?',[$id]);
			DB::commit();
			return "exito";
		}catch(Exception $e){
			DB::rollBack();
			return "fallo";
		}		
	}
	function deleteAll(Request $request){
		$dels = $request->input('data');
		try{
			DB::beginTransaction();
			foreach ($dels as $del) {
				DB::delete('delete from imagen_ingredientes where id_ingrediente=?',[$del]);
				DB::delete('delete from ingredientes where id=?',[$del]);
				DB::beginTransaction();
	        	/*$exists = Storage::disk('storageApp')->exists($nombre);
		        if ($exists) {
		            Storage::disk('storageApp')->delete($nombre);
		        }*/
			}
			DB::commit();
			return "exito";
		}catch(Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}
}
