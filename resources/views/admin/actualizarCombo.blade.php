@extends('admin/layoutAdmin')
@section ('titulo')
	Actualizar Combos
@stop	
@section('contenido')
<div class="container-fluid">
	<div class="row">

		<div class="col-xs-10 col-xs-offset-1">
			<ul class="nav nav-pills navbar-right">
			  <li role="presentation">
			  	<a href="#" data-toggle="modal" data-target="#modalLista">LISTA</a>
			  </li>
		  	<li role="presentation">
		  		<a href="#" data-toggle="modal" data-target="#modalCrear">CREAR</a>
		  	</li>
			</ul>		
		</div>
	</div>
	<div class="row">
		<div class="col-xs-10 col-md-offset-1">
			<div class="panel panel-success">
				<nav class="nav navbar-default">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">COMBOS</a>
					</div>
				</nav>
				<div class="panel-body">
					<div class="col-xs-7">
						<div class="col-xs-12">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-xs-3" for="nombreCombo">Nombre:</label>
									<div class="col-xs-9">
										<p class="form-control-static">Combo1</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3" for="precioCombo">Precio:</label>
									<div class="col-xs-9">
										<p class="form-control-static">$15</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3" for="descripcionCombo">Descripcion:</label>
									<div class="col-xs-9">
										<p class="form-control-static">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-3" for="estadoCombo">Estado:</label>
									<div class="col-xs-9">
										<p class="form-control-static">BuenoxD</p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-6 col-xs-offset-3">
											<img src="img/sandwich.jpg" alt="ComboX" class="img-responsive">						
									</div>												
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3">
										<div class="btn-toolbar">
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalModificar">
											  Modificar
											</button>
											<button class="btn btn-success">Eliminar</button>
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
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-12">
											PRODUCTOS
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
				      					<button class="btn btn-success">
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
				      					<button class="btn btn-success">
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
        <h4 class="modal-title" id="myModalLabel">Nuevo Combo</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-xs-3" for="nombreCombo">Nombre:</label>
							<div class="col-xs-9">
								<input type="nombre" class="form-control" id="nombreCombo" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioCombo">Precio:</label>
							<div class="col-xs-9">
								<input type="precio" class="form-control" id="precioCombo" placeholder="Precio">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionCombo">Descripcion:</label>
							<div class="col-xs-9">
								<textarea class="form-control" placeholder="Descripcion" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoCombo">Estado:</label>
							<div class="col-xs-9">
								<input type="estado" class="form-control" id="estadoCombo" placeholder="Estado">
							</div>
						</div>
					</form>
      	</div>
      	</div>
      </div>
      <div class="modal-footer">
        <div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success">Crear</button>
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
        <h4 class="modal-title" id="myModalLabel">Modificar Combo</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-xs-3" for="nombreCombo">Nombre:</label>
							<div class="col-xs-9">
								<input type="nombre" class="form-control" id="nombreCombo" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioCombo">Precio:</label>
							<div class="col-xs-9">
								<input type="precio" class="form-control" id="precioCombo" placeholder="Precio">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionCombo">Descripcion:</label>
							<div class="col-xs-9">
								<textarea class="form-control" placeholder="Descripcion" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoCombo">Estado:</label>
							<div class="col-xs-9">
								<input type="estado" class="form-control" id="estadoCombo" placeholder="Estado">
							</div>
						</div>
					</form>
      	</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success">Guardar Cambios</button>
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
        <h4 class="modal-title" id="myModalLabel">Lista Combo</h4>
      </div>
      <div class="modal-body">
      <div class="row">
	      <div class="col-xs-10 col-xs-offset-1">

		      <div class="panel panel-success">
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
		      					<a href="actualizarCombo.html">Combo1</a>
		      				</div>
		      				<div class="col-xs-2">
		      					<button class="btn btn-success">
									  	<span class="glyphicon glyphicon-remove"></span>
		      					</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-10">
		      					<a href="actualizarCombo.html">Combo2</a>
		      				</div>
		      				<div class="col-xs-2">
		      					<button class="btn btn-success">
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
	        <button type="button" class="btn btn-success">Guardar Cambios</button>
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
        <h4 class="modal-title" id="myModalLabel">Lista Productos</h4>
      </div>
      <div class="modal-body">
      <div class="row">
	      <div class="col-xs-10 col-xs-offset-1">

		      <div class="panel panel-success">
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
		      					<a href="#">Producto1</a>
		      				</div>
		      				<div class="col-xs-3">
		      					<button class="btn btn-success">
									  	AGREGAR
		      					</button>
		      				</div>
		      			</div>
		      		</div>
		      		<div class="list-group-item">
		      			<div class="row">
		      				<div class="col-xs-9">
		      					<a href="#">Producto2</a>
		      				</div>
		      				<div class="col-xs-3">
		      					<button class="btn btn-success">
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
	        <button type="button" class="btn btn-success">Guardar Cambios</button>
	      </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop