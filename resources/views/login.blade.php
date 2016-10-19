<!DOCTYPE html>
<html>
<head>
  <title>Login/SandwichPlus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <section id="login">
        <div class="page-header"><h1>Administrador</h1></div>
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="col-xs-4" for="idCuenta">Cuenta:</label>
                  <div class="col-xs-8">
                    <input type="idCuenta" class="form-control" id="idCuenta" placeholder="Cuenta Administrador">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-4" for="contrasegnaCuenta">Contraseña:</label>
                  <div class="col-xs-8">
                    <input type="contrasegnaCuenta" class="form-control" id="contrasegnaCuenta" placeholder="Contrasegna Cuenta">
                  </div>
                </div>
                <div class="col-xs-offset-3">
                  <button type="button" class="btn btn-default">Olvidaste</button>
                  <button type="button" class="btn btn-primary" onclick="location.href='/admin/revisarVentas';">Ingresar</button>
                </div>               
              </form>
              </div>
    </section>
  </div>
</div>
</body>
</html>