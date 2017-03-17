(function($) {
    'use strict';
	
	var parallax = {};
	edgtf.modules.parallax = parallax;
	
	parallax.edgtfInitParallax = edgtfInitParallax;
	
	
	parallax.edgtfOnWindowLoad = edgtfOnWindowLoad;
	
	$(window).load(edgtfOnWindowLoad);
	
	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfInitParallax();
		
		if(edgtf.body.hasClass('wpb-js-composer') && typeof vc_rowBehaviour === 'function') {
			window.vc_rowBehaviour(); //call vc row behavior on load, this is for parallax on row since it is not loaded after some other shortcodes are loaded
		}
	}
	
	/*
	 ** Init parallax shortcode
	 */
	function edgtfInitParallax(){
		var parallaxHolder = $('.edgtf-parallax-holder');
		
		if(parallaxHolder.length){
			parallaxHolder.each(function() {
				var parallaxElement = $(this),
					speed = parallaxElement.data('parallax-speed')*0.4;
				
				parallaxElement.parallax('50%', speed);
			});
		}
	}

})(jQuery);