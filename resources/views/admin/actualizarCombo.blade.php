@extends('admin/layoutAdmin')
@section ('titulo')
	Actualizar Combos
@stop	
@section('contenido')
{!! Html::style('css/actualizarCombo.css')!!}
{!! Html::script('js/actualizarCombo.js')!!}
<div class="container-fluid">
	<div class="row">

		<div class="col-xs-10 col-xs-offset-1">
			<div class="row">
			<div class="col-xs-6">
				<nav class="nav navbar-default">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">COMBOS</a>
					</div>
				</nav>
				
			</div>
			<div class="col-xs-6">
				<ul class="nav nav-pills navbar-right">
					<li role="presentation">
				  	<a href="/admin/actualizarComb">LISTA</a>
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
			<div class="panel panel-success">
				<div class="panel-body">
						<div id="alert0" class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>ERROR!</strong> No ha elegido ningun item para mostrar
						</div>
					<div class="hola col-xs-7">
						<div class="col-xs-12">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-3" for="nombreCombo">Nombre:</label>
								<div class="col-xs-9">
									<p id="nombreComb" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="precioCombo">Precio:</label>
								<div class="col-xs-9">
									<p id="precioComb" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="descripcionCombo">Descripcion:</label>
								<div class="col-xs-9">
									<p id="descripcionComb" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoCombo">Estado:</label>
								<div class="col-xs-9">
									<p id="estadoComb" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoCombo">Fecha Inicio:</label>
								<div class="col-xs-9">
									<p id="fInicio" class="form-control-static"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoCombo">Fecha Fin:</label>
								<div class="col-xs-9">
									<p id="fFin" class="form-control-static"></p>
								</div>
							</div>														
							<div class="form-group">
						    <div class="thumbnail">
						      <img id="imagenComb" src="" class="img-responsive" alt="">
						      <div class="caption">
						        <h4 id="nombreImaComb"></h4>
						        <p id="desImagenComb"></p>
						      </div>
						    </div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-10">
									<div class="btn-toolbar">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalModificar">
										  Modificar
										</button>
										<button id="butDeleteComb" onclick="" class="btn btn-success">Eliminar</button>
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
							  		<a href="#" data-toggle="modal" data-target="#modalAgregar">AGREGAR NUEVO</a>
							  	</li>
							</ul>
							</div>
						</div>

						<div class="row">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-12">
											PRODUCTOS DEL COMBO
										</div>
									</div>
								</div>
						      	<div class="list-group">
						      		<div class="list-group-item">
						      			<div class="row">
						      			<div class="col-xs-10 col-xs-offset-1 alert alert-success">No existe Productos Asociados</div>
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
</div>
	@include('modals/modalAgregarProd')
	@include('modals/modalCrearComb')
	@include('modals/modalModificarComb')
	@include('modals/modalMostrarComb')
</div>
@stop