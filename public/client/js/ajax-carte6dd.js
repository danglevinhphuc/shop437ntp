(function($) {  
	$(document).ready(function() {
		updateMiniCart();

		initAddToCart();
		qtyProduct();
	}); 

	function convertToSlug(text) {
		return text.toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
	} window.convertToSlug=convertToSlug;

	function showPopup(selector) {
		$(selector).addClass('active');
	} window.showPopup=showPopup;

	function hidePopup(selector) {
		$(selector).removeClass('active');
	} window.hidePopup=hidePopup;

	/* ADD TO CART */
	function doAjaxAddToCart(variant_id, quantity, title, image) {

		$.ajax({
			type: "post",
			url: "/cart/add.js",
			data: 'quantity=' + quantity + '&id=' + variant_id,
			dataType: 'json', 
			beforeSend: function() {              
				showPopup('.loading');  
			},
			success: function(msg) {   
				$('.product-popup').removeClass('wishlist-popup').addClass('cart-popup');
				$('.product-popup').find('.product-name').html(title);
				$('.product-popup').find('.product-image img').attr('src', image);

				showPopup('.product-popup');
				updateMiniCart();

			},
			error: function(xhr, text) {
				hidePopup('.loading'); 
				$('.error-message').text($.parseJSON(xhr.responseText).description);
				showPopup('.error-popup');
			}
		});
	}window.doAjaxAddToCart=doAjaxAddToCart;


	/* --------------------------------------------------------- */
	/* Ajax AddtoCart */

	/* Product item - Add To Cart */

	function initAddToCart() {
		$('.btn-add-to-cart').click(function(event) {    

			event.preventDefault();
			if ($(this).attr('disabled') != 'disabled') {

				var productItem = $(this).parents('.product-inner');
				var productId = $(productItem).attr('id');           

				productId = productId.match(/\d+/g);

				var variant_id = $('#AddToCartForm-' + productId + ' select[name=id]').val();
				if (!variant_id) {
					variant_id = $('#AddToCartForm-' + productId + ' input[name=id]').val();
				}

				var quantity = $('#AddToCartForm-' + productId + ' input[name=quantity]').val();
				if (!quantity) {
					quantity = 1;
				}

				var title = $(productItem).find('.product-name').html();
				var image = $(productItem).find('.product-featured-image').attr('src');
				doAjaxAddToCart(variant_id, quantity, title, image); 
			}
			return false;
		});
	}window.initAddToCart=initAddToCart;


	/* Update Mini Cart */
	function updateMiniCart() {
		Haravan.getCart(function(cart) {        
			doUpdateMiniCart(cart);
		});
	}window.updateMiniCart=updateMiniCart;

	/* Do Update Mini Cart */
	function doUpdateMiniCart(cart) {
		$('.CartCount').html(cart.item_count);
		var template = '<li class="whishlist-item cart_img"><div class="item clearfix" id="cart-item-{id}"><a href="{url}" title="{title}" class="product-image product-imgcart"><img src="{img}" alt="{title}"></a><div class="product-details"><p class="product-name"><a href="{url}">{title}</a></p><span class="soluong_cart">{quantity}</span><span class="price_cart">{price}</span></div><a href="javascript:void(0)" title="Remove This Item" class="btn-remove"><i class="fa fa-times"></i></a></div></div></li>';
		$('.cartCount span').text(cart.item_count); 
		$('.price_total_cart').html(Haravan.formatMoney(cart.total_price, window.money_format)); 
		$('.mini-cart .mini-products-list').html('');

		if (cart.item_count > 0) {
			for (var i = 0; i < cart.items.length; i++) {
				var item = template;
				item = item.replace(/\{id\}/g, cart.items[i].id);
				item = item.replace(/\{url\}/g, cart.items[i].url);
				item = item.replace(/\{title\}/g, cart.items[i].title);
				item = item.replace(/\{quantity\}/g, cart.items[i].quantity);
				item = item.replace(/\{img\}/g, Haravan.resizeImage(cart.items[i].image, 'small'));
				item = item.replace(/\{price\}/g, Haravan.formatMoney(cart.items[i].price, window.money_format));
				$('.mini-cart .mini-products-list').append(item);
			}
			$('.mini-cart .btn-remove').click(function(event) {          
				event.preventDefault();
				var productId = $(this).parents('.item').attr('id');
				productId = productId.match(/\d+/g);
				Haravan.removeItem(productId, function(cart) {
					doUpdateMiniCart(cart);
				});          
			});

		} 
		checkItemsInMiniCart();
	}window.doUpdateMiniCart=doUpdateMiniCart;

	/* Check Item Mini Cart */
	function checkItemsInMiniCart() {  

		if($('#cart-info .mini-products-list').children().length > 0) {

			$('#cart-info').addClass('hasItem');          
		} else{
			$('#cart-info').removeClass('hasItem'); 
		}
	}window.checkItemsInMiniCart=checkItemsInMiniCart;

	function qtyProduct() { 
		$('.qtyplus').click(function(e){	
			var fieldName = $(this).attr('data-field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());

			if (!isNaN(currentVal)) {
				$('input[name='+fieldName+']').val(currentVal + 1);
			} else {
				$('input[name='+fieldName+']').val(1);
			}
			e.preventDefault();
		});

		$(".qtyminus").click(function(e) {

			var fieldName = $(this).attr('data-field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal) && currentVal > 1) {
				$('input[name='+fieldName+']').val(currentVal - 1);    } 
			else {
				$('input[name='+fieldName+']').val(1);
			}
			e.preventDefault();
		});
	}window.qtyProduct=qtyProduct;


})(jQuery);

