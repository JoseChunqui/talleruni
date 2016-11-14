@extends('admin/layoutAdmin')
@section ('titulo')
	Actualizar Ingredientes
@stop	
@section('contenido')
{!! Html::style('css/actualizarIngrediente.css')!!}
{!! Html::script('js/actualizarIngrediente.js')!!}
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="row">
				<div class="col-xs-6">
					<nav class="nav navbar-default">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">INGREDIENTES</a>
						</div>
					</nav>
				</div>
				<div class="col-xs-6">
					<ul class="nav nav-pills navbar-right">
					  <li role="presentation">
					  	<a href="/admin/actualizarIngr">LISTA</a>
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
		<div class="col-xs-10 col-xs-offset-1">
			<div class="panel panel-primary">
				<div class="panel-body">
						<div id="alert0" class="alert alert-info alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>ERROR!</strong> No ha elegido ningun item para mostrar
						</div>
					<div class="hola col-xs-4 col-xs-offset-1">
						    <div class="thumbnail">
						      <img id="imagenIng" src="" class="img-responsive" alt="">
						      <div class="caption">
						        <h4 id="nombreImaIng"></h4>
						        <p id="desImagenIng"></p>
						      </div>
						    </div>	
					</div>
					<div class="hola col-xs-6 col-xs-offset-1">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-3" for="nombreIngrediente">Nombre:</label>
								<div class="col-xs-9">
									<p id="nombreIng" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="precioIngrediente">Precio:</label>
								<div class="col-xs-9">
									<p id="precioIng" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="descripcionIngrediente">Descripcion:</label>
								<div class="col-xs-9">
									<p id="descripcionIng" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoIngrediente">Estado:</label>
								<div class="col-xs-9">
									<p id="estadoIng" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-10">
									<div class="btn-toolbar">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModificar">
										  Modificar
										</button>
										<button id="butDeleteIng" onclick="" class="btn btn-primary">Eliminar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
	@include('modals/modalCrearIng')
	@include('modals/modalModificarIng')
	@include('modals/modalMostrarIng')
</div>
@stop
