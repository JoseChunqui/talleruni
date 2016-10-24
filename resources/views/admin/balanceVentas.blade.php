@extends('admin/layoutAdmin')
@section ('titulo')
	Historial de Ventas
@stop	
@section('contenido')
{!!	Html::script('js/revisarVentas.js')!!}
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4>Balance de Ventas</h4>
		</div>
		<div class="panel-body">
			<div class="col-md-5">
				<div>
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="btn-group">
							 <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Dalance del día <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a href="#">Balance del mes</a></li>
							    <li><a href="#">Balance de los últimos 3 meses</a></li>
							    <li><a href="#">Balance de los últimos 6 meses</a></li>
							  </ul>
							</div>
						</div>
							<table class="table table-bordered table-condensed">
								<tbody>
									<tr>
										<td class="col-md-5" align="center"><p>Número de pedidos realizados</p></td>
										<td><p class="col-md-3">13</p></td>
									</tr>
									<tr>
										<td class="col-md-5" align="center"><p>Número de pedidos Aceptados</p></td>
										<td><p class="col-md-3">12</p></td>
									</tr>
									<tr>
										<td class="col-md-5" align="center"><p>Número de pedidos Rechazados</p></td>
										<td><p class="col-md-3">1</p></td>
									</tr>
									<tr>
										<td class="col-md-5" align="center"><p>Ingresos por pedidos aceptados</p></td>
										<td><p class="col-md-3">S/.217.50</p></td>
									</tr>
									<tr>
										<td class="col-md-5" align="center"><p>Número de productos vendidos</p></td>
										<td>
											<p class="col-md-3">43</p>
											<button type="button" class="btn btn-default btn-sm col-md-9">Ver lista de productos Vendidos</button>
										</td>
									</tr>											
								</tbody>
							</table>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="panel panel-info">
					<div class="panel-heading">
						<p>Balance por periodo</p>
					</div>
					<div class="panel-body">
						<p>Ingrese Periodo</p>
						<form class="form-inline">
						  <div class="form-group">
			                <div class='input-group date' id='fechaInicial'>
			                    <input type='text' class="form-control" placeholder="Fecha Inicial" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>

			                </div>
						  </div>
						  <div class="form-group">
			                <div class='input-group date' id='fechaFinal'>
			                    <input type='text' class="form-control" placeholder="Fecha Inicial" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
						  </div>
						  	<script type="text/javascript">

						   </script>
						  <button type="submit" class="btn btn-default">Buscar</button>

						</form>
 						

					</div>
				</div>
			</div>
		</div>
	</div>	



</div>


@stop