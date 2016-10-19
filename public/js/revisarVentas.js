function mostrarDetalle(id_pedido){
	$.get("/admin/detallePedido/"+id_pedido.toString(), function(response,state){

		$('#codPedido').text(response.id_orden_compra);
		$('#nomCliente').text(response.nombre);
		$('#apeCliente').text(response.apellidos);
		$('#cantidad').text(response.cantidad);
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