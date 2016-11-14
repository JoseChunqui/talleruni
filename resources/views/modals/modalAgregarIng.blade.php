<!-- Modal Agregar Ingredientes-->
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
		      	<div id="listaingProd" class="list-group">
				</div>
		      </div>
	      </div>
			</div>
      </div>
      <div class="modal-footer">
	      <div class="col-xs-10 col-xs-offset-1">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	      </div>
      </div>
    </div>
  </div>
</div>