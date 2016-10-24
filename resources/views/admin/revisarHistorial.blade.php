@extends('admin/layoutAdmin')
@section ('titulo')
	Historial de Ventas
@stop	
@section('contenido')
{!!	Html::script('js/revisarVentas.js')!!}

<div class="container-fluid">
	<div class="panel panel-success">
		<!--Cabecera de la vista Historial de Ventas-->
		<div class="panel-header">
			<nav class="navbar navbar-success">
			  <div class="container-fluid">
			    <div class="navbar-header">
			    	<p class="navbar-brand">Historial de Ventas</p>
			    </div>
			  </div>
			</nav>
		</div>
		<!--Contenido de la vista Historial de Ventas-->
		<div class="panel-body">


			<!--Lista de Pedidos procesados-->
				<div class="col-md-6">
				    <div class="panel panel-success">
				    	<div class="panel-heading">Pedidos Pendientes</div>
				      	<table class="table table-bordered">
					      	<thead>
					      		<tr>
					      		  <th class="col-sm-1"><p align="center" >Código Pedido</p></th>
								  <th class="col-sm-3"><p align="center" >Fecha de Pedido</p></th>
								  <th class="col-sm-2"><p align="center" >Estado del Pedido</p></th>
								  <th class="col-sm-2"><p align="center" >Fecha de procesamiento</p></th>
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
									  <td><p align="center">{{ $pedido->updated_at }}</p></td>
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
					<div class="panel panel-success">
				      <div class="panel-heading">Detalle del Pedido</div>
				      <div class="panel-body">
				      	<div class="col-md-9">
					      	<table class="table table-condensed">
					      		<thead>
					      			<tr>
					      				<th class="col-sm-5"><p>Datos del Cliente:</p> </th>
					      			</tr>
					      		</thead>

					      		<!--Datos del Cliente-->
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
						      				<th class="col-sm-1"><p>Código</p></th>
						      				<th><p>Producto</p></th>
						      				<th><p>Precio</p></th>
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
							<div class="panel panel-success">
								<div class="panel-heading" align="center">Total Cobrado</div>
								<ul class="list-group">
									<li id="totalCobrar" class="list-group-item" align="center"></li>
								</ul>
							</div>
							<div >
						      	<button type="button" class="btn btn-default" onclick="reprocesarPedido()">Marcar pedido como Pendiente</button>
						    </div>								
						</div>

				      </div>
				    </div>
				</div>
		</div>
	</div>
</div>

@stop