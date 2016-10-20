@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Don Kike
@stop 
@section('contenido')
  {!! Html::script('js/main.js')!!}
  <div class="container-fluid">
          <div class="col-md-3">
            <nav>
                <div class="list-group">
                  <a href="#" class="list-group-item">Promociones de Delivery</a>
                  <a href="#" class="list-group-item">Sandwiches</a>
                  <a href="#" class="list-group-item">Combos</a>
                </div>
            </nav>
          </div>
          <div class="col-md-9">
              <article>
                    @php $i = 0 @endphp
                    <div class="row">
                      @foreach($productos as $producto)
                        <div class="col-md-4">
                          <div>
                            <a class="thumbnail" data-toggle="modal" data-target="#modalDetalle" onClick="mostrarDetalle({{$producto->id}})">
                              <img src="Imagenes\sandwich{{$i+1}}.jpg" alt="Pulpit Rock" style="width:230px;height:150px" class="img-thumbnail">
                              <br>
                              <p align="center">{{$producto->nombreProducto}}</p>
                              <p align="center">{{$producto->precioUnitario}}</p>
                              <center><button class="btn btn-default">Detalles</button></center>
                            </a>
                          </div>
                        </div>
                        @php $i++ @endphp                                               
                      @endforeach  
                      </div>                    
              </article>
          </div>
  </div>
  {{--Modal--}}
  <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modalDetalle">Detalle de producto</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          <div class="col-xs-10 col-xs-offset-1">
                <div class="form-group" hidden>
                  <label class="col-xs-3" for="nomProducto">id Producto:</label>
                  <div class="col-xs-9">
                    <p class="form-control-static" id="idProd"></p>
                  </div>
                </div>              
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="col-xs-3" for="nomProducto">Producto:</label>
                  <div class="col-xs-9">
                    <label class="form-control-static" id="nomProd"></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-3" for="precioProd">Precio:</label>
                  <div class="col-xs-9">
                    <p class="form-control-static" id="precioProd"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-3" for="descripcionProd">Descripcion:</label>
                  <div class="col-xs-9">
                    <p class="form-control-static" id="descripcionProd">
                    </p>
                  </div>
                </div>
              </form>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-xs-10 col-xs-offset-1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onClick="carrito()" data-dismiss="modal">Añadir al Carrito</button>
          <button type="button" class="btn btn-primary" onClick="location.href='productoEspecifico';">Personalizar Sandwich</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop