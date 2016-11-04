$( document ).ready(function() {
    console.log( "ready!" );
    $.get("getCarrito",function(response,state){
    	if(response.idProd!=null){
    		for(i=0;i<response.idProd.length;i++){
    			idProd = response.idProd[i];
				imagenProducto = response.imagenProducto[i];
				nomProd = response.nomProd[i];
				precioProd = response.precioProd[i];
				cantidadProd = response.cantidadProd[i];
				var arrayProducto = [idProd,imagenProducto,nomProd,precioProd,cantidadProd];
    			construirCarrito('productosAdd',arrayProducto);
    			if( $("#productosCarritoPreview").length > 0 && $("#productosCarritoConfirm").length > 0){
    				construirCarrito('productosCarritoPreview',arrayProducto,true);
    				construirCarrito('productosCarritoConfirm',arrayProducto,true);
    			}
    		}
    	}
    });

});

function menuProductos(categoryProds = null){
	if(categoryProds!=null){
		$('.menuProd').removeClass('list-group-item-success');
		$('#'+categoryProds).addClass('list-group-item-success');
		$('.prods').hide();
		$('.'+categoryProds).show();
	}else{
		$('.menuProd').removeClass('list-group-item-success');
		$('.prods').show();
	}

}

function mostrarDetalle(id_producto){
	$.get("detalleProducto/"+id_producto.toString(), function(response,state){
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
		precioProd : precioProd},
		function(response,state,xhr){
			if(xhr.getResponseHeader('stats')==1){
				var optionSelected= parseInt($('#numOption_'+idProd+ ' option:selected').text()) +1;
				$('#numOption_'+idProd+ ' option:selected').text(optionSelected);
			}else{
				var imagenProducto = $('#imagenProducto').text();
				var nomProd = $('#nomProd').text();
				var precioProd = $('#precioProd').text();
				construirCarrito('productosAdd',[idProd,imagenProducto,nomProd,precioProd,1]);
			}

	});	
}

function eliminarProductoCarrito(idProd){	
	var cantidadProdOld = parseInt($('#numOption_'+idProd+' option:selected').text());
	var numProdComprados= parseInt($('#numProdComprados').text());
	console.log(cantidadProdOld);	
	$.get('eliminarProductoCarrito/'+idProd,function(response,state){		
		$('#numProdComprados').text(numProdComprados-cantidadProdOld);
		$('#productoComprado_'+idProd).remove();
	});
	
}

function eliminarCarrito(){
	$('.productosComprados').remove();
	$.get("eliminarCarrito", function(response,state){
		$('#numProdComprados').text(0);
	});
}
function cantidadOld(idProd){
	var cantidadProdOld = parseInt($('#numOption_'+idProd+' option:selected').text());
	$('#numOption_'+idProd).attr("valueOld",cantidadProdOld);
	console.log(cantidadProdOld);
}
function totalizarCarrito(idProd){
	var cantidadProdOld = parseInt($('#numOption_'+idProd).attr("valueOld"));	
	var precioProd = parseFloat($('#precioProd_'+idProd).text());
	var cantidadProd = parseInt($('#numOption_'+idProd+' option:selected').text());
	var numProdComprados= parseInt($('#numProdComprados').text())
	$('#subTotal_'+idProd).text((cantidadProd*precioProd).toFixed(2));
	$('#numProdComprados').text(numProdComprados+cantidadProd-cantidadProdOld);
	$.get('aumentaProducto/'+idProd,{cantidadProd:cantidadProd});
	$('#numOption_'+idProd).blur();
}


function construirCarrito(idSection,arrayProducto,noModificable = null){
	var stringInicio="<tr class='productosComprados' id='productoComprado_"+arrayProducto[0]+"'>";
	var stringImagen="<td><img src='Imagenes/productos/sandwichs/"+arrayProducto[1]+"' alt='Imagen Producto' style='width:70px;height:50px'></td>";
	var stringNombreProducto="<td><p>"+arrayProducto[2]+"</p></td>";
	var stringPrecioProducto="<td>S/.<p id='precioProd_"+arrayProducto[0]+"'>"+arrayProducto[3]+"</p></td>";
	var stringCantidadProducto;
	if(noModificable==null){
		stringCantidadProducto="<td><select onfocus='cantidadOld("+arrayProducto[0]+")' onchange='totalizarCarrito("+arrayProducto[0]+")' class='form-control optionCantidad' id='numOption_"+arrayProducto[0]+"'>"
		+"<option selected='selected'>"+arrayProducto[4]+"</option>"+"<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>";
	}else{
		stringCantidadProducto="<td><p>"+arrayProducto[4]+"</p></td>";
	}
	var stringSubTotal = "<td>S/.<p id='subTotal_"+arrayProducto[0]+"'>"+(arrayProducto[3]*arrayProducto[4]).toFixed(2)+"</p></td>";
	var stringBotonAccion = "<td align= 'center'><button onClick='eliminarProductoCarrito("+arrayProducto[0]
	+")' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></td>";
	var stringFinal="</tr>";

	var stringCarrito=stringInicio+stringImagen+stringNombreProducto+stringPrecioProducto+stringCantidadProducto+stringSubTotal;
	if(noModificable==null){
		stringCarrito=stringCarrito+stringBotonAccion+stringFinal;
	}else{
		stringCarrito=stringCarrito+stringFinal;
	}
	$('#'+idSection).append(stringCarrito);
}

