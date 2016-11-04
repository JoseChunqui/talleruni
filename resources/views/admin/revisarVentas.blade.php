@extends('admin/layoutAdmin')
@section ('titulo')
	Revisar Ventas
@stop	
@section('contenido')
	{!!	Html::script('js/revisarVentas.js')!!}
	<div class="container-fluid">
		<div class="panel panel-default">
			<!--Cabecera de la vista de Revisión de pedidos-->
			<div class="panel-heading">
				<h4>Procesar Pedidos Pendientes</h4>
			</div>
			<div class="panel-body">
				<!--Enlistado de pedidos-->
				<div class="col-md-6">
				    <div class="panel panel-default">
				    	<div class="panel-heading">Pedidos Pendientes</div>
				      	<table class="table table-bordered">
					      	<thead>
					      		<tr>
					      		  <th class="col-sm-1"><p align="center" >Código Pedido</p></th>
								  <th class="col-sm-3"><p align="center" >Fecha de Pedido</p></th>
								  <th class="col-sm-2"><p align="center" >Estado del Pedido</p></th>
								  <th class="col-sm-3"><p align="center" >Distrito</p></th>
								  <th class="col-sm-2"><p align="center" >Acción</p></th>
					      		</tr>
					      	</thead>
					      	<tbody>					      		
						      	@foreach ($ordenesCompra as $pedido)					
						      		<tr>
						      		  <td><p align="center">{{ $pedido->id }}</p></td>
									  <td><p align="center">{{ $pedido->fechaPedido }}</p></td>
									  <td><p align="center">{{ $pedido->estadoOrden }}</p></td>
									  <td><p align="center">{{ $pedido->nombreDistrito }}</p></td>
									  <td align="center">
									  	<button type="button" onclick="mostrarDetalle({{$pedido->id}})" class="btn btn-default btn-sm">Ver detalle</button>
									  </td>
									</tr>
						      	@endforeach
							</tbody>	
				      	</table>
				    </div>
				</div>						
				<div class="col-md-6">
					<!--Detalles de pedido-->
					<div class="panel panel-default">
				      <div class="panel-heading">Detalle del Pedido</div>
				      <div class="panel-body">
				      	<div class="col-md-9">
					      	<table class="table table-condensed">
					      		<thead>
					      			<tr>
					      				<th class="col-sm-5"><p>Datos del Cliente:</p> </th>
					      			</tr>
					      		</thead>
					      		<tbody>
					      			<tr hidden>
					      				<td><p>Código del Pedido:</p></td>
					      				<td><p id="codPedido"></p></td>
					      			</tr>
									<tr>
					      				<td><p>Fecha del Pedido:</p></td>
					      				<td><p id="fechaPedido"></p></td>
					      			</tr>
					      			<tr>
					      				<td><p>Nombre del Cliente:</p></td>
					      				<td><p id="nomCliente"></p></td>
					      			</tr>
					      			<tr>
					      				<td><p>Apellidos del Cliente:</p></td>
					      				<td><p id="apeCliente"></p></td>
					      			</tr>
					      			<tr>
					      				<td><p>DNI:</p></td>
					      				<td><p id="dniCliente"></p></td>
					      			</tr>
					      			<tr>
					      				<th><p>Localización:</p></th>	
					      			</tr>
					      			<tr>
					      				<td><p>Dsitrito:</p></td>
					      				<td><p id="nombreDistrito"></p></td>
					      			</tr>
					      			<tr>
					      				<td><p>Domicilio:</p></td>
					      				<td><p id="domicilioCliente"></p></td>
					      			</tr>							      			
					      		</tbody>
					      	</table>
					      	<div class="processOrder" hidden>
					      	<!--Detalle Productos-->
						      	<table class="table table-bordered table-condensed">
						      		<thead>
								      	<tr>
						      				<th class="col-sm-1"><p>Cod.</p></th>
						      				<th class="col-sm-7"><p>Producto</p></th>
						      				<th class="col-sm-3"><p>Precio</p></th>
						      				<th class="col-sm-1"><p>Cant.</p></th>
						      			</tr>
						      		</thead>
						      		<tbody id=productosComprados>
						      			<!--productos comprados-->
						      		</tbody>
						      	</table>
							</div>
						</div>
						<div class="col-md-3 processOrder"  hidden>
						<!--Botonera de procesar pedido-->
							<div class="panel panel-default">
								<div class="panel-heading" align="center">Total a Cobrar</div>
								<ul class="list-group">
									<li id="totalCobrar" class="list-group-item" align="center"></li>
								</ul>
							</div>
							<div >
						      	<button type="button" class="btn btn-default btn-lg btn-block btn-sm" onclick="procesarPedido()">Procesar Pedido</button>
								<button type="button" class="btn btn-default btn-lg btn-block btn-sm" onclick="rechazarPedido()">Rechazar Pedido</button>
						    </div>								
						</div>
				      </div>
				    </div>
				</div>
			</div>		
		</div>
	</div>
@stop