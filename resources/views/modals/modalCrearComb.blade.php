<!-- Modal Formulario Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Combo</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
	      	<div class="col-xs-10 col-xs-offset-1">
	      		{{Form::open(['url'=>'/insertComb' ,'files'=>true,'class'=>'form-horizontal','id'=>'formCreateComb','method' => 'post'])}}
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label class="col-xs-3" for="nombreCombo">Nombre:</label>
								<div class="col-xs-9">
									<input name="nombre" class="form-control" id="nombreCombo" placeholder="Nombre">
									<div id="nombreAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="precioCombo">Precio:</label>
								<div class="col-xs-9">
									<input name="precio" class="form-control" id="precioCombo" placeholder="Precio">
									<div id="precioAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="descripcionCombo">Descripcion:</label>
								<div class="col-xs-9">
									<textarea name="descripcion" class="form-control" placeholder="Descripcion" rows="5"></textarea>
									<div id="descripcionAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoCombo">Estado:</label>
								<div class="col-xs-9">
									<input name="estado" class="form-control" id="estadoCombo" placeholder="Estado">
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
								<label class="col-xs-3">Fecha Inicio: </label>
								<div class="col-xs-9">
									<input type="date" name="fInicio" value="año-mes-dia">
									<div id="fInicioAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3">Fecha Fin: </label>
								<div class="col-xs-9">
									<input type="date" name="fFin" value="año-mes-dia">
									<div id="fFinAlert"></div>
								</div>
							</div>														
							<div class="form-group">
								<label class="col-xs-3" for="estadoCombo">Descripcion Imagen:</label>
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
        <button id="butModalCrear" class="btn btn-success">Crear</button>
        </div>
      </div>
    </div>
  </div>
</div>