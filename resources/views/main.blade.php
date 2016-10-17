<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
                  <td><img src="Imagenes\Sandwich1.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
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
                  <td><img src="Imagenes\Sandwich2.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
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
                  <td><img src="Imagenes\Sandwich3.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
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
            <button type="button" class="btn btn-success" data-dismiss="modal">Entrar</button>  
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
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
  <div class="row">
          <div class="col-sm-3"><nav>
                <div class="list-group">
                  <a href="#" class="list-group-item">Promociones de Delivery</a>
                  <a href="#" class="list-group-item">Sandwiches</a>
                  <a href="#" class="list-group-item">Combos</a>
                </div>
          </nav></div>
          <div class="col-sm-9">
              <article>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-3">
                        <a href="pulpitrock.jpg" class="thumbnail">
                          <img src="Imagenes\sandwich1.jpg" alt="Pulpit Rock" style="width:230px;height:150px">
                          <br>
                          <p align="center">Jamon y queso</p>
                          <p align="center">Precio: 10.90</p>
                          <center><button type="button" class="btn btn-info">Detalles</button></center>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <a href="moustiers-sainte-marie.jpg" class="thumbnail">
                          <img src="Imagenes\sandwich2.jpg" alt="Moustiers Sainte Marie" style="width:230px;height:150px">
                          <br>
                          <p align="center">Sandwich de ensalada rusa</p>
                          <p align="center">Precio: 10.90</p>
                          <center><button type="button" class="btn btn-info">Detalles</button></center>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <a href="cinqueterre.jpg" class="thumbnail">
                          <img src="Imagenes\Sandwich3.jpg" alt="Cinque Terre" style="width:230px;height:150px">
                          <br>
                          <p align="center">Sandwich de vegetales</p>
                          <p align="center">Precio: 10.90</p>
                          <center><button type="button" class="btn btn-info">Detalles</button></center>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-3">
                        <a href="pulpitrock.jpg" class="thumbnail">
                          <img src="Imagenes\sandwich4.png" alt="Pulpit Rock" style="width:230px;height:150px">
                          <br>
                          <p align="center">Sandwich de vegetales grillados</p>
                          <p align="center">Precio: 10.90</p>
                          <center><button type="button" class="btn btn-info">Detalles</button></center>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <a href="moustiers-sainte-marie.jpg" class="thumbnail">
                          <img src="Imagenes\sandwich5.png" alt="Moustiers Sainte Marie" style="width:230px;height:150px">
                          <br>
                          <p align="center">Sandwich de atún, morrones y aceitunas</p>
                          <p align="center">Precio: 10.90</p>
                          <center><button type="button" class="btn btn-info">Detalles</button></center>
                        </a>
                      </div>
                      <div class="col-md-3">
                        <a href="cinqueterre.jpg" class="thumbnail">
                          <img src="Imagenes\sandwich6.jpg" alt="Cinque Terre" style="width:230px;height:150px">
                          <br>
                          <p align="center">Sandwich de tomate y queso</p>
                          <p align="center">Precio: 10.90</p>
                          <center><button type="button" class="btn btn-info">Detalles</button></center>
                        </a>
                      </div>
                    </div>
                  </div>
              </article>
          </div>
  </div>


</body>
</html>
