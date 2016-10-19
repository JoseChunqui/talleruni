@extends('admin/layoutAdmin')
@section ('titulo')
	Revisar Ventas
@stop	
@section('contenido')
		{!!	Html::script('js/revisarVentas.js')!!}	

		<div class="container-fluid">
			<div class="panel panel-primary">

				<!--Cabecera de la vista de Revisión de pedidos-->
				<div class="panel-header">
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <div class="navbar-header">
					    	<p class="navbar-brand" href="#">Pedidos Pendientes</p>
					    </div>
					    <form class="navbar-form nav-stacked" role="search">
							<button class="btn btn-default">Nuevo</button>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Buscar">
							</div>
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</form>
					  </div>
					</nav>
				</div>
				<div class="panel-body">
					<!--Enlistado de pedidos-->
					<div class="col-md-8">
					    <div class="panel panel-default">
					      <div class="panel-heading">Pedidos Pendientes</div>
					      <div class="panel-body">
					      	<table class="table table-bordered">
					      	<thead>
					      		<tr>
					      		  <th><p align="center">Codigo Pedido</p></th>
								  <th><p align="center">Fecha de Pedido</p></th>
								  <th><p align="center">Estado del Pedido</p></th>
								  <th><p align="center">Distrito</p></th>
								  <th><p align="center">Acción</p></th>
					      		</tr>
					      	</thead>
					      	<tbody>
					      	@foreach ($ordenesCompra as $value)
					      		
					      		@if($value->estadoOrden=="pendiente")
						      		<tr>
						      		  <td><p>{{ $value->id }}</td>
									  <td><p>{{ $value->fechaPedido }}</p></td>
									  <td><p>{{ $value->estadoOrden }}</p></td>
									  <td><p>{{ $value->nombreDistrito }}</p></td>
									  <td><button type="button" id="boton_{{$value->id}}" onclick="mostrarDetalle({{$value->id}})"  class="btn btn-default btn-sm">Ver detalle</button></td>
									</tr>					      		
					      		@endif
					      	@endforeach
					      	<!--
					      	<?php foreach ($ordenesCompra as $value) { ?>
					      		<tr>
					      		  <td><p><?php echo $value->id;?></p></td>
								  <td><p><?php echo $value->fechaPedido;?></p></td>
								  <td><p><?php echo $value->estadoOrden;?></p></td>
					      		</tr>
					      	<?php } ?>
							-->
							</tbody>	
					      	</table>
					      </div>
					    </div>

					</div>						
					<div class="col-md-4">
						<!--Detalles de pedido-->
						<div>
							<div class="panel panel-default">
						      <div class="panel-heading">Detalle del Pedido</div>
						      <div class="panel-body">
						      	<table class="table table-condensed">
						      		<thead>
						      			<tr>
						      				<th><p>Código Pedido:</p> </th>
						      				<th><p id="codPedido"></p></th>	
						      			</tr>
						      		</thead>
						      		<tbody>
						      			<tr>
						      				<td><p>Nombre del Cliente:</p></td>
						      				<td><p id="nomCliente"></p></td>
						      			</tr>
						      			<tr>
						      				<td><p>Apellidos del Cliente:</p></td>
						      				<td><p id="apeCliente"></p></td>
						      			</tr>
						      			<tr>
						      				<td><p>Cantidad:</p></td>
						      				<td><p id="cantidad"></p></td>
						      			</tr>						      			
						      		</tbody>
						      	</table>
						      <!--Botonera de procesar pedido-->
								<div>
									<div class="panel panel-default">
								      <div class="panel-heading">Panel Header</div>
								      <div class="panel-body">
								      	<button type="button" class="btn btn-default btn-lg btn-block" onclick="procesarPedido()">Procesar Pedido</button>
										<button type="button" class="btn btn-default btn-lg btn-block" onclick="rechazarPedido()">Rechazar Pedido</button>
								      </div>
								    </div>				
								</div>
						      </div>
						    </div>
						</div>
					</div>
				</div>		
			</div>
		</div>
@stop