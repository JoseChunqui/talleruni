$(document).ready(function() {
	google.charts.load('current', {'packages':['bar']});
	$.datepicker.regional['pe'] = {
		 closeText: 'Cerrar',
		 prevText: '<Ant',
		 nextText: 'Sig>',
		 currentText: 'Hoy',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		 weekHeader: 'Sm',
		 dateFormat: 'dd/mm/yy',
		 firstDay: 1,
		 isRTL: false,
		 showMonthAfterYear: false,
		 yearSuffix: ''
		 };
 	$.datepicker.setDefaults($.datepicker.regional['pe']);
	$(".datepicker").datepicker({firstDay: 1});
	$("#select-periodo").click(function(event){
		setFechas(event);
		enviarPeriodo();
	});
	$("#submit-periodo").click(function(){
		enviarPeriodo();
		obtenerBalancesPasados("Periodo Personalizado");		
	});	
});

/*-----------------*/
function setFechas(event){
	var fechaInicial = new Date();
	var fechaFinal = new Date();
	switch(event.target.id){
		case "dia-balance":
			$("#fechaInicial").val($.datepicker.formatDate('dd/mm/yy', fechaInicial));
			$("#fechaFinal").val($.datepicker.formatDate('dd/mm/yy', fechaFinal));
			$("#select-periodo").val("Día");
			obtenerBalancesPasados("Dia");
			break;
		case "semana-balance":
			var primerDiaSemana = getPrimerDiaSemana(fechaInicial);
			$("#fechaInicial").val($.datepicker.formatDate('dd/mm/yy', primerDiaSemana));
			$("#fechaFinal").val($.datepicker.formatDate('dd/mm/yy', fechaFinal));
			$("#select-periodo").val("Semana");
			obtenerBalancesPasados("Semana");
			break;
		case "mes-balance":
			fechaInicial.setDate(1);  
			$("#fechaInicial").val($.datepicker.formatDate('dd/mm/yy', fechaInicial));
			$("#fechaFinal").val($.datepicker.formatDate('dd/mm/yy', fechaFinal));
			$("#select-periodo").val("Mes");
			obtenerBalancesPasados("Mes");
			break;
		case "año-balance":
			fechaInicial = getPrimerDiaYear(fechaInicial);
			$("#fechaInicial").val($.datepicker.formatDate('dd/mm/yy', fechaInicial));
			$("#fechaFinal").val($.datepicker.formatDate('dd/mm/yy', fechaFinal));
			$("#select-periodo").val("Año");
			obtenerBalancesPasados("Año");
			break;
		default:
			fechaInicial.setDate(1);
			fechaInicial.setMonth(0);
			fechaInicial.setYear(2010); 
			$("#fechaInicial").val($.datepicker.formatDate('dd/mm/yy', fechaInicial));
			$("#fechaFinal").val($.datepicker.formatDate('dd/mm/yy', fechaFinal));
			$("#select-periodo").val("Años");
			obtenerBalancesPasados("Año");
	}
}
/**Funcion evento**/
function enviarPeriodo(){	
	//
	var form = $('#form-perido-balance');
	$.ajax({
		type: 'get',
		url: 'periodoBalance',
		data: form.serialize(),
		dataType: "json",
		success: function(response,status,xhr){
			console.log(response.fechaInicial);
			console.log(response.fechaFinal);
			console.log(response.balanceGeneral);
			$("#num-pedidos-realizados").text(response.numPedidosRealizados.cantidadVentaTotal);
			$("#num-pedidos-aceptados").text(response.balanceGeneral.cantidadVenta);
			$("#num-pedidos-rechazados").text(response.numPedidosRealizados.cantidadVentaTotal-response.balanceGeneral.cantidadVenta);   			
			if(response.balanceGeneral.totalIngresos!==null){
				$("#ingresos-pedidos-aceptados").text("S/."+response.balanceGeneral.totalIngresos);				
			}else{
				$("#ingresos-pedidos-aceptados").text("S/.0.00");
			}
			if(response.balanceGeneral.cantidadProductosVendidos!==null){
				$("#num-productos-vendidos").text(response.balanceGeneral.cantidadProductosVendidos);
			}else{
				$("#num-productos-vendidos").text("0");
			}
			$('.listProductos').remove();
			$.each(response.productosCantidad, function(key,value){
				$('#productosVendidosCantidad').append(
					"<tr class='listProductos'>"+
					"<td><p>"+value.id_producto+"</p></td>"+
					"<td><p>"+value.nombreProducto+"</p></td>"+
					"<td><p>"+value.cantidadVendida+"</p></td>"+
					"</tr>"
				);
			});
			
		},
		error: function(){
			alert("Ha ocurrido un error");
		}
	});	
}

