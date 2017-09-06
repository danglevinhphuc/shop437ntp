(function($) {  

	$(document).ready(function() {
		quickView();

		

	}); 
	$(document).on('click','.overlay,.continue-shopping, .close-window', function() {   
		hidePopup('.dqdt-popup'); 

		setTimeout(function(){
			$('.loading').removeClass('loaded-content');
		},500);
		return false;
	});

	function quickView() {
		$('.btn-quickview').click(function() { 
			showPopup('.loading');
			var id = $(this).attr('id');
			var rating = (($(this).closest('.product-info').find('.spr-badge').attr('data-rating')) * 20)+"%";

			Haravan.getProduct(id, function(product) {
				var template = $('#quick-view').html();
				$('.quickview-product').html(template);
				var quickview = $('.quickview-product');
				quickview.find('.product-name a').html(product.title).attr('href', product.url);
				quickview.find('.spr-badge .spr-active').css({"width": rating});
				if (quickview.find('.des').length > 0) { 
					var description = product.description.replace(/(<([^>]+)>)/ig, "");        
					description = description.split(" ").splice(0, 20).join(" ") + "...";
					quickview.find('.des').text(description);
				} else { 
					quickview.find('.des').remove();
				}

				quickview.find('.price').html(Haravan.formatMoney(product.price, window.money_format)+'đ');
				quickview.find('.product-inner').attr('id', 'product-' + product.id);
				quickview.find('.variants').attr('id', 'product-actions-' + product.id);
				quickview.find('.variants select').attr('id', 'product-select-' + product.id);

				if (product.compare_at_price > product.price) {
					quickview.find('.compare-price').html(Haravan.formatMoney(product.compare_at_price_max, window.money_format)).show();
					quickview.find('.price').addClass('on-sale');
				} else {
					quickview.find('.compare-price').html('');
					quickview.find('.price').removeClass('on-sale');
				}

				//out of stock
				if (!product.available) {
					quickview.find("select, input, .total-price, .dec, .inc, .variants label").remove();
					quickview.find(".btn-addToCart").text('unavailable').addClass('disabled').attr("disabled", "disabled");;
				} else {
					quickview.find('.total-price span').html(Haravan.formatMoney(product.price, window.money_format));   

					dqdtQuickview.createQuickViewVariants(product, quickview);        
				}

				qtyProduct();
				dqdtQuickview.quickViewSlider(product, quickview);
				dqdtQuickview.initQuickviewAddToCart();


				$('.quickview-product').addClass('active'); 
				$('.loading').addClass('loaded-content'); 

				if ($('.quickview-product .total-price').length > 0) {
					$('.quickview-product span[class=qtyplus]').on('click', dqdtQuickview.updatePricingQuickview);
					$('.quickview-product span[class=qtyminus]').on('click', dqdtQuickview.updatePricingQuickview);
				}




			});
			return false;  
		});  
	} window.quickView=quickView;


	var dqdtQuickview = { 
		/* Quick View SWATCH */
		createQuickViewVariantsSwatch: function(product, quickviewTemplate) {
			if (product.variants.length > 1) {
				for (var i = 0; i < product.variants.length; i++) {
					var variant = product.variants[i];
					var option = '<option value="' + variant.id + '">' + variant.title + '</option>';
					quickviewTemplate.find('form.variants > select').append(option);
				}
				new Haravan.OptionSelectors("product-select-" + product.id, {
					product: product,
					onVariantSelected: selectCallbackQuickview
				});
				console.log(window.file_url);
				//var filePath = window.file_url.substring(0, window.file_url.lastIndexOf('?'));
				//var assetUrl = window.asset_url.substring(0, window.asset_url.lastIndexOf('?'));
				var options = "";

				for (var i = 0; i < product.options.length; i++) {
					options += '<div class="swatch clearfix" data-option-index="' + i + '">';
					options += '<div class="header">' + product.options[i].name + '</div>';
					var is_color = false;
					if (/Color|Colour/i.test(product.options[i].name)) {
						is_color = true;
					}
					var optionValues = new Array();
					for (var j = 0; j < product.variants.length; j++) {
						var variant = product.variants[j];
						var value = variant.options[i];
						var valueHandle = convertToSlug(value);
						var forText = 'swatch-' + i + '-' + valueHandle;
						if (optionValues.indexOf(value) < 0) {
							//not yet inserted
							options += '<div data-value="' + value + '" class="swatch-element ' + (is_color ? "color" : "") + valueHandle + (variant.available ? ' available ' : ' soldout ') + '">';

							if (is_color) {
								options += '<div class="tooltip">' + value + '</div>';
							}
							options += '<input id="' + forText + '" type="radio" name="option-' + i + '" value="' + value + '" ' + (j == 0 ? ' checked ' : '') + (variant.available ? '' : ' disabled') + ' />';

							if (is_color) {
								options += '<label for="' + forText + '" style="background-color: ' + valueHandle + ';"></label>';
							} else {
								options += '<label for="' + forText + '">' + value + '</label>';
							}
							options += '</div>';
							if (variant.available) {
								$('.quickview-product .swatch[data-option-index="' + i + '"] .' + valueHandle).removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
							}
							optionValues.push(value);
						}
					}
					options += '</div>';
				}
				quickviewTemplate.find('form.variants > select').after(options);
				quickviewTemplate.find('.swatch :radio').change(function() {
					var optionIndex = $(this).closest('.swatch').attr('data-option-index');
					var optionValue = $(this).val();
					$(this)
					.closest('form')
					.find('.single-option-selector')
					.eq(optionIndex)
					.val(optionValue)
					.trigger('change');
				});

				if (product.available && product.options.size > 1) {
					Haravan.optionsMap = {};
					Haravan.linkOptionSelectors(product);
				}

			} else {
				quickviewTemplate.find('form.variants > select').remove();
				var variant_field = '<input type="hidden" name="id" value="' + product.variants[0].id + '">';
				quickviewTemplate.find('form.variants').append(variant_field);
			}
		},

		/* Quick View */
		createQuickViewVariants: function(product, quickviewTemplate) {
			if (product.variants.length > 1) {
				for (var i = 0; i < product.variants.length; i++) {
					var variant = product.variants[i];
					var option = '<option value="' + variant.id + '">' + variant.title + '</option>';
					quickviewTemplate.find('form.variants > select').append(option);
				}
				new Haravan.OptionSelectors("product-select-" + product.id, {
					product: product,
					onVariantSelected: selectCallbackQuickview
				});

				$('.quickview-product .selectize-input input').attr("disabled", "disabled");
				if (product.options.length == 1) {
					$('.selector-wrapper:eq(0)').prepend('<label>' + product.options[0].name + '</label>');
				}
				quickviewTemplate.find('form.variants .selector-wrapper label').each(function(i, v) {
					$(this).html(product.options[i].name);
				});

			} else {
				quickviewTemplate.find('form.variants > select').remove();
				var variant_field = '<input type="hidden" name="id" value="' + product.variants[0].id + '">';
				quickviewTemplate.find('form.variants').append(variant_field);
			}

		},

		/* Quick View VIEWMORE Slider */
		quickViewSlider: function(product, quickviewTemplate) { 
			var featuredImage = Haravan.resizeImage(product.featured_image, 'grande');
			quickviewTemplate.find('.featured-image').append('<a title="'+ product.title +'" class="product-photo" href="' + product.url + '"><img src="' + featuredImage + '" alt="' + product.title + '"/><span class="loading" style="height: 100%; width: 100%; top:0; left:0 z-index: 999; position: absolute; display: none; background: url(' + window.loading_url + ') center no-repeat;"></span></a>');
			if (product.images.length > 2) { 
				var quickViewCarousel = quickviewTemplate.find('.more-views .owl-carousel');

				for (i in product.images) {
					var grande = Haravan.resizeImage(product.images[i], 'grande');
					var compact = Haravan.resizeImage(product.images[i], 'compact');
					var item = '<div class="item"><a href="javascript:void(0)" data-image="' + grande + '"><img src="' + compact + '"  /></a></div>';
					quickViewCarousel.append(item); 
				}

				quickViewCarousel.find('a').click(function() {
					var featureImage = quickviewTemplate.find('.featured-image img');
					var moreviewLoad = quickviewTemplate.find('.featured-image .loading');
					if (featureImage.attr('src') != $(this).attr('data-image')) {
						featureImage.attr('src', $(this).attr('data-image'));
						moreviewLoad.show();
						featureImage.load(function(e) {
							moreviewLoad.hide();
							$(this).unbind('load');
							moreviewLoad.hide();
						});
					}
				});

			} else {
				quickviewTemplate.find('.more-views').remove();
			}

		},

		/* Quick View ADD TO CART */
		initQuickviewAddToCart: function() {
			if ($('.quickview-product .btn-addToCart').length > 0) {
				$('.quickview-product .btn-addToCart').click(function() {
					var variant_id = $('.quickview-product select[name=id]').val();
					if (!variant_id) {
						variant_id = $('.quickview-product input[name=id]').val();
					}
					var quantity = $('.quickview-product input[name=quantity]').val();
					if (!quantity) {
						quantity = 1;
					}

					var title = $('.quickview-product .product-name a').html();
					var image = $('.quickview-product .featured-image img').attr('src');

					doAjaxAddToCart(variant_id, quantity, title, image);
					hidePopup('.quickview-product');          
				});
			}
		},

		/* Quick View update Pricing */
		updatePricingQuickview: function() {     
			var regex = /([0-9]+[.|,][0-9]+[.|,][0-9]+)/g;
			var unitPriceTextMatch = $('.quickview-product .price').text().match(regex);

			if (!unitPriceTextMatch) {
				regex = /([0-9]+[.|,][0-9]+)/g;
				unitPriceTextMatch = $('.quickview-product .price').text().match(regex);
			}

			if (unitPriceTextMatch) {
				var unitPriceText = unitPriceTextMatch[0];
				var unitPrice = unitPriceText.replace(/[.|,]/g, '');
				var quantity = parseInt($('.quickview-product input[name=quantity]').val());
				var totalPrice = unitPrice * quantity;

				var totalPriceText = Haravan.formatMoney(totalPrice, window.money_format);
				regex = /([0-9]+[.|,][0-9]+[.|,][0-9]+)/g;     
				if (!totalPriceText.match(regex)) {
					regex = /([0-9]+[.|,][0-9]+)/g;
				} 
				totalPriceText = totalPriceText.match(regex)[0];

				var regInput = new RegExp(unitPriceText, "g");
				var totalPriceHtml = $('.quickview-product .price').html().replace(regInput, totalPriceText);

			}
		},

	}
	})(jQuery);