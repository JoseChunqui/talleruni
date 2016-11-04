@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Don Kike
@stop 
@section('contenido')
	<div class="container">
		<div class="panel panel-info">
			<div class="panel-body">
				<h2 align="center"><strong>Error!</strong></h2>
				<h3 align="center">{{$mensajeError}}<a href="/">Volver al Inicio</a></h3>
			</div>
		</div>
	</div>
@stop