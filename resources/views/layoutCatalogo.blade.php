<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sandwich Don Kike</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="css/RecursosCSS.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <!-- Trigger the modal with a button -->
    <div class="col-md-2">
      <button type="button" class="btn btn-default" onclick="location.href='login';">Iniciar Seción</button>
    </div>
    <div class="col-md-10">  
      <button type="button" data-toggle="modal" class="btn btn-info" data-target="#myModal1">
        <span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compra <span class="badge">3</span>
      </button>
    </div>      
  </div>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
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
                <th>Productos</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Sub-Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img src="Imagenes\sandwich1.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>10.90</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
                <td>10.90</td>
              </tr>
              <tr>
                <td><img src="Imagenes\sandwich2.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>10.90</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
                <td>10.90</td>
              </tr>
              <tr>
                <td><img src="Imagenes\sandwich3.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>10.90</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
                <td>10.90</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Confirmar Compra</button>  
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <header>
          <div class="container">
            <div class="jumbotron">
              <img class ="logo" src="Imagenes\logo.png" alt="Logo empresa" style="float:left">
              <h1>La Sandwicheria de Don Kike</h1>
                <P align="right">INFORMES: sandwicheria.kike@gmail.com</P>
                <p align="right">TELEFONO: 555-5555</p>
            </div>
          </div>
  </header>

  <!--Inicio Contenido-->
  <div> 
    @yield('contenido')
  </div>
  <!--Fin Contenido-->

</body>
</html>
