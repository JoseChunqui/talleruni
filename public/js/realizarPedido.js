$( document ).ready(function() {
    $('#openConfirmation').click(function(){
    	$(".alert").remove();
    	var form = $('#formularioPreliminar');
    	$.ajax({
    		type: 'get',
    		url: 'precargarProductos',
    		data: form.serialize(),
    		dataType: "json",
    		success: function(){
    			form.find(':input').each(function(key,value){
    				if($.trim(value.name)!=="" && $.trim(value.value)!==""){
    					$('#'+value.name+'Confirm').val(value.value);
    				}    				
    			});
    			$('#confirmarPedidoModal').modal('show');
    		},
    		error: function (response,status,xhr){
    			var mensaje = response.responseJSON;
    			$.each(mensaje.message, function(key,value){
    				$('#'+key+"Div").append("<div class='alert alert-danger'><strong>Error! </strong>"+value+"</div>");
    			});
    			$('#openConfirmation').blur();
    		}
    	});
    });
});

