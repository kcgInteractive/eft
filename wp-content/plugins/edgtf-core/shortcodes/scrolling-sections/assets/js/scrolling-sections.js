(function ($) {
	'use strict';
	
	var scrollingSections = {};
	edgtf.modules.scrollingSections = scrollingSections;
	
	scrollingSections.edgtfInitScrollingSections = edgtfInitScrollingSections;
	
	
	scrollingSections.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitScrollingSections().init();
	}
	
	/*
	 **	Scrolling Sections Holder responsive style
	 */
	function edgtfInitScrollingSections() {
		var container = $('.edgtf-scrolling-sections-holder');
		
		function initResponsiveStyle(scrollingSectionsItem) {
			var style = '',
				responsiveStyle = '';
			
			scrollingSectionsItem.each(function () {
				var thisItem = $(this),
					itemClass = '',
					largeLaptop = '',
					smallLaptop = '',
					ipadLandscape = '',
					ipadPortrait = '',
					mobileLandscape = '',
					mobilePortrait = '';
				
				if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
					itemClass = thisItem.data('item-class');
				}
				if (typeof thisItem.data('1280-1600') !== 'undefined' && thisItem.data('1280-1600') !== false) {
					largeLaptop = thisItem.data('1280-1600');
				}
				if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
					smallLaptop = thisItem.data('1024-1280');
				}
				if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
					ipadLandscape = thisItem.data('768-1024');
				}
				if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
					ipadPortrait = thisItem.data('600-768');
				}
				if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
					mobileLandscape = thisItem.data('480-600');
				}
				if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
					mobilePortrait = thisItem.data('480');
				}
				
				if (largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {
					
					if (largeLaptop.length) {
						responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1600px) {.edgtf-ss-item-content." + itemClass + " { padding: " + largeLaptop + " !important; } }";
					}
					if (smallLaptop.length) {
						responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.edgtf-ss-item-content." + itemClass + " { padding: " + smallLaptop + " !important; } }";
					}
					if (ipadLandscape.length) {
						responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.edgtf-ss-item-content." + itemClass + " { padding: " + ipadLandscape + " !important; } }";
					}
					if (ipadPortrait.length) {
						responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.edgtf-ss-item-content." + itemClass + " { padding: " + ipadPortrait + " !important; } }";
					}
					if (mobileLandscape.length) {
						responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.edgtf-ss-item-content." + itemClass + " { padding: " + mobileLandscape + " !important; } }";
					}
					if (mobilePortrait.length) {
						responsiveStyle += "@media only screen and (max-width: 480px) {.edgtf-ss-item-content." + itemClass + " { padding: " + mobilePortrait + " !important; } }";
					}
				}
			});
			
			if (responsiveStyle.length) {
				style = '<style type="text/css" data-type="fluid_edge_ss_shortcodes_custom_css">' + responsiveStyle + '</style>';
			}
			
			if (style.length) {
				$('head').append(style);
			}
		}
		
		function initScrollLogic(scrollingSectionsItem, containerBackgroundHolder) {
			scrollingSectionsItem.each(function () {
				var thisItem = $(this),
					firstItem = scrollingSectionsItem.first(),
					itemBackground = '',
					itemBackgroundImage = '',
					scroll = edgtf.scroll,
					windowBottomPosition = scroll + edgtf.windowHeight,
					itemTopPosition = thisItem.position().top,
					itemBottomPosition = itemTopPosition + thisItem.outerHeight();
				
				if (scroll === 0) {
					scrollingSectionsItem.removeClass('edgtf-item-in-view edgtf-active-item');
					firstItem.addClass('edgtf-item-in-view edgtf-active-item');
					
					if (typeof firstItem.data('background-color') !== 'undefined' && firstItem.data('background-color') !== false) {
						itemBackground = firstItem.data('background-color');
					}
					
					if (typeof firstItem.data('background-image') !== 'undefined' && firstItem.data('background-image') !== false) {
						itemBackgroundImage = firstItem.data('background-image');
					}
					
					if (itemBackground.length && !itemBackgroundImage.length) {
						containerBackgroundHolder.css({'background': itemBackground});
					}
					
					if (itemBackgroundImage.length) {
						containerBackgroundHolder.css({'background': 'url('+itemBackgroundImage+') center 0 no-repeat'});
					}
				}
				
				if (itemBottomPosition > scroll && itemTopPosition < windowBottomPosition) {
					thisItem.addClass('edgtf-item-in-view');
					scrollingSectionsItem.removeClass('edgtf-active-item').parent().find('.edgtf-ss-item.edgtf-item-in-view:last').addClass('edgtf-active-item');
					
					if (typeof thisItem.data('background-color') !== 'undefined' && thisItem.data('background-color') !== false) {
						itemBackground = thisItem.data('background-color');
					}
					
					if (typeof thisItem.data('background-image') !== 'undefined' && thisItem.data('background-image') !== false) {
						itemBackgroundImage = thisItem.data('background-image');
					}
					
					if (itemBackground.length && !itemBackgroundImage.length) {
						containerBackgroundHolder.css({'background': itemBackground});
					}
					
					if (itemBackgroundImage.length) {
						containerBackgroundHolder.css({'background': 'url('+itemBackgroundImage+') center 0 no-repeat'});
					}
				} else {
					thisItem.removeClass('edgtf-item-in-view');
				}
			});
		}
		
		return {
			init: function () {
				if (container.length) {
					container.each(function () {
						var thisContainer = $(this),
							containerBackgroundHolder = thisContainer.children('.edgtf-ss-background'),
							scrollingSectionsItem = thisContainer.children('.edgtf-ss-item');
						
						initResponsiveStyle(scrollingSectionsItem);
						
						$(window).load(function () {
							initScrollLogic(scrollingSectionsItem, containerBackgroundHolder);
						});
						
						$(window).resize(function () {
							initScrollLogic(scrollingSectionsItem, containerBackgroundHolder);
						});
						
						$(window).scroll(function () {
							initScrollLogic(scrollingSectionsItem, containerBackgroundHolder);
						});
					});
				}
			}
		};
	}
	
})(jQuery);