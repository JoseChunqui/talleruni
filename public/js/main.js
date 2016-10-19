function mostrarDetalle(id_producto){
	$.get("admin/detalleProducto/"+id_producto.toString(), function(response,state){
		$('#nomProd').text(response.nombreProducto);
		$('#precioProd').text(response.precioUnitario);
		$('#descripcionProd').text(response.descripcion)
	});
}
