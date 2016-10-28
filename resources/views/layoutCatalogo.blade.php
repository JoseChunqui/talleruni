<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sandwiches Don Kike</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{ csrf_token() }" />  
  {!! Html::style('css/bootstrap.min.css') !!}
  {!! Html::style('css/RecursosCSS.css')!!}
  {!! Html::script('js/jquery-3.1.0.min.js')!!}
  {!! Html::script('js/bootstrap.min.js')!!} 
</head>
<body>
@php 
  $carrito=Cookie::get('cookieCarrito',array([],[]));
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
                <th class="col-sm-2"><p align="center">Imagen</p></th>
                <th class="col-sm-4"><p align="center">Productos</p></th>
                <th class="col-sm-1"><p align="center">Precio</p></th>
                <th class="col-sm-1"><p align="center">Cantidad</p></th>
                <th class="col-sm-2"><p align="center">Sub-Total</p></th>
                <th class="col-sm-2"><p align="center">Accion</th>
              </tr>
            </thead>
            <tbody id="productosAdd">
            @php $i=0; @endphp
            @if($productosCarrito != null)
            @foreach($productosCarrito[0] as $prods)
            <tr class='productosComprados' id="productoComprado_{{$prods}}">
              <td>
                <img src="Imagenes/productos/sandwichs/{{$productosCarrito[1][$i]}}" alt="Imagen del producto"  class="img-thumbnail">
              </td>
              <td>{{$productosCarrito[2][$i]}}</td>
              <td id="precioProd_{{$prods}}">{{$productosCarrito[3][$i]}}</td>
              <td><select onClick='totalizarCarrito({{$prods}})' class='form-control' id="numOption_{{$prods}}">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                </select>
              </td>
              <td id="subTotal_{{$prods}}">{{$productosCarrito[3][$i]}}</td>
              <td align= "center"><button onClick='eliminarProductoCarrito({{$prods}})' class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
            </tr>            
            @php $i=$i+1; @endphp
            @endforeach
            @endif
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
                {{count($carrito[0])}}
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
            <img class ="logo" src="Imagenes\logo.png" alt="Logo empresa" style="float:left">
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
      <div class="col-md-3">
        <nav>
            <div class="list-group">
              <p class="list-group-item list-group-item-info">Sandwichis</p>
              <p class="list-group-item">Sándwichs Criollos</p>
              <p class="list-group-item">Sándwichs Vegetarianos</p>
              <p class="list-group-item">Sándwichs Calientes</p>
            </div>
        </nav>
      </div>

      <!--Contenido de la página-->
      <div class="col-md-9">
        @yield('contenido')
      </div>
    </div>

  </div>
  <!--Fin Contenido-->

  <footer>
    <p align="center">@FIIS UNI</p>
  </footer>
</body>
</html>
