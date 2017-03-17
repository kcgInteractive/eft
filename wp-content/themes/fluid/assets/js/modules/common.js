(function($) {
	"use strict";

    var common = {};
    edgtf.modules.common = common;

    common.edgtfFluidVideo = edgtfFluidVideo;
	common.edgtfInitSelfHostedVideoPlayer = edgtfInitSelfHostedVideoPlayer;
	common.edgtfSelfHostedVideoSize = edgtfSelfHostedVideoSize;
    common.edgtfEnableScroll = edgtfEnableScroll;
    common.edgtfDisableScroll = edgtfDisableScroll;
    common.edgtfOwlSlider = edgtfOwlSlider;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;

    common.edgtfOnDocumentReady = edgtfOnDocumentReady;
    common.edgtfOnWindowLoad = edgtfOnWindowLoad;
    common.edgtfOnWindowResize = edgtfOnWindowResize;
    common.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
	    edgtfIconWithHover().init();
	    edgtfIEversion();
	    edgtfDisableSmoothScrollForMac();
	    edgtfInitAnchor().init();
	    edgtfInitBackToTop();
	    edgtfBackButtonShowHide();
	    edgtfInitSelfHostedVideoPlayer();
	    edgtfSelfHostedVideoSize();
	    edgtfFluidVideo();
	    edgtfOwlSlider();
	    edgtfPreloadBackgrounds();
	    edgtfPrettyPhoto();
	    edgtfAddingToCart();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfSmoothTransition();
	    edgtfRowAnimatedBackground();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfSelfHostedVideoSize();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
	    edgtfRowAnimatedBackground();
    }
	
	/*
	 * IE version
	 */
	function edgtfIEversion() {
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");
		
		if (msie > 0) {
			var version = parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
			edgtf.body.addClass('edgtf-ms-ie'+version);
		}
		return false;
	}
	
	/*
	 ** Disable smooth scroll for mac if smooth scroll is enabled
	 */
	function edgtfDisableSmoothScrollForMac() {
		var os = navigator.appVersion.toLowerCase();
		
		if (os.indexOf('mac') > -1 && edgtf.body.hasClass('edgtf-smooth-scroll')) {
			edgtf.body.removeClass('edgtf-smooth-scroll');
		}
	}
	
	function edgtfDisableScroll() {
		if (window.addEventListener) {
			window.addEventListener('DOMMouseScroll', edgtfWheel, false);
		}
		
		window.onmousewheel = document.onmousewheel = edgtfWheel;
		document.onkeydown = edgtfKeydown;
	}
	
	function edgtfEnableScroll() {
		if (window.removeEventListener) {
			window.removeEventListener('DOMMouseScroll', edgtfWheel, false);
		}
		
		window.onmousewheel = document.onmousewheel = document.onkeydown = null;
	}
	
	function edgtfWheel(e) {
		edgtfPreventDefaultValue(e);
	}
	
	function edgtfKeydown(e) {
		var keys = [37, 38, 39, 40];
		
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				edgtfPreventDefaultValue(e);
				return;
			}
		}
	}
	
	function edgtfPreventDefaultValue(e) {
		e = e || window.event;
		if (e.preventDefault) {
			e.preventDefault();
		}
		e.returnValue = false;
	}
	
	/*
	 **	Anchor functionality
	 */
	var edgtfInitAnchor = function() {
		/**
		 * Set active state on clicked anchor
		 * @param anchor, clicked anchor
		 */
		var setActiveState = function(anchor){
			
			$('.edgtf-main-menu .edgtf-active-item, .edgtf-mobile-nav .edgtf-active-item, .edgtf-fullscreen-menu .edgtf-active-item').removeClass('edgtf-active-item');
			anchor.parent().addClass('edgtf-active-item');
			
			$('.edgtf-main-menu a, .edgtf-mobile-nav a, .edgtf-fullscreen-menu a').removeClass('current');
			anchor.addClass('current');
		};
		
		/**
		 * Check anchor active state on scroll
		 */
		var checkActiveStateOnScroll = function(){
			
			$('[data-edgtf-anchor]').waypoint( function(direction) {
				if(direction === 'down') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("edgtf-anchor")+"']"));
				}
			}, { offset: '50%' });
			
			$('[data-edgtf-anchor]').waypoint( function(direction) {
				if(direction === 'up') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("edgtf-anchor")+"']"));
				}
			}, { offset: function(){
				return -($(this.element).outerHeight() - 150);
			} });
			
		};
		
		/**
		 * Check anchor active state on load
		 */
		var checkActiveStateOnLoad = function(){
			var hash = window.location.hash.split('#')[1];
			
			if(hash !== "" && $('[data-edgtf-anchor="'+hash+'"]').length > 0){
				anchorClickOnLoad(hash);
			}
		};
		
		/**
		 * Handle anchor on load
		 */
		var anchorClickOnLoad = function($this) {
			var scrollAmount;
			var anchor = $('a');
			var hash = $this;
			if(hash !== "" && $('[data-edgtf-anchor="' + hash + '"]').length > 0 ) {
				var anchoredElementOffset = $('[data-edgtf-anchor="' + hash + '"]').offset().top;
				scrollAmount = $('[data-edgtf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - edgtfGlobalVars.vars.edgtfAddForAdminBar;
				
				setActiveState(anchor);
				
				edgtf.html.stop().animate({
					scrollTop: Math.round(scrollAmount)
				}, 1000, function() {
					//change hash tag in url
					if(history.pushState) { history.pushState(null, null, '#'+hash); }
				});
				return false;
			}
		};
		
		/**
		 * Calculate header height to be substract from scroll amount
		 * @param anchoredElementOffset, anchorded element offest
		 */
		var headerHeihtToSubtract = function(anchoredElementOffset){
			
			if(edgtf.modules.header.behaviour === 'edgtf-sticky-header-on-scroll-down-up') {
				edgtf.modules.header.isStickyVisible = (anchoredElementOffset > edgtf.modules.header.stickyAppearAmount);
			}
			
			if(edgtf.modules.header.behaviour === 'edgtf-sticky-header-on-scroll-up') {
				if((anchoredElementOffset > edgtf.scroll)){
					edgtf.modules.header.isStickyVisible = false;
				}
			}
			
			var headerHeight = edgtf.modules.header.isStickyVisible ? edgtfGlobalVars.vars.edgtfStickyHeaderTransparencyHeight : edgtfPerPageVars.vars.edgtfHeaderTransparencyHeight;
			
			if(edgtf.windowWidth < 1025) {
				headerHeight = 0;
			}
			
			return headerHeight;
		};
		
		/**
		 * Handle anchor click
		 */
		var anchorClick = function() {
			edgtf.document.on("click", ".edgtf-main-menu a, .edgtf-fullscreen-menu a, .edgtf-btn, .edgtf-anchor, .edgtf-mobile-nav a", function() {
				var scrollAmount;
				var anchor = $(this);
				var hash = anchor.prop("hash").split('#')[1];
				
				if(hash !== "" && $('[data-edgtf-anchor="' + hash + '"]').length > 0 ) {
					
					var anchoredElementOffset = $('[data-edgtf-anchor="' + hash + '"]').offset().top;
					scrollAmount = $('[data-edgtf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - edgtfGlobalVars.vars.edgtfAddForAdminBar;
					
					setActiveState(anchor);
					
					edgtf.html.stop().animate({
						scrollTop: Math.round(scrollAmount)
					}, 1000, function() {
						//change hash tag in url
						if(history.pushState) { history.pushState(null, null, '#'+hash); }
					});
					return false;
				}
			});
		};
		
		return {
			init: function() {
				if($('[data-edgtf-anchor]').length) {
					anchorClick();
					checkActiveStateOnScroll();
					$(window).load(function() { checkActiveStateOnLoad(); });
				}
			}
		};
	};
	
	function edgtfInitBackToTop(){
		var backToTopButton = $('#edgtf-back-to-top');
		backToTopButton.on('click',function(e){
			e.preventDefault();
			edgtf.html.animate({scrollTop: 0}, edgtf.window.scrollTop()/2, 'easeInOutExpo');
		});
	}
	
	function edgtfBackButtonShowHide(){
		edgtf.window.scroll(function () {
			var b = $(this).scrollTop();
			var c = $(this).height();
			var d;
			if (b > 0) { d = b + c / 2; } else { d = 1; }
			if (d < 1e3) { edgtfToTopButton('off'); } else { edgtfToTopButton('on'); }
		});
	}
	
	function edgtfToTopButton(a) {
		var b = $("#edgtf-back-to-top");
		b.removeClass('off on');
		if (a === 'on') { b.addClass('on'); } else { b.addClass('off'); }
	}
	
	function edgtfInitSelfHostedVideoPlayer() {
		var players = $('.edgtf-self-hosted-video');
		
		if(players.length) {
			players.mediaelementplayer({
				audioWidth: '100%'
			});
		}
	}
	
	function edgtfSelfHostedVideoSize(){
		var selfVideoHolder = $('.edgtf-self-hosted-video-holder .edgtf-video-wrap');
		
		if(selfVideoHolder.length) {
			selfVideoHolder.each(function(){
				var thisVideo = $(this),
					videoWidth = thisVideo.closest('.edgtf-self-hosted-video-holder').outerWidth(),
					videoHeight = videoWidth / edgtf.videoRatio;
				
				if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
					thisVideo.parent().width(videoWidth);
					thisVideo.parent().height(videoHeight);
				}
				
				thisVideo.width(videoWidth);
				thisVideo.height(videoHeight);
				
				thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
				thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
			});
		}
	}

	function edgtfRowAnimatedBackground(){
		var animatedBg = $('.edgtf-row-animated-bg');

		if(animatedBg.length) {
			animatedBg.each(function(){
				var thisBg = $(this),
					thisBgHeight = thisBg.outerHeight(),
					thisBgTopPosition = thisBg.offset().top,
					thisBgBottomPosition = thisBgTopPosition + thisBgHeight,
					scroll = edgtf.scroll,
					start = thisBgTopPosition - edgtf.windowHeight,
					end = thisBgBottomPosition - thisBgHeight/2 - edgtf.windowHeight/2,
					animatedWidth = 0;
				
				if (scroll >= start && scroll <= end) {
					var delta = (scroll - start)/(end - start);

					animatedWidth = 0.68 + 0.32*delta;
					
					if(animatedWidth > 1) {
						animatedWidth = 1;
					} else if (animatedWidth < 0.68) {
						animatedWidth = 0.68;
					}

					thisBg.css({'transform': 'matrix('+animatedWidth+', 0, 0, 1, 0, 0)'});
				}
			});
		}
	}
	
	function edgtfFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}
	
	function edgtfSmoothTransition() {
		
		if (edgtf.body.hasClass('edgtf-smooth-page-transitions')) {
			
			//check for preload animation
			if (edgtf.body.hasClass('edgtf-smooth-page-transitions-preloader')) {
				var loader = $('body > .edgtf-smooth-transition-loader.edgtf-mimic-ajax');
				loader.fadeOut(500);
				$(window).bind("pageshow", function (event) {
					if (event.originalEvent.persisted) {
						loader.fadeOut(500);
					}
				});
			}
			
			//check for fade out animation
			if(edgtf.body.hasClass('edgtf-smooth-page-transitions-fadeout')) {
				var linkItem = $('a');
				
				linkItem.click(function (e) {
					var a = $(this);
					
					if ((a.parents('.edgtf-shopping-cart-dropdown').length || a.parent('.product-remove').length) && a.hasClass('remove')) {
						return false;
					}
					
					if (
						e.which == 1 && // check if the left mouse button has been pressed
						a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
						(typeof a.data('rel') === 'undefined') && //Not pretty photo link
						(typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
						(typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
						(a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
					) {
						e.preventDefault();
						$('.edgtf-wrapper-inner').fadeOut(1000, function () {
							window.location = a.attr('href');
						});
					}
				});
			}
		}
	}
	
	/*
	 *	Preload background images for elements that have 'edgtf-preload-background' class
	 */
	function edgtfPreloadBackgrounds(){
		var preloadBackHolder = $('.edgtf-preload-background');
		
		if(preloadBackHolder.length) {
			preloadBackHolder.each(function() {
				var preloadBackground = $(this);
				
				if(preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {
					var bgUrl = preloadBackground.attr('style');
					
					bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
					bgUrl = bgUrl ? bgUrl[1] : "";
					
					if (bgUrl) {
						var backImg = new Image();
						backImg.src = bgUrl;
						$(backImg).load(function(){
							preloadBackground.removeClass('edgtf-preload-background');
						});
					}
				} else {
					$(window).load(function(){ preloadBackground.removeClass('edgtf-preload-background'); }); //make sure that edgtf-preload-background class is removed from elements with forced background none in css
				}
			});
		}
	}
	
	function edgtfPrettyPhoto() {
		/*jshint multistr: true */
		var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';
		
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			hook: 'data-rel',
			animation_speed: 'normal', /* fast/slow/normal */
			slideshow: false, /* false OR interval time in ms */
			autoplay_slideshow: false, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			horizontal_padding: 0,
			default_width: 960,
			default_height: 540,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			deeplinking: false,
			custom_markup: '',
			social_tools: false,
			markup: markupWhole
		});
	}
	
	/**
	 * Initializes load more data params
	 * @param container with defined data params
	 * return array
	 */
	function getLoadMoreData(container){
		var dataList = container.data(),
			returnValue = {};
		
		for (var property in dataList) {
			if (dataList.hasOwnProperty(property)) {
				if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
					returnValue[property] = dataList[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Sets load more data params for ajax function
	 * @param container with defined data params
	 * return array
	 */
	function setLoadMoreAjaxData(container, action){
		var returnValue = {
			action: action
		};
		
		for (var property in container) {
			if (container.hasOwnProperty(property)) {
				
				if (typeof container[property] !== 'undefined' && container[property] !== false) {
					returnValue[property] = container[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Object that represents icon with hover data
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var edgtfIconWithHover = function() {
		//get all icons on page
		var icons = $('.edgtf-icon-has-hover');
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var hoverColor = icon.data('hover-color'),
					originalColor = icon.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: icon, color: originalColor}, changeIconColor);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconHoverColor($(this));
					});
				}
			}
		};
	};
	
	/**
	 * Init Owl Carousel
	 */
	function edgtfOwlSlider() {
		var sliders = $('.edgtf-owl-slider');
		
		if (sliders.length) {
			sliders.each(function(){
				var slider = $(this),
					slideItemsNumber = slider.children().length,
					numberOfItems = 1,
					loop = true,
					autoplay = true,
					autoplayHoverPause = true,
					sliderSpeed = 5000,
					sliderSpeedAnimation = 600,
					margin = 0,
					center = false,
					autoWidth = false,
					animateInClass = false, // keyframe css animation
					animateOut = false, // keyframe css animation
					navigation = true,
					pagination = false,
					padding = false,
					disableResponsive = false,
					tabletLandscapeItems = 0;
				
				if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false) {
					numberOfItems = slider.data('number-of-items');
				}
				if (slider.data('enable-loop') === 'no') {
					loop = false;
				}
				if (slider.data('enable-autoplay') === 'no') {
					autoplay = false;
				}
				if (slider.data('enable-autoplay-hover-pause') === 'no') {
					autoplayHoverPause = false;
				}
				if (typeof slider.data('slider-speed') !== 'undefined' && slider.data('slider-speed') !== false) {
					sliderSpeed = slider.data('slider-speed');
				}
				if (typeof slider.data('slider-speed-animation') !== 'undefined' && slider.data('slider-speed-animation') !== false) {
					sliderSpeedAnimation = slider.data('slider-speed-animation');
				}
				if (typeof slider.data('slider-margin') !== 'undefined' && slider.data('slider-margin') !== false) {
					margin = slider.data('slider-margin');
				}
				if(slider.parent().hasClass('edgtf-normal-space')) {
					margin = 30;
				} else if (slider.parent().hasClass('edgtf-small-space')) {
					margin = 20;
				} else if (slider.parent().hasClass('edgtf-tiny-space')) {
					margin = 10;
				}
				if (slider.data('enable-center') === 'yes') {
					center = true;
				}
				if (slider.data('enable-auto-width') === 'yes') {
					autoWidth = true;
				}
				if (typeof slider.data('slider-animate-in') !== 'undefined' && slider.data('slider-animate-in') !== false) {
					animateInClass = slider.data('slider-animate-in');
				}
				if (typeof slider.data('slider-animate-out') !== 'undefined' && slider.data('slider-animate-out') !== false) {
					animateOut = slider.data('slider-animate-out');
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
				if (slider.data('disable-responsive') === 'yes') {
					disableResponsive = true;
				}
				if (typeof slider.data('tablet-landscape-responsive-items') !== 'undefined' && slider.data('tablet-landscape-responsive-items') !== false) {
					tabletLandscapeItems = slider.data('tablet-landscape-responsive-items');
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
					responsiveNumberOfItems3 = 3,
					responsiveNumberOfItems4 = numberOfItems;
				
				if (numberOfItems < 3) {
					responsiveNumberOfItems2 = numberOfItems;
					responsiveNumberOfItems3 = numberOfItems;
				}
				
				if(tabletLandscapeItems > 0) {
					responsiveNumberOfItems4 = tabletLandscapeItems;
				}
				
				if(disableResponsive) {
					responsiveNumberOfItems1 = numberOfItems,
					responsiveNumberOfItems2 = numberOfItems,
					responsiveNumberOfItems3 = numberOfItems,
					responsiveNumberOfItems4 = numberOfItems;
				}

				slider.owlCarousel({
					items: numberOfItems,
					loop: loop,
					autoplay: autoplay,
					autoplayHoverPause: autoplayHoverPause,
					autoplayTimeout: sliderSpeed,
					smartSpeed: sliderSpeedAnimation,
					margin: margin,
					center: center,
					autoWidth: autoWidth,
					animateIn : animateInClass,
					animateOut : animateOut,
					stagePadding: padding,
					dots: pagination,
					nav: navigation,
					navText: [
						'<span class="edgtf-prev-icon"><span class="edgtf-icon-arrow ion-ios-arrow-left"></span></span>',
						'<span class="edgtf-next-icon"><span class="edgtf-icon-arrow ion-ios-arrow-right"></span></span>'
					],
					responsive: {
						0: {
							items: responsiveNumberOfItems1,
							margin: 0,
							center: false,
							autoWidth: false
						},
						680: {
							items: responsiveNumberOfItems2
						},
						769: {
							items: responsiveNumberOfItems3
						},
						1024: {
							items: responsiveNumberOfItems4
						},
						1280: {
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


	function edgtfAddingToCart() {
	    $(".add_to_cart_button").click(function(){
	        $(this).text(edgtfGlobalVars.vars.edgtfAddingToCart);
	    });

	}

})(jQuery);