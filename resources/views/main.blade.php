@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Kike
@stop 
@section('contenido')
  {!! Html::script('js/main.js')!!}
  <div class="row">
          <div class="col-sm-3">
            <nav>
                <div class="list-group">
                  <a href="#" class="list-group-item">Promociones de Delivery</a>
                  <a href="#" class="list-group-item">Sandwiches</a>
                  <a href="#" class="list-group-item">Combos</a>
                </div>
            </nav>
          </div>
          <div class="col-sm-9">
              <article>
                  <div class="container">
                    @php $i = 0 @endphp
                      @foreach($productos as $producto)                                        
                        @if($i==0 || $i==3)
                          <div class="row">
                        @endif
                        <div class="col-md-3">
                          <a class="thumbnail" data-toggle="modal" data-target="#modalModificar" onClick="mostrarDetalle({{$producto->id}})">
                          <img src="Imagenes\sandwich{{$i+1}}.jpg" alt="Pulpit Rock" style="width:230px;height:150px">
                          <br>
                          <p align="center">{{$producto->nombreProducto}}</p>
                          <p align="center">{{$producto->precioUnitario}}</p>
                          <p align="center">{{$producto->descripcion}}</p>
                          <center><button type="button" class="btn btn-info" onClick="mostrarDetalle({{$producto->id}})" >Detalles</button></center>
                          </a>
                        </div>
                        @if($i==2 || $i==5)
                          </div>                          
                        @endif
                        @php $i=$i+1 @endphp 
                        @if($i==6)
                          @php $i = 0 @endphp
                        @endif                                              
                      @endforeach                    
                  </div>  
              </article>
          </div>
  </div>
  {{--Modal--}}
  <div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle de producto</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
          
            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-xs-3" for="nomProducto">Producto:</label>
                <div class="col-xs-9">
                  <p class="form-control-static" id="nomProd"></p>
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
        <button type="button" class="btn btn-primary">Añadir al Carrito</button>
        </div>
      </div>
    </div>
  </div>
</div>
@stop