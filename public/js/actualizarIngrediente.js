$(document).ready(function(){
	$(".hola").hide();
    $("#modalLista").modal('show');
    $('#modalLista').on('hidden.bs.modal', function (e) {
    	ClearCookie();
    });
});
function showList(){
	$.get('/showList');
}
function deleteing(id){

	$.get("/deleteIng/"+id,function(data,status){
		alert(data);
		$(location).attr('href','admin/actualizarIngr'); 
	});
	
}
function deletelisting(id){

	$.post("/deleteListIng/"+id);
	$(location).attr('href','admin/actualizarIngr'); 
}
function showdetail(id){
	$("#idIngr").val(id);
	$("#butDeleteIng").attr("onclick","deleteing("+id+")");
	$("#formUpdIng").attr("action","/updIng/"+id);
	$.get("/showdetail/"+id , function($response , status){
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
		//
		$("#modalLista").modal('hide');
		$("#alert0").hide();
		$(".hola").show();
	});
}
function search(){
	var valueId = $("#searchIng").val();
	$(location).attr('href','admin/actualizarIngr/'+valueId);
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
function ReadCookie(){
	var value = [];
    var allcookies = document.cookie;
    // Get all the cookies pairs in an array
    cookiearray = allcookies.split(';');
    // Now take key value pair out of this array
    for(var i=0; i<cookiearray.length; i++){
    	$name = cookiearray[i].split('=')[0];
        if ($name.search("jpg") != -1) {
        	$id =cookiearray[i].split('=')[1];
        	value.push($id);
        }
    }
    $.get("/deleteAll/",{'data[]': value},function(data,status){
    	alert(data);
    	alert(status);
    });
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