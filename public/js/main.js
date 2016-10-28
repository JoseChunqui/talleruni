
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
	$('#productosAdd').append("<tr class='productosComprados' id='productoComprado_"
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
		+"<td align= 'center'><button onClick='eliminarProductoCarrito("
		+idProd
		+")' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>"
		+"</tr>");
}

function eliminarProductoCarrito(idProd){
	$('#productoComprado_'+idProd).remove();
	$.get('eliminarProductoCarrito/'+idProd,function(response,state){
		var numProdComprados= parseInt($('#numProdComprados').text())-1;
		$('#numProdComprados').text(numProdComprados);
	});
}

function eliminarCarrito(){
	$('.productosComprados').remove();
	$.get("eliminarCarrito", function(response,state){
		$('#numProdComprados').text(0);
	});
}
function totalizarCarrito(idProd){
	var cantidadProd = parseFloat($('#numOption_'+idProd+' option:selected').text());
	var precioProd = parseFloat($('#precioProd_'+idProd).text());
	$('#subTotal_'+idProd).text(cantidadProd*precioProd);
}
