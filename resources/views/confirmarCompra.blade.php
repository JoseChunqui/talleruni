@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Don Kike
@stop 
@section('contenido')
            <article>
                <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Datos del cliente</h2>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="usr">Nombres: </label>
                                            <output type="text" class="form-control" id="usr"></output>
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Apellidos: </label>
                                            <output type="text" class="form-control" id="usr"></output>
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">DNI: </label>
                                            <output type="text" class="form-control" id="usr"></output>
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Direccion: </label>
                                            <output type="text" class="form-control" id="usr"></output>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="usr">Forma de Pago: </label>
                                            <output type="text" class="form-control" id="usr"></output>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Detalle de la Orden</h2>
                            <div class="modal-body">
                                <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Productos</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub-Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><img src="Imagenes\Sandwich1.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                                    <td>10.90</td>
                                    <td>
                                        <output type="text" class="form-control" id="usr">2</output>    
                                    </td>
                                    <td>
                                        <output type="text" class="form-control" id="usr">21.80</output> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><img src="Imagenes\Sandwich2.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                                    <td>10.90</td>
                                    <td>
                                        <output type="text" class="form-control" id="usr">2</output>    
                                    </td>
                                    <td>
                                        <output type="text" class="form-control" id="usr">21.80</output> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><img src="Imagenes\Sandwich3.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                                    <td>10.90</td>
                                    <td>
                                        <output type="text" class="form-control" id="usr">2</output>    
                                    </td>
                                    <td>
                                        <output type="text" class="form-control" id="usr">21.80</output> 
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="form-group">
                                <label for="usr">Monto total:</label>
                                <output type="text" class="form-control" id="usr"></output>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Confirmar</button>  
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Rechazar</button>
                    </div>
            </article>
@stop
