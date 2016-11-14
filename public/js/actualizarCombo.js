$(document).ready(function(){
	$(".hola").hide();
    $("#modalLista").modal('show');
    $('#modalLista').on('hidden.bs.modal', function (e) {
    	ClearCookie();
    });
	$("#butModalCrear").click(function(){
		ld = new FormData(document.getElementById("formCreateComb"));
		$.ajax({
			url: '/insertComb',
			type: 'POST',
			data: ld,
			processData: false,
      		contentType: false,
			success: function(data,status){
				alert(data);
				$(location).attr('href','admin/actualizarComb/');
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
	$("#butformUpdComb").click(function(){
		ld = new FormData(document.getElementById("formUpdComb"));
		$.ajax({
			url: $("#formUpdComb").attr('url'),
			type: 'POST',
			data: ld,
			processData: false,
      		contentType: false,
			success: function(data,status){
				alert(data);
				$(location).attr('href','admin/actualizarComb/');
			},
			error: function(msg){
				
				if(msg.responseJSON.precioCombo != null){
				$("#precioAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.precioCombo+"</div>");
				}else{$("#precioAlertMod").html("");}
				if(msg.responseJSON.descripcionCombo != null){
				$("#descripcionAlertMod").html("<br><div class='alert alert-danger' role='alert'>"+msg.responseJSON.descripcionCombo+"</div>");
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
	$.get("/deleteComb/"+id+"/"+nombre,function(data,status){
		alert(data);
		$(location).attr('href','admin/actualizarComb/');
	});
}
function showdetail(id){
	$("#idCombo").val(id);
	$("#formUpdComb").attr("url","/updComb/"+id);
	$.get("/showdetailComb/"+id , function($response , status){
		//Formulario estatico
		$("#nombreComb").text($response.nombreCombo);
		$("#precioComb").text($response.precioUnitario);
		$("#descripcionComb").text($response.descripcion);
		$("#estadoComb").text($response.estado);
		$("#fInicio").text($response.fInicio.split(" ")[0]);
		$("#fFin").text($response.fFin.split(" ")[0]);
		$("#imagenComb").attr('src','/Imagenes/Combos/'+$response.nombreImagen);
		$("#imagenComb").attr('alt',$response.nombreImagen);
		$("#nombreImaComb").text($response.nombreCombo);
		$("#desImagenComb").text($response.descripcionImagen);
		//Formulario de modificacion
		$("#nCombo").val($response.nombreCombo);
		$("#pCombo").val($response.precioUnitario);
		$("#dCombo").text($response.descripcion);
		$("#eCombo").val($response.estado);
		$("#fInicioCombo").val($response.fInicio.split(" ")[0]);
		$("#fFinCombo").val($response.fFin.split(" ")[0]);
		$("#dICombo").text($response.descripcionImagen);
		$("#butDeleteComb").attr("onclick","deleteing('"+id+"','"+$response.nombreImagen+"')");
		//
		$("#modalLista").modal('hide');
		$("#alert0").hide();
		$(".hola").show();
	});
}
function search(){
	var valueId = $("#searchComb").val();
	$(location).attr('href','/admin/actualizarComb/'+valueId);
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
    $.get("/deleteAllComb/",{'id[]':value1,'nombreImagen[]': value2},function(data,status){
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