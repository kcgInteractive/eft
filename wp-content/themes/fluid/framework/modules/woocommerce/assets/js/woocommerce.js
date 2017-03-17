(function($) {
    'use strict';

    var woocommerce = {};
    edgtf.modules.woocommerce = woocommerce;

    woocommerce.edgtfOnDocumentReady = edgtfOnDocumentReady;
    woocommerce.edgtfOnWindowLoad = edgtfOnWindowLoad;
    woocommerce.edgtfOnWindowResize = edgtfOnWindowResize;
    woocommerce.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitQuantityButtons();
        edgtfInitSelect2();
	    edgtfInitSingleProductImageSwitchLogic();
        edgtfInitProductListCarousel();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {}
    
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
    function edgtfInitQuantityButtons() {
    
        $(document).on( 'click', '.edgtf-quantity-minus, .edgtf-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.edgtf-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('edgtf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );
        });
    }

    /*
    ** Init select2 script for select html dropdowns
    */
    function edgtfInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length) {
            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });
        }

        if($('#calc_shipping_country').length) {
            $('#calc_shipping_country').select2();
        }

        if($('.cart-collaterals .shipping select#calc_shipping_state').length) {
            $('.cart-collaterals .shipping select#calc_shipping_state').select2();
        }
    }
	
	/*
	 ** Init switch image logic for thumbnail and featured images on product single page
	 */
	function edgtfInitSingleProductImageSwitchLogic() {
		if(edgtf.body.hasClass('edgtf-woo-single-switch-image')){
			
			var thumbnailImage = $('.edgtf-woo-single-page .product .images .thumbnails > a'),
				featuredImage = $('.edgtf-woo-single-page .product .images .woocommerce-main-image');
			
			if(featuredImage.length) {
				featuredImage.on('click', function() {
					if($('div.pp_overlay').length) {
						$.prettyPhoto.close();
					}
					if(edgtf.body.hasClass('edgtf-disable-thumbnail-prettyphoto')){
						edgtf.body.removeClass('edgtf-disable-thumbnail-prettyphoto');
					}
					if(featuredImage.children('.edgtf-fake-featured-image').length){
						$('.edgtf-fake-featured-image').stop().animate({'opacity': '0'}, 300, function() {
							$(this).remove();
						});
					}
				});
			}
			
			if(thumbnailImage.length) {
				thumbnailImage.each(function(){
					var thisThumbnailImage = $(this),
						thisThumbnailImageSrc = thisThumbnailImage.attr('href');
					
					thisThumbnailImage.on('click', function() {
						if(!edgtf.body.hasClass('edgtf-disable-thumbnail-prettyphoto')){
							edgtf.body.addClass('edgtf-disable-thumbnail-prettyphoto');
						}
						
						if($('div.pp_overlay').length) {
							$.prettyPhoto.close();
						}
						if(thisThumbnailImageSrc !== '' && featuredImage !== '') {
							if (featuredImage.children('.edgtf-fake-featured-image').length) {
								$('.edgtf-fake-featured-image').remove();
							}
							featuredImage.append('<img itemprop="image" class="edgtf-fake-featured-image" src="' + thisThumbnailImageSrc + '" />');
						}
					});
				});
			}
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function edgtfInitProductListMasonryShortcode() {
		var container = $('.edgtf-pl-holder.edgtf-masonry-layout .edgtf-pl-outer');
		
		if(container.length) {
			container.each(function(){
				var thisContainer = $(this);
				
				thisContainer.waitForImages(function() {
					thisContainer.isotope({
						itemSelector: '.edgtf-pli',
						resizable: false,
						masonry: {
							columnWidth: '.edgtf-pl-sizer',
							gutter: '.edgtf-pl-gutter'
						}
					});
					
					thisContainer.isotope('layout');
					
					thisContainer.css('opacity', 1);
				});
			});
		}
	}
	
	/*
	 ** Init Product List Carousel Shortcode
	 */
	function edgtfInitProductListCarousel() {
		var carouselHolder = $('.edgtf-plc-holder');
		
		if (carouselHolder.length) {
			carouselHolder.each(function () {
				var thisCarousels = $(this),
					carousel = thisCarousels.children('.edgtf-plc-outer'),
					numberOfItems = (thisCarousels.data('number-of-visible-items') !== '') ? parseInt(thisCarousels.data('number-of-visible-items')) : 3,
					autoplay = (thisCarousels.data('autoplay') === 'yes') ? true : false,
					autoplayTimeout = (thisCarousels.data('autoplay-timeout') !== '') ? parseInt(thisCarousels.data('autoplay-timeout')) : 5000,
					loop = (thisCarousels.data('loop') === 'yes') ? true : false,
					speed = (thisCarousels.data('speed') !== '') ? parseInt(thisCarousels.data('speed')) : 650,
					navigation = (thisCarousels.data('navigation') === 'yes') ? true : false,
					pagination = (thisCarousels.data('pagination') === 'yes') ? true : false;
				
				var margin = 30;
				if(thisCarousels.hasClass('edgtf-small-space')) {
					margin = 10;
				} else if (thisCarousels.hasClass('edgtf-no-space')) {
					margin = 0;
				}
				
				var responsiveItems1 = numberOfItems;
				var responsiveItems2 = 3;
				var responsiveItems3 = 2;
				
				if (numberOfItems > 4) {
					responsiveItems1 = 4;
				}
				
				if (numberOfItems < 3) {
					responsiveItems2 = numberOfItems;
					responsiveItems3 = numberOfItems;
				}
				
				if (numberOfItems === 1) {
					margin = 0;
				}
				
				carousel.owlCarousel({
					items: numberOfItems,
					autoplay: autoplay,
					autoplayTimeout: autoplayTimeout,
					autoplayHoverPause: true,
					loop: loop,
					smartSpeed: speed,
					margin: margin,
					nav: navigation,
					navText: [
						'<span class="edgtf-prev-icon"><span class="edgtf-icon-arrow ion-ios-arrow-left"></span></span>',
						'<span class="edgtf-next-icon"><span class="edgtf-icon-arrow ion-ios-arrow-right"></span></span>'
					],
					dots: pagination,
					mouseDrag:true,
					touchDrag: true,
					responsive:{
						1200:{
							items: numberOfItems
						},
						1024:{
							items: responsiveItems1
						},
						769:{
							items: responsiveItems2
						},
						601:{
							items: responsiveItems3
						},
						0:{
							items: 1
						}
					}
				});
				
				carousel.css({'visibility': 'visible'});
			});
		}
	}

})(jQuery);