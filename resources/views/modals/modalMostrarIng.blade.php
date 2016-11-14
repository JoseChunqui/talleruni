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
		      	@if($ingredientes == null)
					<div class="row">
					<div class="col-xs-10 col-xs-offset-1 alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>ERROR!</strong> No existe ingredientes para mostrar
					</div>
					</div>
		      	@else
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
		      	@endif
		      </div>
	      </div>
			</div>
      </div>
      <div class="modal-footer">
	      <div class="col-xs-10 col-xs-offset-1">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <button onclick="deleteAll()" type="button" class="btn btn-primary">Guardar Cambios</button>
	      </div>
      </div>
    </div>
  </div>
</div>