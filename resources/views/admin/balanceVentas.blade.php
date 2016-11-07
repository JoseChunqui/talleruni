@extends('admin/layoutAdmin')
@section ('titulo')
	Historial de Ventas
@stop	
@section('contenido')
	{!!	Html::script('js/google-loader.js')!!}
	{!!	Html::script('js/balanceVentas.js')!!}
	
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4>Balance de Ventas</h4>
		</div>
		<div class="panel-body">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<p>Seleccione un periodo</p>
					</div>
					<div class="panel-body">
						<div class="nav nav-pills" id="select-periodo">
							<li><a id="dia-balance">Del Día</a></li>
							<li><a id="semana-balance">De la Semana</a></li>
							<li><a id="mes-balance">Del Mes</a></li>
							<li><a id="año-balance">Del Año</a></li>
							<li><a id="total-balance">Desde el principio</a></li>
						</div>
					</div>							
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<p>Ingrese Periodo</p>
					</div>
					<div class="panel-body">
						<form class="form-inline" id="form-perido-balance">
							<input type="hidden" name="periodo-select" id="periodo-select">
						    <div class="form-group">
			                 	<div class='input-group'>
			                    	<input type='text' id="fechaInicial" name="fechaInicial" class="form-control datepicker" placeholder="Fecha Inicial"/>
			                    <label class="input-group-addon" for="fechaInicial">
			                       	<span class="glyphicon glyphicon-calendar"></span>
			                    </label>
			                </div>
						   </div>
						   <div class="form-group">
			                <div class='input-group date'>
			                    <input type='text' id="fechaFinal" name="fechaFinal" class="form-control datepicker" placeholder="Fecha Inicial"/>
			                    <label class="input-group-addon" for="fechaFinal" >
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </label>
			                </div>
						  </div>
						  <button type="button" id="submit-periodo" class="btn btn-default">Buscar</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-12" id="balanceVentas" hidden>
				<div class="panel panel-success">
					<div class="panel-heading">
						Resultados
					</div>
					<div class="panel-body">
						<div class="col-md-5">
							<div class="panel panel-success">
								<div class="panel-body">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td class="col-md-8"><strong><p>Número de pedidos realizados</p></strong></td>
											<td><p id="num-pedidos-realizados"></p></td>
										</tr>
										<tr>
											<td class="col-md-8"><strong><p>Número de pedidos Aceptados</p></strong></td>
											<td><p id="num-pedidos-aceptados"></p></td>
										</tr>
										<tr>
											<td class="col-md-8"><strong><p>Número de pedidos Rechazados</p></strong></td>
											<td><p id="num-pedidos-rechazados"></p></td>		
										</tr>
										<tr>
											<td class="col-md-8"><strong><p>Ingresos por pedidos aceptados</p></strong></td>
											<td><p id="ingresos-pedidos-aceptados"></p></td>		
										</tr>
										<tr>
											<td class="col-md-8"><strong><p>Número total de productos vendidos</p></strong></td>
											<td><p id="num-productos-vendidos"></p></td>		
										</tr>										
									</tbody>
								</table>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div id="chart_div"></div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop