
$( document ).ready(function() {

    console.log( "ready!" );



});


function mostrarDetalle(id_producto){
	$.get("admin/detalleProducto/"+id_producto.toString(), function(response,state){
		$('#idProd').text(response.id_producto);
		$('#nomProd').text(response.nombreProducto);
		$('#precioProd').text(response.precioUnitario);
		$('#descripcionProd').text(response.descripcion);
		$('#imagenProducto').text(response.imagenProducto);
	});
}

function carrito(){
	var numProdComprados= parseInt($('#numProdComprados').text())+1;
	var idProd = $('#idProd').text();	
	var imagenProducto = $('#imagenProducto').text();
	var nomProd = $('#nomProd').text();
	var precioProd = $('#precioProd').text();

	$('#numProdComprados').text(numProdComprados);
	$.get("addCarrito/"+idProd,{
		imagenProducto : imagenProducto,
		nomProd : nomProd,
		precioProd : precioProd,
		numProdComprados: numProdComprados},
		function(){
		
	});

	/*Write w/o reload*/

	var imagenProducto = $('#imagenProducto').text();
	var nomProd = $('#nomProd').text();
	var precioProd = $('#precioProd').text();
	$('#productosAdd').append("<tr id='productoComprado_"
		+idProd
		+"'><td><img src='Imagenes/productos/sandwichs/"
		+imagenProducto
		+"' alt='Pulpit Rock' style='width:70px;height:50px'></td><td>"
		+nomProd
		+"</td><td id='precioProd_"
		+idProd
		+"'>"
		+precioProd
		+"</td><td><select onclick='totalizarCarrito("
		+idProd
		+")'class='form-control' id='numOption_"
		+idProd
		+"'>"
		+"<option>1</option><option>2</option><option>3</option><option>4</option>"
		+"</select></td><td id='subTotal_"
		+idProd
		+"'>"
		+precioProd
		+"</td>"
		+"<td><button id='botoncito' onClick='eliminarCarrito("
		+idProd
		+")' class='btn btn-default'>Eliminar</button></td>"
		+"</tr>");
	

}


/*
function carrito(){
	var numProdComprados= parseInt($('#numProdComprados').text())+1;
	$('#numProdComprados').text(numProdComprados);
	var idProd = $('#idProd').text();
	var imagenProducto = $('#imagenProducto').text();
	var nomProd = $('#nomProd').text();
	var precioProd = $('#precioProd').text();
	var imagenProducto= $('#imagenProducto').text();
	$('#productosAdd').append("<tr id='productoComprado_"
		+numProdComprados
		+"'><td><img src='Imagenes/productos/sandwichs/"
		+imagenProducto
		+"' alt='Pulpit Rock' style='width:70px;height:50px'></td><td>"
		+nomProd
		+"</td><td id='precioProd_"
		+numProdComprados
		+"'>"
		+precioProd
		+"</td><td><select onclick='totalizarCarrito("
		+numProdComprados
		+")'class='form-control' id='numOption_"
		+numProdComprados
		+"'>"
		+"<option>1</option><option>2</option><option>3</option><option>4</option>"
		+"</select></td><td id='subTotal_"
		+numProdComprados
		+"'>"
		+precioProd
		+"</td>"
		+"<td><button id='botoncito' onClick='eliminarCarrito("
		+numProdComprados
		+")' class='btn btn-default'>Eliminar</button></td>"
		+"</tr>");
	console.log("idProductoCarrito");
}
*/
function eliminarCarrito(idProd){
	$('#productoComprado_'+idProd).remove();

}
function totalizarCarrito(idProd){
	var cantidadProd = parseFloat($('#numOption_'+idProd+' option:selected').text());
	var precioProd = parseFloat($('#precioProd_'+idProd).text());
	$('#subTotal_'+idProd).text(cantidadProd*precioProd);
}
