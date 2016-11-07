<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Requests;
use App\Producto;
use App\DetalleOrdenCompra;
use App\OrdenCompra;
use Carbon\Carbon;
use DB;

class balanceVentasController extends Controller
{
    function periodoBalance(Request $request){
    	if($request -> ajax()){
    		$fechaInicial = $request->fechaInicial;
    		$fechaFinal = $request->fechaFinal;
    		$fechaInicial = Carbon::createFromFormat('d/m/Y H',$fechaInicial." 0");
    		$fechaFinal = Carbon::createFromFormat('d/m/Y H',$fechaFinal." 24");

    		$balanceGeneral = OrdenCompra::select(DB::raw(
    			'count(DISTINCT orden_compras.id) as cantidadVenta,
    			sum(detalle_orden_compras.cantidad) as cantidadProductosVendidos,
    			sum(productos.precioUnitario*detalle_orden_compras.cantidad) as totalIngresos'))
    		->join('detalle_orden_compras','orden_compras.id','=','detalle_orden_compras.id_orden_compra')
    		->join('productos','productos.id','=','detalle_orden_compras.id_producto')
    		->where([
    			['orden_compras.estadoOrden','=','procesado'],
    			['orden_compras.fechaPedido', '>=', $fechaInicial],
    			['orden_compras.fechaPedido', '<', $fechaFinal]
    			])
    		->get()
    		->first();

    		$numPedidosRealizados = OrdenCompra::select(DB::raw('count(orden_compras.id) as cantidadVentaTotal'))
    		->where([
    			['estadoOrden','<>','pendiente'],
    			['orden_compras.fechaPedido', '>=', $fechaInicial],
    			['orden_compras.fechaPedido', '<', $fechaFinal]
    			])
    		->get()
    		->first();


    		return response()->json([
    			'fechaInicial' => $fechaInicial,
    			'fechaFinal' => $fechaFinal,
    			'balanceGeneral' => $balanceGeneral,
    			'numPedidosRealizados' => $numPedidosRealizados
    		]);
    	}
    }

    function chartBalance(Request $request){
        $fechaInicial = Carbon::createFromFormat('d/m/Y H', $request->fechaInicial." 0");
        $fechaFinal = Carbon::createFromFormat('d/m/Y H', $request->fechaFinal." 24");
        $t1_i = Carbon::createFromFormat('d/m/Y H', $request->t1_i." 0");
        $t1_f = Carbon::createFromFormat('d/m/Y H', $request->t1_f." 24");
        $t2_i = Carbon::createFromFormat('d/m/Y H', $request->t2_i." 0");
        $t2_f = Carbon::createFromFormat('d/m/Y H', $request->t2_f." 24");
        $t3_i = Carbon::createFromFormat('d/m/Y H', $request->t3_i." 0");
        $t3_f = Carbon::createFromFormat('d/m/Y H', $request->t3_f." 24");
        $balance_t0 = $this->getBalanceMonetario($fechaInicial,$fechaFinal);
        $balance_t1 = $this->getBalanceMonetario($t1_i,$t1_f);
        $balance_t2 = $this->getBalanceMonetario($t2_i,$t2_f);
        $balance_t3 = $this->getBalanceMonetario($t3_i,$t3_f);
        return response()->json([
            'balance_t0' => $balance_t0,
            'balance_t1' => $balance_t1,
            'balance_t2' => $balance_t2,
            'balance_t3' => $balance_t3
        ]);

    }

    function getBalanceMonetario($fecha_i,$fecha_f){
        $balanceMonetario = OrdenCompra::select(DB::raw(
            'sum(productos.precioUnitario*detalle_orden_compras.cantidad) as totalIngresos'))
        ->join('detalle_orden_compras','orden_compras.id','=','detalle_orden_compras.id_orden_compra')
        ->join('productos','productos.id','=','detalle_orden_compras.id_producto')
        ->where([
            ['orden_compras.estadoOrden','=','procesado'],
            ['orden_compras.fechaPedido', '>=', $fecha_i],
            ['orden_compras.fechaPedido', '<', $fecha_f]
            ])
        ->get()
        ->first();
        return $balanceMonetario->totalIngresos;
    }
}
