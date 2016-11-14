<!-- Modal Formulario Modificar-->
<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Producto</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		{{Form::open(['files'=>true,'class'=>'form-horizontal','id'=>'formUpdProd','method' => 'post'])}}
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label class="col-xs-3" for="nombreProducto">Nombre:</label>
							<div class="col-xs-9">
								<input id="nombreProdu" name="nombreProdu" type="nombre" class="form-control" placeholder="Nombre"" value="">
								<div id="nombreAlert"></div>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioProducto">Precio:</label>
							<div class="col-xs-9">
								<input id="precioProdu" name="precioProdu" type="precio" class="form-control" placeholder="Precio" value="">
								<div id="precioAlertMod"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionProducto">Descripcion:</label>
							<div class="col-xs-9">
								<textarea id="descripcionProdu" name="descripcionProdu" class="form-control" placeholder="descripcionProducto" rows="5" ></textarea>
								<div id="descripcionAlertMod"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoProducto">Estado:</label>
							<div class="col-xs-9">
								<input type="estado" class="form-control" id="estadoProdu" name="estadoProdu" placeholder="Estado" value="">
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
									<textarea id="desImaProdu" name="descripcionImagen" class="form-control" placeholder="Descripcion" rows="2"></textarea>
									<div id="descripcionImagenAlertMod"></div>
								</div>
							</div>						
					{{Form::close()}}
      	</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<div class="col-xs-10 col-xs-offset-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="butformUpdProd" class="btn btn-danger">Guardar Cambios</button>
      	</div>
      </div>
    </div>
  </div>
</div>