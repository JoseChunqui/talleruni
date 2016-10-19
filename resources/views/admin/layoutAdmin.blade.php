<html lang=”es”>
	<head>
		<meta charset=”utf-8”>
		<title>@yield('titulo','Administración')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{!! Html::style('css/bootstrap.min.css') !!}
		{!! Html::style('css/mainActualizar.css')!!}
		{!!	Html::script('js/jquery-3.1.0.min.js')!!}
		{!!	Html::script('js/bootstrap.min.js')!!}
		{!! Html::script('js/mainActualizar.js')!!}	

	</head>
	<body>
		<div class=container-fluid>

		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">SANDWICH PLUS</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar1">
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a href="/admin/revisarVentas">PEDIDOS</a></li>
		        <li><a href="/admin/revisarHistorial">HISTORIAL</a></li>
		        <li><a href="#">BALANCE</a></li>	  	        
		        <li role="presentation" class="dropdown">
			    	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			    	DATA</a>
			    	<ul class="dropdown-menu">
			    	  <li><a href="/admin/actualizarIngrediente">INGREDIENTES</a></li>
				  	  <li><a href="/admin/actualizarProducto">PRODUCTOS</a></li>
				  	  <li><a href="/admin/actualizarCombo">COMBOS</a></li>
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
			    		<li><a href="/">SALIR</a></li>
						</ul>
					</div>
	    		</li>
		      </ul>
		    </div>
		  </div>
		</nav>

		<!--Inicio Contenido-->
		<div>	
			@yield('contenido')
		</div>
		<!--Fin Contenido-->

		<hr>
		<hr>
		<hr>
		<hr>
		</div>
	
	</body>
</html>