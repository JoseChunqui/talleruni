@extends('admin/layoutAdmin')
@section ('titulo')
	Historial de Ventas
@stop	
@section('contenido')
		{!!	Html::script('js/revisarVentas.js')!!}
		{{--Utilizando el mismo scrip que para revisarVentas--}}

		<div class="container-fluid">
			<div class="panel panel-success">
				<!--Cabecera de la vista Historial de Ventas-->
				<div class="panel-header">
					<nav class="navbar navbar-success">
					  <div class="container-fluid">
					    <div class="navbar-header">
					    	<p class="navbar-brand" href="#">Historial de Ventas</p>
					    </div>
					    <form class="navbar-form nav-stacked" role="search">
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
				<!--Contenido de la vista Historial de Ventas-->
				<div class="panel-body">
					<!--Lista de Pedidos procesados-->
					<div class="col-md-8">
						<div class="panel-success">
							<div class="panel-heading">Pedidos ya procesados</div>
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
								      		<tr>
								      		  <td><p>{{ $value->id }}</td>
											  <td><p>{{ $value->fechaPedido }}</p></td>
											  <td><p>{{ $value->estadoOrden }}</p></td>
											  <td><p>{{ $value->nombreDistrito }}</p></td>
											  <td><button type="button" id="boton_{{$value->id}}" onclick="mostrarDetalle({{$value->id}})"  class="btn btn-default btn-sm">Ver detalle</button></td>
											</tr>					      		
					      				@endforeach
							      	</tbody>
					      		</table>	
					      	</div>
						</div>
					</div>
					<div class="col-md-4">
						<!--Detalles del pedido procesado-->
						<div>
							<div class="panel-success">
								<div class="panel-heading">Detalle del Pedido procesado</div>
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
					      		</div>									
							</div>						
						</div>
						<!--Opciones para el pedido procesado-->
						<div>
							<div class="panel-success">
								<div class="panel-heading">Acciones Disponibles</div>
					      		<div class="panel-body">
							      	<button type="button" class="btn btn-default btn-lg btn-block" onclick="reprocesarPedido()">Marcar como Pendiente</button>
					      		</div>								
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>

@stop