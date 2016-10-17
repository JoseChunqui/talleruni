<html lang=”es”>
	<head>
		<meta charset=”utf-8”>
		<title>@yield('titulo','Administración')</title>
		{!! Html::style('css/bootstrap.min.css') !!}
	</head>
	<body>
		<div class=container-fluid>
		{!!	Html::script('js/jquery-3.1.0.min.js')!!}
		{!!	Html::script('js/bootstrap.min.js')!!}	
		<hr>
		<hr>
		<hr>
		<hr>
			<div>	
				@yield('contenido')
			</div>	
		<hr>
		<hr>
		<hr>
		<hr>
		</div>
	
	</body>
</html>