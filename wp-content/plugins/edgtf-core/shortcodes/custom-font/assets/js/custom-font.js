(function($) {
	'use strict';
	
	var customFont = {};
	edgtf.modules.customFont = customFont;
	
	customFont.edgtfCustomFontResize = edgtfCustomFontResize;
	
	
	customFont.edgtfOnDocumentReady = edgtfOnDocumentReady;
	customFont.edgtfOnWindowResize = edgtfOnWindowResize;
	
	$(document).ready(edgtfOnDocumentReady);
	$(window).resize(edgtfOnWindowResize);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfCustomFontResize();
	}
	
	/* 
	 All functions to be called on $(window).resize() should be in this function
	 */
	function edgtfOnWindowResize() {
		edgtfCustomFontResize();
	}
	
	/*
	 **	Custom Font resizing
	 */
	function edgtfCustomFontResize(){
		var customFont = $('.edgtf-custom-font-holder');
		
		if (customFont.length){
			customFont.each(function(){
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;
				
				if (edgtf.windowWidth < 1480){
					coef1 = 0.8;
				}
				
				if (edgtf.windowWidth < 1200){
					coef1 = 0.7;
				}
				
				if (edgtf.windowWidth < 768){
					coef1 = 0.55;
					coef2 = 0.65;
				}
				
				if (edgtf.windowWidth < 600){
					coef1 = 0.45;
					coef2 = 0.55;
				}
				
				if (edgtf.windowWidth < 480){
					coef1 = 0.4;
					coef2 = 0.5;
				}
				
				if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));
					
					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}
					
					thisCustomFont.css('font-size',fontSize + 'px');
				}
				
				if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));
					
					if (lineHeight > 70 && edgtf.windowWidth < 1440) {
						lineHeight = '1.2em';
					} else if (lineHeight > 35 && edgtf.windowWidth < 768) {
						lineHeight = '1.2em';
					} else {
						lineHeight += 'px';
					}
					
					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}
	
})(jQuery);