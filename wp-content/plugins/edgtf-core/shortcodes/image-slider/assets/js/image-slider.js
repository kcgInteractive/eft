(function($) {
    'use strict';

    var imageSlider = {};
    edgtf.modules.imageSlider = imageSlider;

	imageSlider.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(window).load(edgtfOnDocumentReady);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
	    edgtfInitImageSlider();
    }

    /**
     * Initializes portfolio list article animation
     */
    function edgtfInitImageSlider(){
	    var sliders = $('.edgtf-image-slider');

	    if (sliders.length) {
		    sliders.each(function(){
			    var slider = $(this),
				    slideItemsNumber = slider.children().length,
				    numberOfItems = 1,
				    loop = true,
				    autoplay = true,
				    sliderSpeed = 5000,
				    sliderSpeedAnimation = 600,
				    margin = 0,
				    navigation = true,
				    pagination = false,
				    padding = false;

			    if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false) {
				    numberOfItems = slider.data('number-of-items');
			    }
			    if (slider.data('enable-loop') === 'no') {
				    loop = false;
			    }
			    if (slider.data('enable-autoplay') === 'no') {
				    autoplay = false;
			    }
			    if (typeof slider.data('slider-speed') !== 'undefined' && slider.data('slider-speed') !== false) {
				    sliderSpeed = slider.data('slider-speed');
			    }
			    if (typeof slider.data('slider-speed-animation') !== 'undefined' && slider.data('slider-speed-animation') !== false) {
				    sliderSpeedAnimation = slider.data('slider-speed-animation');
			    }
			    if (typeof slider.data('margin') !== 'undefined' && slider.data('margin') !== false) {
				    margin = slider.data('margin');
			    }
			    if (slider.data('enable-navigation') === 'no') {
				    navigation = false;
			    }
			    if (slider.data('enable-pagination') === 'yes') {
				    pagination = true;
			    }
			    if (typeof slider.data('enable-padding') !== 'undefined' && slider.data('enable-padding') !== false && slider.data('enable-padding') === 'yes') {
				    padding = slider.outerWidth() * 0.1315789473684211;
			    }

			    if(navigation && pagination) {
				    slider.addClass('edgtf-slider-has-both-nav');
			    }

			    if (slideItemsNumber <= 1) {
				    loop       = false;
				    autoplay   = false;
				    navigation = false;
				    pagination = false;
			    }

			    var responsiveNumberOfItems1 = 1,
				    responsiveNumberOfItems2 = 2,
				    responsiveNumberOfItems3 = 3;

			    if (numberOfItems < 3) {
				    responsiveNumberOfItems2 = numberOfItems;
				    responsiveNumberOfItems3 = numberOfItems;
			    }

			    slider.owlCarousel({
				    items: numberOfItems,
				    loop: loop,
				    autoplay: autoplay,
				    autoplayTimeout: sliderSpeed,
				    smartSpeed: sliderSpeedAnimation,
				    margin: margin,
				    center: true,
				    autoWidth: true,
				    stagePadding: padding,
				    dots: pagination,
				    nav: navigation,
				    navText: [
					    '<span class="edgtf-prev-icon"><span class="ion-ios-arrow-left"></span></span>',
					    '<span class="edgtf-next-icon"><span class="ion-ios-arrow-right"></span></span>'
				    ],
				    responsive: {
					    0: {
						    items: responsiveNumberOfItems1,
						    margin: 0,
						    center: false,
						    autoWidth: false,
						    stagePadding: 0
					    },
					    680: {
						    items: responsiveNumberOfItems2,
						    margin: 0,
						    stagePadding: 0
					    },
					    769: {
						    items: responsiveNumberOfItems3
					    },
					    1024: {
						    items: numberOfItems
					    }
				    },
				    onInitialize: function () {
					    slider.css('visibility', 'visible');
					    edgtf.modules.parallax.edgtfInitParallax(); // reInit parallax function
				    }
			    });
		    });
	    }
    }
})(jQuery);