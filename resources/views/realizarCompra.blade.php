@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Don Kike
@stop 
@section('contenido')
<div class="container-fluid">
        <div class="col-sm-3"><nav>
              <div class="list-group">
                <a href="#" class="list-group-item">Promociones de Delivery</a>
                <a href="#" class="list-group-item">Sandwiches</a>
                <a href="#" class="list-group-item">Combos</a>
              </div>
        </nav></div>
        <div class="col-sm-9">
            <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Datos del cliente</h2>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="usr">Nombres: </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Apellidos: </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">DNI: </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="usr">Distrito: </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Direccion: </label>
                                            <input type="text" class="form-control" id="usr">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Forma de Pago</h2>
                            <form>
                            <div class="form-group">
                              <label for="sel1">Seleccionar forma de pago: </label>
                              <select class="form-control" id="sel1">
                                <option>Presencial</option>
                                <option >Tarjeta de Credito</option>
                              </select>
                              <br>
                              <br>
                              <div >
                                    <div class="form-group">
                                            <label for="usr">Tarjeta de Credito: </label>
                                            <input type="text" class="form-control" id="usr">
                                    </div>   
                                    <div class="form-group">
                                            <label for="usr">Numero de tarjeta: </label>
                                            <input type="text" class="form-control" id="usr">
                                    </div>  
                                    <div class="form-group">
                                            <label for="usr">Clave de Tarjeta: </label>
                                            <input type="text" class="form-control" id="usr">
                                    </div>  
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>   
                    <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal" onClick="location.href='confirmarCompra';">Enviar</button>  
                          <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="location.href='/';">Cancelar</button>
                    </div>
            </article>
        </div>
</div>
@stop
