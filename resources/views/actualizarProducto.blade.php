@extends('layouts.principal')
@section('content')
	<div class="row">
		<div class="col-xs-10 col-md-offset-1">
			<div class="panel panel-danger">
				<nav class="nav navbar-default">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">PRODUCTOS</a>
					</div>
				</nav>
				<div class="panel-body">
					<div class="col-xs-7">
						<div class="col-xs-12">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-xs-3" for="nombreProducto">Nombre:</label>
									<div class="col-xs-9">
										<p class="form-control-static">Producto1</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3" for="precioProducto">Precio:</label>
									<div class="col-xs-9">
										<p class="form-control-static">$15</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3" for="descripcionProducto">Descripcion:</label>
									<div class="col-xs-9">
										<p class="form-control-static">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3" for="estadoProducto">Estado:</label>
									<div class="col-xs-9">
										<p class="form-control-static">BuenoxD</p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-6 col-xs-offset-3">
											<img src="img/sandwich.jpg" alt="ProductoX" class="img-responsive">						
									</div>												
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3">
										<div class="btn-toolbar">
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalModificar">
											  Modificar
											</button>
											<button class="btn btn-danger">Eliminar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-xs-5">
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
							<div class="panel panel-danger">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-12">
											INGREDIENTES
										</div>
									</div>
								</div>
				      	<div class="list-group">
				      		<div class="list-group-item">
				      			<div class="row">
				      				<div class="col-xs-10">
				      					<a href="actualizarIngrediente.html">Ingrediente1</a>
				      				</div>
				      				<div class="col-xs-2">
				      					<button class="btn btn-danger">
											  	<span class="glyphicon glyphicon-remove"></span>
				      					</button>
				      				</div>
				      			</div>
				      		</div>
				      		<div class="list-group-item">
				      			<div class="row">
				      				<div class="col-xs-10">
				      					<a href="actualizarIngrediente.html">Ingrediente2</a>
				      				</div>
				      				<div class="col-xs-2">
				      					<button class="btn btn-danger">
											  	<span class="glyphicon glyphicon-remove"></span>
				      					</button>
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
</div>
<!-- Modal Formulario Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-xs-3" for="nombreProducto">Nombre:</label>
							<div class="col-xs-9">
								<input type="nombre" class="form-control" id="nombreProducto" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioProducto">Precio:</label>
							<div class="col-xs-9">
								<input type="precio" class="form-control" id="precioProducto" placeholder="Precio">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionProducto">Descripcion:</label>
							<div class="col-xs-9">
								<textarea class="form-control" placeholder="Descripcion" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoProducto">Estado:</label>
							<div class="col-xs-9">
								<input type="estado" class="form-control" id="estadoProducto" placeholder="Estado">
							</div>
						</div>
					</form>
      	</div>
      	</div>
      </div>
      <div class="modal-footer">
        <div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Crear</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Formulario Modificar-->
<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Producto</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-xs-3" for="nombreProducto">Nombre:</label>
							<div class="col-xs-9">
								<input type="nombre" class="form-control" id="nombreProducto" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioProducto">Precio:</label>
							<div class="col-xs-9">
								<input type="precio" class="form-control" id="precioProducto" placeholder="Precio">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionProducto">Descripcion:</label>
							<div class="col-xs-9">
								<textarea class="form-control" placeholder="Descripcion" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoProducto">Estado:</label>
							<div class="col-xs-9">
								<input type="estado" class="form-control" id="estadoProducto" placeholder="Estado">
							</div>
						</div>
					</form>
      	</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Guardar Cambios</button>
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
        <h4 class="modal-title" id="myModalLabel">Lista Productos</h4>
      </div>
      <div class="modal-body">
      <div class="row">
	      <div class="col-xs-10 col-xs-offset-1">

		      <div class="panel panel-danger">
		      	<div class="panel-body">
		      		<div class="col-xs-10 col-sm-offset-1">
		        		<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
				
						</div>
					</div>
		      		
		      	</div>
		      	<div class="list-group">
		      		<div class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-10">
		      					<a href="actualizarProducto.html">Producto1</a>
		      				</div>
		      				<div class="col-xs-2">
		      					<button class="btn btn-danger">
									  	<span class="glyphicon glyphicon-remove"></span>
		      					</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-10">
		      					<a href="actualizarProducto.html">Producto2</a>
		      				</div>
		      				<div class="col-xs-2">
		      					<button class="btn btn-danger">
									  	<span class="glyphicon glyphicon-remove"></span>
		      					</button>
		      				</div>
		      			</div>
		      		</div>
						</div>
		      </div>
	      </div>
			</div>
      </div>
      <div class="modal-footer">
	      <div class="col-xs-10 col-xs-offset-1">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn btn-danger">Guardar Cambios</button>
	      </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Agregar -->
<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lista Ingredientes</h4>
      </div>
      <div class="modal-body">
      <div class="row">
	      <div class="col-xs-10 col-xs-offset-1">

		      <div class="panel panel-danger">
		      	<div class="panel-body">
		      		  <div class="col-xs-10 col-sm-offset-1">
		        			<div class="input-group">
										<input type="text" class="form-control" placeholder="Buscar">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-default">
												<span class="glyphicon glyphicon-search"></span>
											</button>
										</div>
				
									</div>
								</div>
		      		
		      	</div>
		      	<div class="list-group">
		      		<div class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-9">
		      					<a href="#">Ingrediente1</a>
		      				</div>
		      				<div class="col-xs-3">
		      					<button class="btn btn-danger">
									  	AGREGAR
		      					</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-9">
		      					<a href="#">Ingrediente2</a>
		      				</div>
		      				<div class="col-xs-3">
		      					<button class="btn btn-danger">
									  	AGREGAR
		      					</button>
		      				</div>
		      			</div>
		      		</div>

						</div>
		      </div>
	      </div>
			</div>
      </div>
      <div class="modal-footer">
	      <div class="col-xs-10 col-xs-offset-1">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn btn-danger">Guardar Cambios</button>
	      </div>
      </div>
    </div>
  </div>
</div>
@stop