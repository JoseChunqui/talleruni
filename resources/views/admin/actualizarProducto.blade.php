@extends('admin/layoutAdmin')
@section ('titulo')
	Actualizar Productos
@stop	
@section('contenido')
{!! Html::style('css/actualizarProducto.css')!!}
{!! Html::script('js/actualizarProducto.js')!!}
<div class="container-fluid">
	<div class="row">

		<div class="col-xs-10 col-xs-offset-1">
			<div class="row">
				<div class="col-xs-6">
					<nav class="nav navbar-default">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">PRODUCTOS</a>
						</div>
					</nav>
				</div>
				<div class="col-xs-6">
					<ul class="nav nav-pills navbar-right">
					  <li role="presentation">
					  	<a href="/admin/actualizarProdu">LISTA</a>
					  </li>
				  		<li role="presentation">
				  		<a href="#" data-toggle="modal" data-target="#modalCrear">CREAR</a>
				  		</li>
					</ul>		
					
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-xs-10 col-md-offset-1">
			<div class="panel panel-danger">

				<div class="panel-body">
						<div id="alert0" class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>ERROR!</strong> No ha elegido ningun item para mostrar
						</div>
					<div class="hola col-xs-7">
						<div class="col-xs-12">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-3" for="nombreProducto">Nombre:</label>
								<div class="col-xs-9">
									<p id="nombreProd" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="precioProducto">Precio:</label>
								<div class="col-xs-9">
									<p id="precioProd" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="descripcionProducto">Descripcion:</label>
								<div class="col-xs-9">
									<p id="descripcionProd" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoProducto">Estado:</label>
								<div class="col-xs-9">
									<p id="estadoProd" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
						    <div class="thumbnail">
						      <img id="imagenProd" src="" class="img-responsive" alt="">
						      <div class="caption">
						        <h4 id="nombreImaProd"></h4>
						        <p id="desImagenProd"></p>
						      </div>
						    </div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-10">
									<div class="btn-toolbar">
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalModificar">
										  Modificar
										</button>
										<button id="butDeleteProd" onclick="" class="btn btn-danger">Eliminar</button>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
					<div class="hola col-xs-5">
						<div class="row">
							<div class="col-xs-12">
							<ul class="nav nav-pills navbar-right">
						  	<li role="presentation">
						  		<a data-toggle="modal" data-target="#modalAgregar">AGREGAR NUEVO</a>
						  	</li>
							</ul>
							</div>
						</div>

						<div class="row">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-12">
											INGREDIENTES DEL PRODUCTO
										</div>
									</div>
								</div>
				      			<div id="ingProd" class="list-group"></div>
							</div>
						</div>	
					</div>
					</div>		
				</div>
			</div>		
		</div>
	</div>
</div>
	@include('modals/modalAgregarIng')
	@include('modals/modalCrearProd')
	@include('modals/modalModificarProd')
	@include('modals/modalMostrarProd')
</div>
</body>
@stop