<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use Validator;
use Cookie;
use \Illuminate\Http\Response;

use App\Http\Requests;
use App\Distrito;
use App\Cliente;
use App\OrdenCompra;
use App\DetalleOrdenCompra;


class realizarCompraController extends Controller
{
    public function realizarCompra(Request $request){
    	$productosCarrito = $request->cookie('cookieCarrito');	
    	$distritos = Distrito::all(); //select * from distritos
    	return view('realizarCompra', compact('distritos', 'productosCarrito'));
    }

    public function registrarPedido(Request $request){

        //Recuperar la Lista de productos        
        $productosPedido = $request->session()->get('productosPedido');
        $cantidadProductosPedido = $request->session()->get('cantidadProductosPedido');
        
        $validator = $this->validateCompra($request);
        if ($validator->fails() || count($productosPedido)==0 || count($cantidadProductosPedido)==0){
            if($validator->fails()){
              return abort(503);  
          }else{
                $mensajeError = "Usted no ha cargado productos a su carrito de compras. ";
                return view('errors.errorRealizarCompra', compact('mensajeError'));
          }            
        }else{    
            $distrito = Distrito::select('id as id_distrito')
            ->where('nombreDistrito','=',$request->distritoCliente)->first();
            try{
                DB::beginTransaction();

                //Insertar en la Tabla clientes
                $cliente = new Cliente;
                $cliente->id_distrito = $distrito->id_distrito;
                $cliente->nombre = $request ->nombreCliente;
                $cliente->apellidos = $request->apellidoCliente;
                $cliente->telefono = $request->telefonoCliente;
                $cliente->dni = $request->dniCliente;
                $cliente->domicilio = $request->domicilioCliente;
                $cliente->save();
                
                //Insertar en la Tabla orden_compras
                $ordenCompra = new OrdenCompra;
                $ordenCompra->id_cliente = $cliente->id;
                $ordenCompra->fechaPedido = Carbon::now('America/Lima');
                $ordenCompra->estadoOrden = "pendiente";
                $ordenCompra->save();

                //Insertar de forma múltiple en la Tabla detalle_orden_compras
                for ($i=0; $i<count($productosPedido);$i++) {
                    $detalleOrdenCompra = new DetalleOrdenCompra;                
                    $detalleOrdenCompra->id_orden_compra = $ordenCompra->id;
                    $detalleOrdenCompra->id_producto = $productosPedido[$i];
                    $detalleOrdenCompra->cantidad = $cantidadProductosPedido[$i];
                    $detalleOrdenCompra->save();
                }
                
                $cookie = Cookie::forget('cookieCarrito');
                $request->session()->forget('productosPedido');
                $request->session()->forget('pedidoEnCurso');
                DB::commit();

                //Evento de Servidor; Alerta al administrador del negocio sobre un nuevo pedido
                event(new \App\Events\nuevoPedidoEvent());

                return redirect('compraRealizada')->withCookie($cookie);

            }catch(\Exception $e){
                DB::rollback();
                $mensajeError = "Ha ocurrido un error al procesar su compra. ";
                return view('errors.errorRealizarCompra', compact('mensajeError'));
            }         
            
        }
    }

    public function precargarProductos(Request $request){
        if($request -> ajax()){
            //Validación
            $validator = $this->validateCompra($request);
            if ($validator->fails()){
                $errors = $validator->errors();
                $errors =  json_decode($errors);
                return response()->json([
                'success' => false,
                'message' => $errors
                ], 422); 
            }
            else{
                $cookieCarrito = $request->cookie('cookieCarrito');
                $productosPedido = $cookieCarrito[0];
                $cantidadProductosPedido = $cookieCarrito[4];
                $request->session()->put('productosPedido', $productosPedido);
                $request->session()->put('cantidadProductosPedido', $cantidadProductosPedido);
                return response()->json([
                'success' => true,
                'message' => 'datos válidos'
                ], 200);
            }    
        }
    }
    public function validateCompra(Request $request){
        $rules = [
            'nombreCliente' => 'required|min:3|max:40|regex:/^[A-Za-záéíóúñ\s]+$/i',
            'apellidoCliente' =>'required|min:3|max:40|regex:/^[A-Za-záéíóúñ\s]+$/i',
            'dniCliente' =>'required|min:7|max:7|regex:/^[0123456789]+$/i',
            'domicilioCliente' =>'required|min:3|max:60|regex:/^[1-9A-Za-záéíóúñ\s.]+$/i',
        ];
        $messages = [
            'nombreCliente.required' => 'Su nombre es requerido',
            'nombreCliente.min' => 'El minimo de caracteres permitidos son 3',
            'nombreCliente.max' => 'El maximo de caracteres permitidos son 40',
            'nombreCliente.regex'=> 'Solo se aceptan letras',
            'apellidoCliente.required' => 'El apellido del cliente es requerido',
            'apellidoCliente.min' => 'El minimo de caracteres permitidos son 3',
            'apellidoCliente.max' => 'El maximo de caracteres permitidos son 40',
            'apellidoCliente.regex'=> 'Solo se aceptan letras',
            'dniCliente.required' => 'Su DNI es requerido',
            'dniCliente.min' => 'El minimo de caracteres permitidos son 7',
            'dniCliente.max' => 'El maximo de caracteres permitidos son 7',
            'dniCliente.regex'=> 'Solo se aceptan numeros',
            'domicilioClinete.required' => 'El domicilio del cliente es requerido',
            'domicilioCliente.min' => 'El minimo de caracteres permitidos son 3',
            'domicilioCliente.max' => 'El maximo de caracteres permitidos son 40',
            'domicilioCliente.regex'=> 'Solo se aceptan letras y números',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        return $validator;
    }

}

