function mostrarDetalle(id_pedido){
	$.get("/admin/detallePedido/"+id_pedido.toString(), function(response,state){
		var totalCobrar = 0;
		var nombreProducto;
		var id_producto;
		var precioUnitario;

		$('#codPedido').text(response.codPedido);
		$('#fechaPedido').text(response.fechaPedido);
		$('#nomCliente').text(response.nombre);
		$('#apeCliente').text(response.apellidos);
		$('#dniCliente').text(response.dni);
		$('#nombreDistrito').text(response.nombreDistrito);
		$('#domicilioCliente').text(response.domicilio);

		$('.processOrder').show();

		$('.listProd').remove();
		for(i = 0; i < response.productosComprados.length; i++){
			id_producto = JSON.parse(response.productosComprados[i].id_producto);
			nombreProducto = JSON.parse(JSON.stringify(response.productosComprados[i].nombreProducto));
			precioUnitario = JSON.parse(response.productosComprados[i].precioUnitario);
			$('#productosComprados').append("<tr class='listProd'><td><p>"+
				id_producto +
				"</p></td><td><p>"+
				nombreProducto+
				"</p></td><td><p>"+
				"S/."+precioUnitario+
				"</p></td></tr>");
			totalCobrar= totalCobrar + precioUnitario;
		}
		$("#totalCobrar").text("S/."+ totalCobrar);
	});
}

function procesarPedido(){
	$.get("/admin/procesarPedido/"+$('#codPedido').text(), function(){
		alert("pedido Procesado");
		location.reload();
	});

}

function rechazarPedido(){
	$.get("/admin/rechazarPedido/"+$('#codPedido').text(), function(){
		alert("pedido Rechazado");
		location.reload();
	});
}

function reprocesarPedido(){
	$.get("/admin/reprocesarPedido/"+$('#codPedido').text(), function(){
		alert("pedido marcado como Pendiente");
		location.reload();
	});
}
