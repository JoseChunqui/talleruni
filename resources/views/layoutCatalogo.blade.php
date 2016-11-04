<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sandwiches Don Kike</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{ csrf_token() }" />
  <link rel="shortcut icon" href="{{ asset('ms-icon-70x70.png') }}"> 
  {!! Html::style('css/bootstrap.min.css') !!}
  {!! Html::style('css/RecursosCSS.css')!!}
  {!! Html::script('js/jquery-3.1.0.min.js')!!}
  {!! Html::script('js/bootstrap.min.js')!!}
  {!! Html::script('js/main.js')!!}
  {!! Html::script('js/realizarPedido.js')!!}
</head>
<body>
@php 
  $carrito=Cookie::get('cookieCarrito',0);
@endphp

  <div class="modal fade" id="modalCarrito" role="dialog">
    <div class="modal-dialog" id="modalCarritoContenido">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bolsa de Compras</h4>
        </div>
        <div class="modal-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-sm-2"><p>Imagen</p></th>
                <th class="col-sm-4"><p>Productos</p></th>
                <th class="col-sm-2"><p>Precio</p></th>
                <th class="col-sm-1"><p>Cantidad</p></th>
                <th class="col-sm-2"><p>Sub-Total</p></th>
                <th class="col-sm-1"><p>Accion</p></th>
              </tr>
            </thead>
            <tbody id="productosAdd">
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger  pull-left" onClick="eliminarCarrito()">Vaciar el Carrito</button>
          <button type="button" class="btn btn-success" data-dismiss="modal" onClick="location.href='realizarCompra';">Confirmar Compra</button>          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <header>
    <div class="header-row-top">
      <div class="container">
        <div class="col-md-4 col-xs-2">
          <h4 id="logo-negocio"><a onclick="location.href='/';">Don Kike.com</a></h4>
        </div>
        <div class="col-md-8 col-xs-8">
          <ul class="menu">
            <li><a  onclick="location.href='/';">Sandwichs</a></li>
            <li><a  onclick="location.href='login';">Acerca de Nosotros</a></li>
            <li><a  onclick="location.href='login';">Iniciar Seción</a></li>
            <li>
              <button type="button" data-toggle="modal" class="btn btn-info" data-target="#modalCarrito">
              <span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compra <span class="badge" id="numProdComprados">
                {{is_array($carrito)? array_sum($carrito[4]): 0}}
              </span>
              </button> 
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="header-row-bot">
      <div class="header-row-bot-bg">
        <div class="container">
          <div class="jumbotron">
            <img class ="logo" src="/Imagenes/logo.png" alt="Logo empresa" style="float:left">
            <h1>La Sandwicheria de Don Kike</h1>
              <P align="right">INFORMES: sandwicheria.kike@gmail.com</P>
              <p align="right">TELEFONO: 555-5555</p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--Inicio Contenido-->
  <div class="content">
    <div class="container-fluid">
      @yield('contenido')
    </div>
  </div>
  <!--Fin Contenido-->

  <footer>
    <p align="center">@FIIS UNI</p>
  </footer>
</body>
</html>
