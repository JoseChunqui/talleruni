@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Don Kike
@stop 
@section('contenido')

<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Su cesta de compras</h4></div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="col-sm-2">Imagen</th>
                    <th class="col-sm-4">Productos</th>
                    <th class="col-sm-1">Precio</th>
                    <th class="col-sm-1">Cantidad</th>
                    <th class="col-sm-2">Sub-Total</th>
                  </tr>
                </thead>
                <tbody id="productosCarritoPreview">
                </tbody> 
            </table>
        </div>    
    </div>
</div>           
<div class="col-md-6">
<article>
    <div class="panel panel-info">    
        <!--FORMULARIO DATOS DEL CLIENTE-->
        <div class="panel-heading"><h4>Complete su compra</h4></div>
        <div class="panel-body registro-compra">        
        <form class="form-horizontal" role="form" method="POST" id="formularioPreliminar">
            <h4>Datos del cliente</h4>
            <br>
            <div class="form-group">
                <label for="nombre" class="col-lg-3 control-label">Nombre: </label>
                <div class="col-lg-6" id="nombreClienteDiv">
                    <input type="email" name= "nombreCliente" class="form-control" id="nombreCliente">
                </div>               
            </div>
            <div class="form-group">
                <label for="apellido" class="col-lg-3 control-label">Apellido: </label>
                <div class="col-lg-6" id="apellidoClienteDiv">
                    <input type="text" name= "apellidoCliente" class="form-control" id="apellidoCliente">
                </div>
            </div>
            <div class="form-group">
                <label for="dni" class="col-lg-3 control-label">DNI: </label>
                <div class="col-lg-4" id="dniClienteDiv">
                    <input type="text" name= "dniCliente" class="form-control" id="dniCliente">
                </div>
            </div>    
            <div class="form-group">
                <label for="telefono" class="col-lg-3 control-label">Telefono: </label>
                <div class="col-lg-4" id="telefonoClienteDiv">
                    <input type="text" name="telefonoCliente" class="form-control" id="telefonoCliente">
                </div>
            </div>   
            <div class="form-group">
                <label for="distritoCliente" class="col-lg-3 control-label">Distrito: </label>
                <div class="col-lg-4">
                    <select class="form-control" name="distritoCliente" id="distritoCliente">
                        @foreach($distritos as $distrito)
                            <option>{{$distrito->nombreDistrito}}</option>                
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="domicilioCliente" class="col-lg-3 control-label">Direccion: </label>
                <div class="col-lg-6" id="domicilioClienteDiv">
                  <input type="text" class="form-control" name="domicilioCliente" id="domicilioCliente">
                </div>
            </div> 
            <hr>
            <h4>Forma de Pago</h4>
            <br>
            <div class="form-group">
                <label for="formaPago" class="col-lg-3 control-label">Forma de pago: </label>
                <div class="col-lg-6">
                  <select class="form-control" id="formaPago">
                    <option>Presencial</option>
                    <option >Tarjeta de Credito</option>
                  </select>
                </div>
              </div>
              <div>
                <div class="form-group" hidden>
                    <label for="tarjetaCredito" class="col-lg-3control-label">Tarjeta de Credito: </label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="tarjetaCredito">
                    </div>
                </div> 
                <div class="form-group" hidden>
                    <label for="numeroTarjeta" class="col-lg-3 control-label">Numero de tarjeta: </label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="numeroTarjeta">
                    </div>
                </div> 
                <div class="form-group" hidden>
                    <label for="claveTarjeta" class="col-lg-3 control-label">Clave de tarjeta: </label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="claveTarjeta">
                    </div>
                </div>  
              </div>
              <div class="form-group">
                <div class="col-lg-offset-3 col-lg-10">
                  <button id="openConfirmation" type="button" class="btn btn-primary">Comprar</button>
                  <button type="button" class="btn btn-danger" onClick="location.href='/';">Cancelar</button>
                </div>
              </div>
            </form>
        </div>
  
    </div >       
        
</article>
</div>

<!-- =>MODAL DE CONFIRMACIÓN DE PEDIDO <= -->
<div class="modal fade" role="dialog" id="confirmarPedidoModal">
  <div class="modal-dialog modal-lg" >        
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Confirme su pedido</h4>
        </div>
        <div class="modal-body">    
            {!! Form::open(['url'=>'realizarCompra','class'=>'form-horizontal', 'role'=>'form'])!!}
                <!-- INCIO DEL FORMULARIO DE CONFIRMACION DE PEDIDO-->
                <h4>Datos Ingresados</h4>
                <div class="form-group">
                    {!! Form::label('nombreCliente','Nombres: ',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-7"> 
                    {!! Form::text('nombreCliente',null,['class'=>'form-control', 'id'=>'nombreClienteConfirm','readonly'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('apellidoCliente','Apellidos: ',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-7"> 
                    {!! Form::text('apellidoCliente',null,['class'=>'form-control', 'id'=>'apellidoClienteConfirm', 'readonly'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('dniCliente','DNI: ',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-7"> 
                    {!! Form::text('dniCliente',null,['class'=>'form-control', 'id'=>'dniClienteConfirm','readonly'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('telefonoCliente','Teléfono: ',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-7"> 
                    {!! Form::text('telefonoCliente',null,['class'=>'form-control', 'id'=>'telefonoClienteConfirm','readonly'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('distritoCliente','Distrito: ',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-7"> 
                    {!! Form::text('distritoCliente',null,['class'=>'form-control', 'id'=>'distritoClienteConfirm','readonly'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('domicilioCliente','Domicilio: ',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-7"> 
                    {!! Form::text('domicilioCliente',null,['class'=>'form-control', 'id'=>'domicilioClienteConfirm','readonly'])!!}
                    </div>
                </div>
                <hr>
                <h4>Productos Comprados: </h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th class="col-sm-2"><p align="center">Imagen</p></th>
                        <th class="col-sm-4"><p align="center">Productos</p></th>
                        <th class="col-sm-1"><p align="center">Precio</p></th>
                        <th class="col-sm-1"><p align="center">Cantidad</p></th>
                        <th class="col-sm-2"><p align="center">Sub-Total</p></th>
                      </tr>
                    </thead>
                    <tbody id="productosCarritoConfirm">
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-9"> 
                            {!!Form::submit('Confirmar Compra',['class'=>'btn btn-primary', 'id'=>'realizarCompraButton'])!!}
                        </div>
                    </div>
                </div>                                                              
            {!! Form::close()!!}
        </div>
    </div>
  </div>
</div>




@stop