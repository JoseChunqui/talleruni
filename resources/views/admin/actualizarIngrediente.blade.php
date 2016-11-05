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
<!-- Modal Formulario Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Ingrediente</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
	      	<div class="col-xs-10 col-xs-offset-1">
	      		{{Form::open(['url'=>'/insertIng','files'=>true,'class'=>'form-horizontal','id'=>'formCreateIng','method' => 'post'])}}
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label class="col-xs-3" for="nombreIngrediente">Nombre:</label>
								<div class="col-xs-9">
									<input name="nombre" class="form-control" id="nombreIngrediente" placeholder="Nombre">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="precioIngrediente">Precio:</label>
								<div class="col-xs-9">
									<input name="precio" class="form-control" id="precioIngrediente" placeholder="Precio">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="descripcionIngrediente">Descripcion:</label>
								<div class="col-xs-9">
									<textarea name="descripcion" class="form-control" placeholder="Descripcion" rows="5"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoIngrediente">Estado:</label>
								<div class="col-xs-9">
									<input name="estado" class="form-control" id="estadoIngrediente" placeholder="Estado">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3">Imagen: </label>
								<div class="col-xs-9">
									<input type="file" name="image">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoIngrediente">Descripcion Imagen:</label>
								<div class="col-xs-9">
									<textarea name="descripcionImagen" class="form-control" placeholder="Descripcion" rows="2"></textarea>
								</div>
							</div>
						{{Form::close()}}
	      	</div>
      	</div>
      </div>
      <div class="modal-footer">
        <div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formCreateIng" class="btn btn-primary">Crear</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Formulario Modificar-->
<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Ingrediente</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		{{Form::open(['url'=>'','files'=>true,'class'=>'form-horizontal','id'=>'formUpdIng','method' => 'post'])}}
					<form id="formUpdIng" class="form-horizontal" action="" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label class="col-xs-3" for="nombreIngrediente">Nombre:</label>
							<div class="col-xs-9">
								<input id="nombreIngr" name="nombreIngr" type="nombre" class="form-control" placeholder="Nombre"" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioIngrediente">Precio:</label>
							<div class="col-xs-9">
								<input id="precioIngr" name="precioIngr" type="precio" class="form-control" placeholder="Precio" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionIngrediente">Descripcion:</label>
							<div class="col-xs-9">
								<textarea id="descripcionIngr" name="descripcionIngr" class="form-control" placeholder="descripcionIngrediente" rows="5" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoIngrediente">Estado:</label>
							<div class="col-xs-9">
								<input type="estado" class="form-control" id="estadoIngr" name="estadoIngr" placeholder="Estado" value="">
							</div>
						</div>
							<div class="form-group">
								<label class="col-xs-3">Imagen: </label>
								<div class="col-xs-9">
									<input type="file" name="image">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoIngrediente">Descripcion Imagen:</label>
								<div class="col-xs-9">
									<textarea id="desImaIngr" name="descripcionImagen" class="form-control" placeholder="Descripcion" rows="2"></textarea>
								</div>
							</div>						
					{{Form::close()}}
      	</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="formUpdIng" class="btn btn-primary">Guardar Cambios</button>
      	</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Lista-->
<div class="modal fade" id="modalLista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lista Ingredientes</h4>
      </div>
      <div class="modal-body">
      <div class="row">
	      <div class="col-xs-10 col-xs-offset-1">

		      <div class="panel panel-primary">
		      	<div class="panel-body">
		      		<div class="col-xs-10 col-sm-offset-1">
		        		<div class="input-group">
							<input id="searchIng" type="text" class="form-control" placeholder="Buscar">
							<div class="input-group-btn">
								<button onclick="search()" class="btn btn-default">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</div>
					</div>
		      	</div>
		      	
		      	<div class="list-group">
		      		@foreach ($ingredientes as $ingrediente)
		      		<div id="modallista{{$ingrediente->id}}" class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-10" onclick="showdetail({{$ingrediente->id}})">
		      					<a href="#">
		      						{{$ingrediente->nombreIngrediente}}
		      					</a>
		      				</div>
		      				<div class="col-xs-2">
		      					<button onclick="setCookie('{{$ingrediente->nombreImagen}}','{{$ingrediente->id}}')" class="btn btn-primary">
									<span class="glyphicon glyphicon-remove"></span>
		      					</button>
		      				</div>
		      			</div>
		      		</div>
		      		@endforeach
		      </div>
	      </div>
			</div>
      </div>
      <div class="modal-footer">
	      <div class="col-xs-10 col-xs-offset-1">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button onclick="ReadCookie()" type="button" class="btn btn-primary">Guardar Cambios</button>
	      </div>
      </div>
    </div>
  </div>
</div>

</div>
@stop
