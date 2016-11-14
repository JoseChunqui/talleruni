<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Requests\IngCreateRequest;
use App\Http\Requests\IngModifyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;


class updIngController extends Controller
{
	function mostrarLista(){
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
	function crear(IngCreateRequest $request){
			$nombre = $request->input('nombre');
			$precio = $request->input('precio');
			$estado = $request->input('estado');
			$descripcion = $request->input('descripcion');
			$file = $request->file('image');
			$extension=$file->getClientOriginalExtension();
			$descripcionImagen = $request->input('descripcionImagen');

			DB::insert('insert into ingredientes (id_administrador,id_promocion,nombreIngrediente , precionUnitario , estado , descripcion) values(?,?,?,?,?,?)',['1','0',$nombre,$precio,$estado,$descripcion]);

			$id = DB::select('select distinct id from ingredientes where nombreIngrediente=?',[$nombre]);
			$nombre = str_replace(' ', '_', $nombre);
			$destinationPath = 'Imagenes/Ingredientes';
			$nombre = $nombre.".".$extension;
	        $file->move($destinationPath,$nombre);
			DB::insert('insert into imagen_ingredientes (id_ingrediente,nombreImagen,estado,descripcion) values(?,?,?,?)',[$id[0]->id,$nombre,'',$descripcionImagen]);

		return "exito";
	}
	function update(IngModifyRequest $request,$id){
			$nombre = $request->input('nombreIngr');
			$precio = $request->input('precioIngr');
			$estado = $request->input('estadoIngr');
			$descripcion = $request->input('descripcionIngr');
			$descripcionImagen = $request->input('descripcionImagen');
		try{
			DB::beginTransaction();
			DB::update('update ingredientes set id_administrador=?,id_promocion=?,nombreIngrediente=?, precionUnitario=? , estado=? , descripcion=? where id=?',['1','0',$nombre,$precio,$estado,$descripcion,$id]);
			if ($request->hasFile('image')) {
				$dek=DB::select('select nombreImagen from imagen_ingredientes where id_ingrediente =?',[$id]);
				$file = $request->file('image');
				$extension=$file->getClientOriginalExtension();
				$nombre = str_replace(' ', '_', $nombre);
				$destinationPath = 'Imagenes/Ingredientes';
				$nombre = $nombre.".".$extension;
			    $file->move($destinationPath,$nombre);
			    DB::update('update imagen_ingredientes set nombreImagen=?,estado=?,descripcion=? where id_ingrediente=?',[$nombre,"",$descripcionImagen,$id]);
			    Storage::disk('storeIng')->delete($dek[0]->nombreImagen);
			}else{
			DB::update('update imagen_ingredientes set estado=?,descripcion=? where id_ingrediente=?',["",$descripcionImagen,$id]);
			}
			DB::commit();
			return "exito";
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
	function delete($id,$nombre){
		try{
			DB::beginTransaction();
	        $exists = Storage::disk('storeIng')->exists($nombre);
	        if ($exists) {
	            Storage::disk('storeIng')->delete($nombre);
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
		$delsId = $request->input('id');
		$delsName = $request->input('nombreImagen');
		try{
			DB::beginTransaction();
			foreach ($delsId as $del) {
				DB::delete('delete from imagen_ingredientes where id_ingrediente=?',[$del]);
				DB::delete('delete from ingredientes where id=?',[$del]);
			}
			DB::commit();
			foreach ($delsName as $ex) {
				$ex = str_replace(' ', '', $ex);
		    	Storage::disk('storeIng')->delete($ex);
			}
			return "exito";
		}catch(Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}
}
