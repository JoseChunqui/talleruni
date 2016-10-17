<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ingrediente/SandwichPlus</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mainActualizar.css">
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">SANDWICHpLUS</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">HISTORIAL</a></li>
	        <li><a href="#">PEDIDOS</a></li>
	        <li role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				    DATA
				    <ul class="dropdown-menu">
				    	<li><a href="#">INGREDIENTES</a></li>
					    <li><a href="actualizarProducto.html">PRODUCTOS</a></li>
					    <li><a href="actualizarCombo.html">COMBOS</a></li>
					    <li><a href="#">OFERTA</a></li>
				    </ul>
					</li>
	        <li>
	        	<div class="dropdown">
					<a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    	<span class="glyphicon glyphicon-user"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				    	<li><a href="#">HISTORIAL DE SESIONES</a></li>
				    	<li><a href="#">ULTIMAS ACCIONES</a></li>
				    	<li><a href="#">AGREGAR ADMINISTRADORES</a></li>
				    	<li role="separator" class="divider"></li>
				    	<li><a href="#">SALIR</a></li>
					</ul>
				</div>
	        </li>

	      </ul>
	    </div>
	  </div>
	</nav>

<div class="container-fluid">
	<div class="row">

		<div class="col-xs-10 col-xs-offset-1">
			<ul class="nav nav-pills navbar-right">
			  <li role="presentation">
			  	<a href="#" data-toggle="modal" data-target="#modalLista">LISTA</a>
			  </li>
		  	<li role="presentation">
		  		<a href="#" data-toggle="modal" data-target="#modalCrear">CREAR</a>
		  	</li>
			</ul>		
		</div>

	</div>
	@yield('content')
</div>
</body>
</html>