function obtenerBalancesPasados(periodo = null){
	var fechaInicial = $("#fechaInicial").val();
	var fechaFinal = $("#fechaFinal").val();
	var fechaActual_i_temp = $.datepicker.parseDate('dd/mm/yy',fechaInicial);
	var fechaActual_f_temp = $.datepicker.parseDate('dd/mm/yy',fechaFinal);
	var fechaActual_i_aux = new Date(fechaActual_i_temp);
	var fechaActual_f_aux = new Date(fechaActual_f_temp);
	var fechaActual_i = new Date(fechaActual_i_temp);
	var fechaActual_f = new Date(fechaActual_f_temp);
	switch (periodo){
		case "Dia":
			var t1_i = fechaActual_i.variaDia(-1).fechaToString();
			var t1_f = fechaActual_f.variaDia(-1).fechaToString();
			var t2_i = fechaActual_i.variaDia(-1).fechaToString();
			var t2_f = fechaActual_f.variaDia(-1).fechaToString();
			var t3_i = fechaActual_i.variaDia(-1).fechaToString();
			var t3_f = fechaActual_f.variaDia(-1).fechaToString();
			var titles =  [fechaInicial,t1_i,t2_i,t3_i];
			break;
		case "Semana":
			var t1_i = getPrimerDiaSemana(fechaActual_i.variaSemana(-1)).fechaToString();
			var t1_f = getUltimoDiaSemana(fechaActual_i_aux.variaSemana(-1)).fechaToString();
			var t2_i = getPrimerDiaSemana(fechaActual_i.variaSemana(-1)).fechaToString();
			var t2_f = getUltimoDiaSemana(fechaActual_i_aux.variaSemana(-1)).fechaToString();
			var t3_i = getPrimerDiaSemana(fechaActual_i.variaSemana(-1)).fechaToString();
			var t3_f = getUltimoDiaSemana(fechaActual_i_aux.variaSemana(-1)).fechaToString();
			var titles =  [("Del ").concat(fechaInicial.substr(0,5)).concat(" al ").concat(fechaFinal.substr(0,5)),
				("Del ").concat(t1_i.substr(0,5)).concat(" al ").concat(t1_f.substr(0,5)),
				("Del ").concat(t2_i.substr(0,5)).concat(" al ").concat(t2_f.substr(0,5)),
				("Del ").concat(t3_i.substr(0,5)).concat(" al ").concat(t3_f.substr(0,5))];
			break;
		case "Mes":
			var title_1 = nombreMes(fechaActual_i.getMonth());
			var t1_i = getPrimerDiaMes(fechaActual_i.variaMes(-1)).fechaToString();
			var t1_f = getUltimoDiaMes(fechaActual_f.variaMes(-1)).fechaToString();
			var title_2 = nombreMes(fechaActual_i.getMonth());
			var t2_i = getPrimerDiaMes(fechaActual_i.variaMes(-1)).fechaToString();
			var t2_f = getUltimoDiaMes(fechaActual_f.variaMes(-1)).fechaToString();
			var title_3 = nombreMes(fechaActual_i.getMonth());
			var t3_i = getPrimerDiaMes(fechaActual_i.variaMes(-1)).fechaToString();
			var t3_f = getUltimoDiaMes(fechaActual_f.variaMes(-1)).fechaToString();
			var title_4 = nombreMes(fechaActual_i.getMonth());
			var titles = [title_1,title_2,title_3,title_4];
			break;
		case "Año":
			var title_1 = fechaActual_f_aux.getFullYear();
			var t1_i = getPrimerDiaYear(fechaActual_f_aux.variaYear(-1)).fechaToString();
			var t1_f = getUltimoDiaYear(fechaActual_f.variaYear(-1)).fechaToString();
			var title_2 = fechaActual_f_aux.getFullYear();
			var t2_i = getPrimerDiaYear(fechaActual_f_aux.variaYear(-1)).fechaToString();
			var t2_f = getUltimoDiaYear(fechaActual_f.variaYear(-1)).fechaToString();
			var title_3 = fechaActual_f_aux.getFullYear();
			var t3_i = getPrimerDiaYear(fechaActual_f_aux.variaYear(-1)).fechaToString();
			var t3_f = getUltimoDiaYear(fechaActual_f.variaYear(-1)).fechaToString();
			var title_4 = fechaActual_f_aux.getFullYear();
			var titles = [title_1,title_2,title_3,title_4];
			break;
		default:
			var days_f = fechaActual_f.getDate();
			var months_f = fechaActual_f.getMonth();
			var years_f = fechaActual_f.getFullYear();
			var days_i = fechaActual_i.getDate();
			var months_i = fechaActual_i.getMonth();
			var years_i = fechaActual_i.getFullYear();
			var days_diff = days_f-days_i;
			var months_diff = months_f-months_i;
			var years_diff = years_f-years_i;

			var t1_i = fechaActual_i.variaDia(-days_diff).variaMes(-months_diff).variaYear(-years_diff).fechaToString();
			var t1_f = fechaActual_f.variaDia(-days_diff).variaMes(-months_diff).variaYear(-years_diff).fechaToString();
			var t2_i = fechaActual_i.variaDia(-days_diff).variaMes(-months_diff).variaYear(-years_diff).fechaToString();
			var t2_f = fechaActual_f.variaDia(-days_diff).variaMes(-months_diff).variaYear(-years_diff).fechaToString();
			var t3_i = fechaActual_i.variaDia(-days_diff).variaMes(-months_diff).variaYear(-years_diff).fechaToString();
			var t3_f = fechaActual_f.variaDia(-days_diff).variaMes(-months_diff).variaYear(-years_diff).fechaToString();
			var titles =  [("Del ").concat(fechaInicial.substr(0,5)).concat(" al ").concat(fechaFinal.substr(0,5)),
				("Del ").concat(t1_i.substr(0,5)).concat(" al ").concat(t1_f.substr(0,5)),
				("Del ").concat(t2_i.substr(0,5)).concat(" al ").concat(t2_f.substr(0,5)),
				("Del ").concat(t3_i.substr(0,5)).concat(" al ").concat(t3_f.substr(0,5))];
	}
	$.ajax({
		type: 'get',
		url: 'chartBalance',
		data: {fechaInicial: fechaInicial,
			fechaFinal:fechaFinal,
			t1_i:t1_i,
			t1_f:t1_f,
			t2_i:t2_i,
			t2_f:t2_f,
			t3_i:t3_i,
			t3_f:t3_f
			},
		dataType: "json",
		success: function(response,status,xhr){
			$("#balanceVentas").show();
			$("#reporteProductos").show();
			google.charts.setOnLoadCallback(drawChart(periodo,titles[0],titles[1],titles[2],titles[3],response.balance_t0,response.balance_t1,response.balance_t2,response.balance_t3));
		},
		error: function(){
			alert("ha ocurrido un error");
		}
	});
}


