<!-- Modal Formulario Modificar-->
<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Combo</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	<div class="col-xs-10 col-xs-offset-1">
      		{{Form::open(['files'=>true,'class'=>'form-horizontal','id'=>'formUpdComb','method' => 'post'])}}
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label class="col-xs-3" for="nombreCombo">Nombre:</label>
							<div class="col-xs-9">
								<input id="nCombo" name="nombreCombo" class="form-control" placeholder="Nombre"" value="">
								<div id="nombreAlert"></div>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="precioCombo">Precio:</label>
							<div class="col-xs-9">
								<input id="pCombo" name="precioCombo" class="form-control" placeholder="Precio" value="">
								<div id="precioAlertMod"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="descripcionCombo">Descripcion:</label>
							<div class="col-xs-9">
								<textarea id="dCombo" name="descripcionCombo" class="form-control" placeholder="descripcionCombo" rows="5" ></textarea>
								<div id="descripcionAlertMod"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-3" for="estadoCombo">Estado:</label>
							<div class="col-xs-9">
								<input class="form-control" id="eCombo" name="estadoCombo" placeholder="Estado" value="">
								<div id="estadoAlert"></div>
							</div>
						</div>
							<div class="form-group">
								<label class="col-xs-3">Fecha Inicio: </label>
								<div class="col-xs-9">
									<input id="fInicioCombo" type="date" name="fInicio">
									<div id="fInicioAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3">Fecha Fin: </label>
								<div class="col-xs-9">
									<input id="fFinCombo" type="date" name="fFin" value="">
									<div id="fFinAlert"></div>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-3">Imagen: </label>
								<div class="col-xs-9">
									<input type="file" name="image" value="">
									<div id="imageAlert"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-3" for="estadoCombo">Descripcion Imagen:</label>
								<div class="col-xs-9">
									<textarea id="dICombo" name="descripcionImagen" class="form-control" placeholder="Descripcion" rows="2"></textarea>
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
        <button id="butformUpdComb" class="btn btn-success">Guardar Cambios</button>
      	</div>
      </div>
    </div>
  </div>
</div>