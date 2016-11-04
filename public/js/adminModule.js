$( document ).ready(function() {
  //instantiate a Pusher object with our Credential's key
  var pusher = new Pusher('e318da3b3d93e77f464a', {
    encrypted: true
  });

  //Subscribe to the channel we specified in our Laravel Event
  var channel = pusher.subscribe('newOrder-channel');

  //Bind a function to a Event (the full Laravel class)
  channel.bind('App\\Events\\nuevoPedidoEvent', nuevoPedido);

  function nuevoPedido() {
    $('#new-orders').show();
    if(!$('#new-orders').hasClass('item-parpadeo')){
      $('#new-orders').addClass('item-parpadeo');
    }

    var contadorPedidos = parseInt($('#contador-pedidos').text());
    contadorPedidos = contadorPedidos +1;
    $('#contador-pedidos').text(contadorPedidos);
  }
});