/*===============================================*/
/*                Gráfico de Barras              */
/*===============================================*/
function drawChart(periodo, t1,t2,t3,t4,r1,r2,r3,r4) {
	var data = google.visualization.arrayToDataTable([
      [periodo, 'Ventas'],
      [t4, r4],
      [t3, r3],
      [t2, r2],
      [t1, r1]
    ]);
    var options = {
      chart: {
        title: 'Balance Monetario',
        subtitle: 'Ingresos por pedidos realizados',
      },
      bars: 'vertical',
      hAxis: {format: ''},
      height: 500,
      colors: ['#1b9e77', '#d95f02', '#7570b3']
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
}
/*================================================*/

/**Aditional code for Date|| Código adicional para obtener el número de Semana**/
Date.prototype.getWeek = function (dowOffset) {
/*getWeek() was developed by Nick Baicoianu at MeanFreePath: http://www.meanfreepath.com */

    dowOffset = typeof(dowOffset) == 'int' ? dowOffset : 0; //default dowOffset to zero
    var newYear = new Date(this.getFullYear(),0,1);
    var day = newYear.getDay() - dowOffset; //the day of week the year begins on
    day = (day >= 0 ? day : day + 7);
    var daynum = Math.floor((this.getTime() - newYear.getTime() - 
    (this.getTimezoneOffset()-newYear.getTimezoneOffset())*60000)/86400000) + 1;
    var weeknum;
    //if the year starts before the middle of a week
    if(day < 4) {
        weeknum = Math.floor((daynum+day-1)/7) + 1;
        if(weeknum > 52) {
            nYear = new Date(this.getFullYear() + 1,0,1);
            nday = nYear.getDay() - dowOffset;
            nday = nday >= 0 ? nday : nday + 7;
            /*if the next year starts before the middle of
              the week, it is week #1 of that year*/
            weeknum = nday < 4 ? 1 : 53;
        }
    }
    else {
        weeknum = Math.floor((daynum+day-1)/7);
    }
    return weeknum;
};

/**FUNCIONES PROPIAS**/
Date.prototype.fechaToString = function() {
  var mm = this.getMonth() + 1; // getMonth() is zero-based
  var dd = this.getDate();
  if(mm<10){
  	mm1= 0;
  }else{
  	mm1="";
  }
  if(dd<10){
  	dd1=0;
  }else{
  	dd1="";
  }
  return [dd1,dd,"/",mm1, mm,"/", this.getFullYear()].join(''); // padding
};

function getPrimerDiaSemana(fechaActual){
	var week = fechaActual.getWeek();
	var year = fechaActual.getFullYear();
	var primerDiaYear = new Date(year,0,1);			
	var correccion = 6 - primerDiaYear.getDay();
	var primerDiaSemana = new Date(year, 0, (week - 1) * 7 + 3 + correccion);
	return primerDiaSemana;
}

function getUltimoDiaSemana(fechaActual){
	var week = fechaActual.getWeek();
	var year = fechaActual.getFullYear();
	var primerDiaYear = new Date(year,0,1);			
	var correccion = 6 - primerDiaYear.getDay();
	var ultimoDiaSemana = new Date(year, 0, (week - 1) * 7 + 3 + correccion+6);
	return ultimoDiaSemana;
}

function getPrimerDiaMes(fechaActual){
	var month = fechaActual.getMonth();
	var year = fechaActual.getFullYear();
	var primerDiaMes = new Date(year,month,1);
	return primerDiaMes;
}

function getUltimoDiaMes(fechaActual){
	var month = fechaActual.getMonth();
	var year = fechaActual.getFullYear();
	var ultimoDiaMes = new Date(year,month +1,1);
	ultimoDiaMes.variaDia(-1);
	return ultimoDiaMes;
}

function getPrimerDiaYear(fechaActual){
	var year = fechaActual.getFullYear();
	primerDiaYear = new Date(year,0,1);
	return primerDiaYear;
}
function getUltimoDiaYear(fechaActual){
	var year = fechaActual.getFullYear();
	ultimoDiaYear = new Date(year,11,31);
	return ultimoDiaYear;
}

Date.prototype.variaDia = function(numeroDay){
	var dias = this.getDate();
	this.setDate(dias+numeroDay);
	return this;
}

Date.prototype.variaSemana = function(numeroWeek){
	var dias = this.getDate();
	this.setDate(dias+numeroWeek*7);
	return this;
}

Date.prototype.variaMes = function(numeroMonth){
	var mes = this.getMonth();
	this.setMonth(mes+numeroMonth);
	return this;
}
Date.prototype.variaYear = function(numeroYear){
	var year = this.getFullYear();
	this.setYear(year+numeroYear);
	return this;
}

function nombreMes(month){
	switch (month){
		case 0:
			return "Enero";
		case 1:
			return "Febrero";
		case 2: 
			return "Marzo";
		case 3:
			return "Abril";
		case 4:
			return "Mayo";
		case 5:
			return "Junio";
		case 6:
			return "Julio";
		case 7:
			return "Agosto";
		case 8:
			return "Septiembre";
		case 9:
			return "Octubre";
		case 10:
			return "Noviembre";
		case 11:
			return "Diciembre";											
	}
}