$(document).ready(function(){
	$(".hola").hide();
    $("#modalLista").modal('show');
    $('#modalLista').on('hidden.bs.modal', function (e) {
    	ClearCookie();
    });
	$("#butModalCrear").click(function(){
		ld = new FormData(document.getElementById("formCreateIng"));
		$.ajax({
			url: '/insertIng',
			type: 'POST',
			data: ld,
			processData: false,
      		contentType: false,
			success: function(data,status){
				$(location).attr('href','admin/actualizarIngr/');
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
	$("#butformUpdIng").click(function(){
		ld = new FormData(document.getElementById("formUpdIng"));
		$.ajax({
			url: $("#formUpdIng").attr('url'),
			type: 'POST',
			data: ld,
			processData: false,
      		contentType: false,
			success: function(data,status){
				$(location).attr('href','admin/actualizarIngr/');
			},
			error: function(msg){
				
				if(msg.responseJSON.precioIngr != null){
				$("#precioAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.precioIngr+"</div>");
				}else{$("#precioAlertMod").html("");}
				if(msg.responseJSON.descripcionIngr != null){
				$("#descripcionAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.descripcionIngr+"</div>");
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
	$.get("/deleteIng/"+id+"/"+nombre,function(data,status){
		alert(data);
		$(location).attr('href','admin/actualizarIngr/');
	});
}
function showdetail(id){
	$("#idIngr").val(id);
	$("#formUpdIng").attr("url","/updIng/"+id);
	$.get("/showdetailIng/"+id , function($response , status){
		//Formulario estatico
		$("#nombreIng").text($response.nombreIngrediente);
		$("#precioIng").text($response.precionUnitario);
		$("#descripcionIng").text($response.descripcion);
		$("#estadoIng").text($response.estado);

		$("#imagenIng").attr('src','/Imagenes/Ingredientes/'+$response.nombreImagen);
		$("#imagenIng").attr('alt',$response.nombreImagen);
		$("#nombreImaIng").text($response.nombreIngrediente);
		$("#desImagenIng").text($response.descripcionImagen);
		//Formulario de modificacion
		$("#nombreIngr").val($response.nombreIngrediente);
		$("#nombreIngr").val($response.nombreIngrediente);
		$("#precioIngr").val($response.precionUnitario);
		$("#descripcionIngr").text($response.descripcion);
		$("#estadoIngr").val($response.estado);
		$("#desImaIngr").text($response.descripcionImagen);
		$("#butDeleteIng").attr("onclick","deleteing('"+id+"','"+$response.nombreImagen+"')");
		//
		$("#modalLista").modal('hide');
		$("#alert0").hide();
		$(".hola").show();
	});
}
function search(){
	var valueId = $("#searchIng").val();
	$(location).attr('href','/admin/actualizarIngr/'+valueId);
}
function setCookie(cname,cvalue) {
	$("#modallista"+cvalue).remove();
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
    $.get("/deleteAllIng/",{'id[]':value1,'nombreImagen[]': value2},function(data,status){
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