$('document').ready(function(){
	$('.cart').on('click',function(){
		var index = $('.cart').index(this);
		var item_id = Number($('.item-id:eq('+index+')').html());
		var item_name = String($('.item-name:eq('+index+')').html());
		var item_price = Number($('.item-price:eq('+index+')').html());
		var quantity = Number($('.item-quantity:eq('+index+')').val());
		if(quantity==0)
		{
			alert('please select quantity');
		}
		else
		{
			var total_price = item_price * quantity; 
			var response;
			var dataString = 'index='+ index + '&item_id=' + item_id + '&item_name=' + item_name + '&item_price=' + item_price + '&quantity=' + quantity;
			$.ajax(
			{
				type: "post",
				url: "cart.php",
				data: dataString,
				cache:false,
				success:function(msg){
					response = String(msg);
					alert(msg);
					location.reload();
				}
			}
			);

		}

	});
});

$('document').ready(function(){
	$('.removecart').on('click',function(){
		var index = $('.removecart').index(this);
		var remove_id = Number($('.remove_id:eq('+index+')').html()); 
			var dataString = 'index='+ index + '&remove_id=' + remove_id;
			$.ajax(
			{
				type: "post",
				url: "remove.php",
				data: dataString,
				cache:false,
				success:function(msg){
					response = String(msg);
					alert(msg);
					location.reload();
				}
			}
			);

		}

	);
});	