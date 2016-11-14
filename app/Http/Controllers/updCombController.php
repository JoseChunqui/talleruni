<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Requests\CombCreateRequest;
use App\Http\Requests\CombModifyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;

class updCombController extends Controller
{
	function mostrarLista(){
		$combos = DB::select('select a.id, a.nombreCombo, b.nombreImagen
			from combos a, imagen_combos b
			where a.id=b.id_combo');
		return view('admin.actualizarCombo', ['combos' => $combos]);
	}
	function eachSearch($nameComb){
		$likeSql="%".$nameComb."%";
		$combos = DB::select('select a.id, a.nombreCombo, b.nombreImagen 
			from combos a, imagen_combos b
			where a.nombreCombo like ?
			and a.id=b.id_combo',[$likeSql]);
		return view('admin.actualizarCombo', ['combos' => $combos]);
	}
	function crear(CombCreateRequest $request){
			$nombre = $request->input('nombre');
			$precio = $request->input('precio');
			$estado = $request->input('estado');
			$descripcion = $request->input('descripcion');
			$file = $request->file('image');
			$extension=$file->getClientOriginalExtension();
			$descripcionImagen = $request->input('descripcionImagen');
			$fInicio=$request->input('fInicio');
			$fFin=$request->input('fFin');



			DB::insert('insert into combos (id_administrador,nombreCombo , precioCombo , estado , descripcion,fechaInicio,fechaFin) values(?,?,?,?,?,?,?)',['1',$nombre,$precio,$estado,$descripcion,$fInicio,$fFin]);

			$id = DB::select('select distinct id from combos where nombreCombo=?',[$nombre]);
			$nombre = str_replace(' ', '', $nombre);
			$destinationPath = 'Imagenes/Combos';
			$nombre = $nombre.".".$extension;
	        $file->move($destinationPath,$nombre);
			DB::insert('insert into imagen_combos (id_combo,nombreImagen,estado,descripcion) values(?,?,?,?)',[$id[0]->id,$nombre,'',$descripcionImagen]);

		return "exito";
	}
	function update(CombModifyRequest $request,$id){
			$nombre = $request->input('nombreCombo');
			$precio = $request->input('precioCombo');
			$estado = $request->input('estadoCombo');
			$descripcion = $request->input('descripcionCombo');
			$descripcionImagen = $request->input('descripcionImagen');
			$fInicio=$request->input('fInicio');
			$fFin=$request->input('fFin');
		try{
			DB::beginTransaction();
			DB::update('update combos set nombreCombo=?, precioCombo=? , estado=? , descripcion=?,fechaInicio=?,fechaFin=? where id=?',[$nombre, $precio, $estado, $descripcion,$fInicio, $fFin,$id]);
			if ($request->hasFile('image')) {
				$dek=DB::select('select nombreImagen from imagen_combos where id_combo =?',[$id]);
				$file = $request->file('image');
				$extension=$file->getClientOriginalExtension();
				$nombre = str_replace(' ', '_', $nombre);
				$destinationPath = 'Imagenes/Combos/';
				$nombre = $nombre.".".$extension;
			    $file->move($destinationPath,$nombre);
			    DB::update('update imagen_combos set nombreImagen=?,descripcion=? where id_combo=?',[$nombre,$descripcionImagen,$id]);
			    Storage::disk('storeProd')->delete($dek[0]->nombreImagen);
			}else{
				DB::update('update imagen_combos set descripcion=? where id_combo=?',[$descripcionImagen,$id]);
			}
			DB::commit();
			return "exito";
		}catch(\Exception $e){
			DB::rollBack();
			return $e;
		}

	}
	function showdetail($id){
		$data = DB::select('select a.nombreCombo, a.precioCombo, a.estado, a.descripcion, a.fechaInicio, a.fechaFin, b.nombreImagen, b.descripcion as descripcionImagen
			from combos a, imagen_combos b
			where a.id=?
			and a.id=b.id_combo', [$id]);
		return response()->json([
				"nombreCombo"=> $data[0]->nombreCombo,
				"precioUnitario"=>$data[0]->precioCombo,
				"estado"=>$data[0]->estado,
				"descripcion"=>$data[0]->descripcion,
				"fInicio"=>$data[0]->fechaInicio,
				"fFin"=>$data[0]->fechaFin,
				"nombreImagen"=>$data[0]->nombreImagen,
				"descripcionImagen"=>$data[0]->descripcionImagen
			]);
	}
	function delete($id,$nombre){
		try{
			DB::beginTransaction();
	        $exists = Storage::disk('storeProd')->exists($nombre);
	        if ($exists) {
	            Storage::disk('storeProd')->delete($nombre);
	        }
			DB::delete('delete from imagen_combos where id_combo=?',[$id]);
			DB::delete('delete from combos where id=?',[$id]);
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
				DB::delete('delete from imagen_combos where id_combo=?',[$del]);
				DB::delete('delete from combos where id=?',[$del]);
			}
			DB::commit();
			foreach ($delsName as $ex) {
				$ex = str_replace(' ', '', $ex);
		    	Storage::disk('storeProd')->delete($ex);
			}
			return "exito";
		}catch(Exception $e){
			DB::rollBack();
			return "fallo";
		}
	}
}
