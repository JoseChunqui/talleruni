function mostrarDetalle(id_producto){
	$.get("admin/detalleProducto/"+id_producto.toString(), function(response,state){
		$('#idProd').text(response.id_producto)
		$('#nomProd').text(response.nombreProducto);
		$('#precioProd').text(response.precioUnitario);
		$('#descripcionProd').text(response.descripcion)
	});
}

function carrito(){
	var numProdComprados= $('#numProdComprados').text();
	$('#numProdComprados').text(parseInt(numProdComprados)+1);
	var idProd = $('#idProd').text();
	var nomProd = $('#nomProd').text();
	var precioProd = $('#precioProd').text();
	$('#aqui').append("<tr><td><img src='Imagenes/sandwich"+idProd+".jpg' alt='Pulpit Rock' style='width:50px;height:50px'></td><td>"+nomProd+"</td><td>"+precioProd+"</td><td><select class='form-control' id='sel1'><option>1</option><option>2</option><option>3</option><option>4</option></select></td><td>"+precioProd+"</td></tr>");

}