function mostrarDetalle(id_pedido){
	$.get("detallePedido/"+id_pedido.toString(), function(response,state){

		$('#codPedido').text(response.id_orden_compra);
		$('#nomCliente').text(response.nombre);
		$('#apeCliente').text(response.apellidos);
		$('#cantidad').text(response.cantidad);
	});
}