<!-- Modal Formulario Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
	      	<div class="col-xs-10 col-xs-offset-1">
	      		{{Form::open(['url'=>'/insertProd' ,'files'=>true,'class'=>'form-horizontal','id'=>'formCreateProd','method' => 'post'])}}
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label class="col-xs-3" for="nombreProducto">Nombre:</label>
								<div class="col-xs-9">
									<input name="nombre" class="form-control" id="nombreProducto" placeholder="Nombre">
									<div id="nombreAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="precioProducto">Precio:</label>
								<div class="col-xs-9">
									<input name="precio" class="form-control" id="precioProducto" placeholder="Precio">
									<div id="precioAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="descripcionProducto">Descripcion:</label>
								<div class="col-xs-9">
									<textarea name="descripcion" class="form-control" placeholder="Descripcion" rows="5"></textarea>
									<div id="descripcionAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoProducto">Estado:</label>
								<div class="col-xs-9">
									<input name="estado" class="form-control" id="estadoProducto" placeholder="Estado">
									<div id="estadoAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3">Imagen: </label>
								<div class="col-xs-9">
									<input type="file" name="image">
									<div id="imageAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoProducto">Descripcion Imagen:</label>
								<div class="col-xs-9">
									<textarea name="descripcionImagen" class="form-control" placeholder="Descripcion" rows="2"></textarea>
									<div id="descripcionImagenAlert"></div>
								</div>
							</div>
						{{Form::close()}}
	      	</div>
      	</div>
      </div>
      <div class="modal-footer">
        <div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="butModalCrear" class="btn btn-danger">Crear</button>
        </div>
      </div>
    </div>
  </div>
</div>