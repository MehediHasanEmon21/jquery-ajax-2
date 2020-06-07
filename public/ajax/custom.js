
$(function(){

$(document).on('change','#min_price',function(){

	var price = $(this).val()

	fetchProduct(price)

})

function fetchProduct(price){

	$.ajax({

		url: '/api/fetch/product',
		method: 'POST',
		data: {price: price},
		success: function(data){
			if (data != '') {

				$('#price_range').text(price)

				var output = '';

				for(var i = 0; i < data.products.length; i++ ){

					output += `<div class="col-md-4">  
                     <div style="border:1px solid #ccc; padding:12px; margin-bottom:16px; height:375px;" align="center">  
                          <img src="${data.path}/${data.products[i].product_image}" class="img-responsive" />  
                          <h3>${data.products[i].product_name}</h3>  
                          <h4>Price - ${data.products[i].product_price}</h4>  
                     </div>  
                </div>  `

				} 

				$('#product_loading').html(output)

			}
			
		}

	})

}



})
 
