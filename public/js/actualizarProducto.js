$(document).ready(function(){
	$(".hola").hide();
    $("#modalLista").modal('show');
    $('#modalAgregar').on('show.bs.modal', function (e) {
    	$.get('/mostrarIngProd',function(data,success){
    	$("#listaingProd").empty();
		if(data.length==0){
			$("#listaingProd").append('<div class="list-group-item"><div class="row"><div class="col-xs-10 col-xs-offset-1"><div class="alert alert-danger">No existe ingredientes</div></div></div></div>');
		}else{
			data.forEach(mostrarIngdx);
			function mostrarIngdx(item,index){
			$("#listaingProd").append('<div class="list-group-item"><div class="row"><div class="col-xs-9"><a href="#">'+item.nombreIngrediente+'</a></div><div class="col-xs-3"><button onclick="agregarIngProd('+item.id+')" class="btn btn-danger">AGREGAR</button></div></div></div>');
			}
		}    	
    	});
    });
    $('#modalAgregar').on('hidden.bs.modal', function (e) {
    	$id_p = $("#modalAgregar").data("id");
    	showdetail($id_p);
    });
    $('#modalLista').on('hidden.bs.modal', function (e) {
    	ClearCookie();
    });
	$("#butModalCrear").click(function(){
		ld = new FormData(document.getElementById("formCreateProd"));
		$.ajax({
			url: '/insertProd',
			type: 'POST',
			data: ld,
			processData: false,
      		contentType: false,
			success: function(data,status){
				$(location).attr('href','admin/actualizarProdu/');
			},
			error: function(msg){
				alert("error");
				if(msg.responseJSON.nombre != null){
				$("#nombreAlert").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.nombre+"</div>");
				}else{$("#nombreAlert").html("");}
				if(msg.responseJSON.precio != null){
				$("#precioAlert").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.precio+"</div>");
				}else{$("#precioAlert").html("");}
				if(msg.responseJSON.descripcion != null){
				$("#descripcionAlert").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.descripcion+"</div>");
				}else{$("#descripcionAlert").html("");}
				if(msg.responseJSON.estado != null){
				$("#estadoAlert").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.estado+"</div>");
				}else{$("#estadoAlert").html("");}
				if(msg.responseJSON.image != null){
				$("#imageAlert").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.image+"</div>");
				}else{$("#imageAlert").html("");}
				if(msg.responseJSON.descripcionImagen != null){
				$("#descripcionImagenAlert").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.descripcionImagen+"</div>");
				}else{$("#descripcionImagenAlert").html("");}
			}
		});
	});
	$("#butformUpdProd").click(function(){
		ld = new FormData(document.getElementById("formUpdProd"));
		$.ajax({
			url: $("#formUpdProd").attr('url'),
			type: 'POST',
			data: ld,
			processData: false,
      		contentType: false,
			success: function(data,status){
				$(location).attr('href','admin/actualizarProdu/');
			},
			error: function(msg){
				
				if(msg.responseJSON.precioProdu != null){
				$("#precioAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.precioProdu+"</div>");
				}else{$("#precioAlertMod").html("");}
				if(msg.responseJSON.descripcionProdu != null){
				$("#descripcionAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.descripcionProdu+"</div>");
				}else{$("#descripcionAlertMod").html("");}
				if(msg.responseJSON.descripcionImagen != null){
				$("#descripcionImagenAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.descripcionImagen+"</div>");
				}else{$("#descripcionImagenAlertMod").html("");}
				alert("error");
			}
		});
	});
});
function showList(){
	$.get('/showList');
}
function deleteing(id,nombre){
	$.get("/deleteProd/"+id+"/"+nombre,function(data,status){
		alert(data);
		$(location).attr('href','admin/actualizarProdu/');
	});
}
function showdetail(id){
	$("#idProdu").val(id);
	$("#formUpdProd").attr("url","/updProd/"+id);
	$.get("/showdetailProd/"+id , function($response , status){
		//Formulario estatico
		$("#modalAgregar").data("id",id);
		$("#nombreProd").text($response.nombreProducto);
		$("#precioProd").text($response.precioUnitario);
		$("#descripcionProd").text($response.descripcion);
		$("#estadoProd").text($response.estado);

		$("#imagenProd").attr('src','/Imagenes/productos/sandwichs/'+$response.nombreImagen);
		$("#imagenProd").attr('alt',$response.nombreImagen);
		$("#nombreImaProd").text($response.nombreProducto);
		$("#desImagenProd").text($response.descripcionImagen);
		//Formulario de modificacion
		$("#nombreProdu").val($response.nombreProducto);
		$("#nombreProdu").val($response.nombreProducto);
		$("#precioProdu").val($response.precioUnitario);
		$("#descripcionProdu").text($response.descripcion);
		$("#estadoProdu").val($response.estado);
		$("#desImaProdu").text($response.descripcionImagen);
		$("#butDeleteProd").attr("onclick","deleteing('"+id+"','"+$response.nombreImagen+"')");
		//mostrar ingredientes que conforman el producto
		$("#ingProd").empty();
		if($response.ingredientes.length==0){
			$("#ingProd").append('<div class="list-group-item"><div class="row"><div class="col-xs-10 col-xs-offset-1"><div class="alert alert-danger">No posee ingredientes asignados</div></div></div></div>');
		}else{
			$response.ingredientes.forEach(mostrarIngxd);
			function mostrarIngxd(item,index){
			$("#ingProd").append('<div class="list-group-item"><div class="row"><div class="col-xs-10"><a>'+item.nombreIngrediente+'</a></div><div class="col-xs-2"><button onclick="deleteIngProd('+item.id+')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></div></div></div>');
			}
		}
		//
			
		$("#modalLista").modal('hide');
		$("#alert0").hide();
		$(".hola").show();
	});
}
function search(){
	var valueId = $("#searchProd").val();
	$(location).attr('href','/admin/actualizarProdu/'+valueId);
}
function setCookie(cname,cvalue) {
	$("#modallista"+cvalue).remove();
	alert(cname);
	alert(cvalue);
    document.cookie = cname +"="+cvalue;
}
function getCookie(cname) {
var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)test2\s*\=\s*([^;]*).*$)|^.*$/, "$1");
}
function deleteCookie(cname) {
	document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
}
function deleteAll(){
	var value1 = [];
	var value2 = [];
    var allcookies = document.cookie;
    // Get all the cookies pairs in an array
    cookiearray = allcookies.split(';');
    // Now take key value pair out of this array
    for(var i=0; i<cookiearray.length; i++){
    	$name = cookiearray[i].split('=')[0];
        if ($name.search("jpg") != -1 || $name.search("png") != -1 || $name.search("jpeg") != -1) {
        	value1.push(cookiearray[i].split('=')[1]);
        	value2.push($name);
        }
    }
    $.get("/deleteAllProd/",{'id[]':value1,'nombreImagen[]': value2},function(data,status){
    	alert(data);
    });
    ClearCookie();
}
function ClearCookie(){
    var alldelcookies = document.cookie;
    cookiearray = alldelcookies.split(';');
    for(var i=0; i<cookiearray.length; i++){
    	$name = cookiearray[i].split('=')[0];
        if ($name.search("jpg") != -1) {
        	deleteCookie($name);
        }
    }
}
function getCookie(){
	var $x=document.cookie;
	$("#mostrar").text($x);
}

function agregarIngProd(id_i){
	$id_p = $("#modalAgregar").data("id");
	$.get('/agregarIngProd/'+id_i+'/'+$id_p,function(data,success){
		alert(data);
	});
}
function deleteIngProd(id_i){
	$id_p = $("#modalAgregar").data("id");
	$.get('/deleteIngProd/'+id_i+'/'+$id_p,function(data,success){
		alert(data);
		showdetail($id_p);
	});
}

