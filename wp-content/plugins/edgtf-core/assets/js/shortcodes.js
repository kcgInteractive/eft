(function($) {
    'use strict';
	
	var accordions = {};
	edgtf.modules.accordions = accordions;
	
	accordions.edgtfInitAccordions = edgtfInitAccordions;
	
	
	accordions.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitAccordions();
	}
	
	/**
	 * Init accordions shortcode
	 */
	function edgtfInitAccordions(){
		var accordion = $('.edgtf-accordion-holder');
		
		if(accordion.length){
			accordion.each(function(){
				var thisAccordion = $(this);

				if(thisAccordion.hasClass('edgtf-accordion')){
					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('edgtf-toggle')){
					var toggleAccordion = $(this),
						toggleAccordionTitle = toggleAccordion.find('.edgtf-title-holder'),
						toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function(){
						var thisTitle = $(this);
						
						thisTitle.hover(function(){
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click',function(){
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
			});
		}
	}

})(jQuery);
(function($) {
	'use strict';
	
	var animationHolder = {};
	edgtf.modules.animationHolder = animationHolder;
	
	animationHolder.edgtfInitAnimationHolder = edgtfInitAnimationHolder;
	
	
	animationHolder.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitAnimationHolder();
	}
	
	/*
	 *	Init animation holder shortcode
	 */
	function edgtfInitAnimationHolder(){
		var elements = $('.edgtf-grow-in, .edgtf-fade-in-down, .edgtf-element-from-fade, .edgtf-element-from-left, .edgtf-element-from-right, .edgtf-element-from-top, .edgtf-element-from-bottom, .edgtf-flip-in, .edgtf-x-rotate, .edgtf-z-rotate, .edgtf-y-translate, .edgtf-fade-in, .edgtf-fade-in-left-x-rotate'),
			animationClass,
			animationData,
			animationDelay;
		
		if(elements.length){
			elements.each(function(){
				var thisElement = $(this);
				
				thisElement.appear(function() {
					animationData = thisElement.data('animation');
					animationDelay = parseInt(thisElement.data('animation-delay'));
					
					if(typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						var newClass = animationClass+'-on';
						
						setTimeout(function(){
							thisElement.addClass(newClass);
						},animationDelay);
					}
				},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var button = {};
	edgtf.modules.button = button;
	
	button.edgtfButton = edgtfButton;
	
	
	button.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfButton().init();
	}
	
	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var edgtfButton = function() {
		//all buttons on the page
		var buttons = $('.edgtf-btn');
		
		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function(button) {
			if(typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function(event) {
					event.data.button.css('color', event.data.color);
				};
				
				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');
				
				button.on('mouseenter', { button: button, color: hoverColor }, changeButtonColor);
				button.on('mouseleave', { button: button, color: originalColor }, changeButtonColor);
			}
		};
		
		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function(button) {
			if(typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function(event) {
					event.data.button.css('background-color', event.data.color);
				};
				
				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');
				
				button.on('mouseenter', { button: button, color: hoverBgColor }, changeButtonBg);
				button.on('mouseleave', { button: button, color: originalBgColor }, changeButtonBg);
			}
		};
		
		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function(button) {
			if(typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function(event) {
					event.data.button.css('border-color', event.data.color);
				};
				
				var originalBorderColor = button.css('border-color'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');
				
				button.on('mouseenter', { button: button, color: hoverBorderColor }, changeBorderColor);
				button.on('mouseleave', { button: button, color: originalBorderColor }, changeBorderColor);
			}
		};
		
		return {
			init: function() {
				if(buttons.length) {
					buttons.each(function() {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
(function($) {
	'use strict';
	
	var countdown = {};
	edgtf.modules.countdown = countdown;
	
	countdown.edgtfInitCountdown = edgtfInitCountdown;
	
	
	countdown.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitCountdown();
	}
	
	/**
	 * Countdown Shortcode
	 */
	function edgtfInitCountdown() {
		var countdowns = $('.edgtf-countdown'),
			date = new Date(),
			currentMonth = date.getMonth(),
			year,
			month,
			day,
			hour,
			minute,
			timezone,
			monthLabel,
			dayLabel,
			hourLabel,
			minuteLabel,
			secondLabel;
		
		if (countdowns.length) {
			countdowns.each(function(){
				//Find countdown elements by id-s
				var countdownId = $(this).attr('id'),
					countdown = $('#'+countdownId),
					digitFontSize,
					labelFontSize;
				
				//Get data for countdown
				year = countdown.data('year');
				month = countdown.data('month');
				day = countdown.data('day');
				hour = countdown.data('hour');
				minute = countdown.data('minute');
				timezone = countdown.data('timezone');
				monthLabel = countdown.data('month-label');
				dayLabel = countdown.data('day-label');
				hourLabel = countdown.data('hour-label');
				minuteLabel = countdown.data('minute-label');
				secondLabel = countdown.data('second-label');
				digitFontSize = countdown.data('digit-size');
				labelFontSize = countdown.data('label-size');

				if( currentMonth != month ) {
					month = month - 1;
				}
				
				//Initialize countdown
				countdown.countdown({
					until: new Date(year, month, day, hour, minute, 44),
					labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
					format: 'ODHMS',
					timezone: timezone,
					padZeroes: true,
					onTick: setCountdownStyle
				});
				
				function setCountdownStyle() {
					countdown.find('.countdown-amount').css({
						'font-size' : digitFontSize+'px',
						'line-height' : digitFontSize+'px'
					});
					countdown.find('.countdown-period').css({
						'font-size' : labelFontSize+'px'
					});
				}
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var counter = {};
	edgtf.modules.counter = counter;
	
	counter.edgtfInitCounter = edgtfInitCounter;
	
	
	counter.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitCounter();
	}
	
	/**
	 * Counter Shortcode
	 */
	function edgtfInitCounter() {
		var counterHolder = $('.edgtf-counter-holder');
		
		if (counterHolder.length) {
			counterHolder.each(function() {
				var thisCounterHolder = $(this),
					thisCounter = thisCounterHolder.find('.edgtf-counter');
				
				thisCounterHolder.appear(function() {
					thisCounterHolder.css('opacity', '1');
					
					//Counter zero type
					if (thisCounter.hasClass('edgtf-zero-counter')) {
						var max = parseFloat(thisCounter.text());
						thisCounter.countTo({
							from: 0,
							to: max,
							speed: 1500,
							refreshInterval: 100
						});
					} else {
						thisCounter.absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					}
				},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			});
		}
	}
	
})(jQuery);
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
(function($) {
	'use strict';
	
	var elementsHolder = {};
	edgtf.modules.elementsHolder = elementsHolder;
	
	elementsHolder.edgtfInitElementsHolderResponsiveStyle = edgtfInitElementsHolderResponsiveStyle;
	
	
	elementsHolder.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitElementsHolderResponsiveStyle();
	}
	
	/*
	 **	Elements Holder responsive style
	 */
	function edgtfInitElementsHolderResponsiveStyle(){
		var elementsHolder = $('.edgtf-elements-holder');
		
		if(elementsHolder.length){
			elementsHolder.each(function() {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.edgtf-eh-item'),
					style = '',
					responsiveStyle = '';
				
				elementsHolderItem.each(function() {
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
					
					if(largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {
						
						if(largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1600px) {.edgtf-eh-item-content."+itemClass+" { padding: "+largeLaptop+" !important; } }";
						}
						if(smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.edgtf-eh-item-content."+itemClass+" { padding: "+smallLaptop+" !important; } }";
						}
						if(ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.edgtf-eh-item-content."+itemClass+" { padding: "+ipadLandscape+" !important; } }";
						}
						if(ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.edgtf-eh-item-content."+itemClass+" { padding: "+ipadPortrait+" !important; } }";
						}
						if(mobileLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.edgtf-eh-item-content."+itemClass+" { padding: "+mobileLandscape+" !important; } }";
						}
						if(mobilePortrait.length) {
							responsiveStyle += "@media only screen and (max-width: 480px) {.edgtf-eh-item-content."+itemClass+" { padding: "+mobilePortrait+" !important; } }";
						}
					}
				});
				
				if(responsiveStyle.length) {
					style = '<style type="text/css" data-type="fluid_edge_shortcodes_custom_css">'+responsiveStyle+'</style>';
				}
				
				if(style.length) {
					$('head').append(style);
				}
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var expandedGallery = {};
	edgtf.modules.expandedGallery = expandedGallery;

	expandedGallery.edgtfInitExpandedGallery = edgtfInitExpandedGallery;


	expandedGallery.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitExpandedGallery();
	}

	/*
	 **	Init Expanded Gallery shortcode
	 */
	function edgtfInitExpandedGallery(){
		var holder = $('.edgtf-expanded-gallery');

		if(holder.length){
			holder.each(function() {
				var thisHolder = $(this),
					thisHolderImages = thisHolder.find('.edgtf-eg-image');

				thisHolder.find('.edgtf-eg-image:nth-child('+Math.ceil(thisHolderImages.length / 2)+')').addClass('edgtf-eg-middle-item');

				thisHolder.appear(function() {
					thisHolder.find('.edgtf-eg-middle-item').addClass('edgtf-eg-show');

					setTimeout(function(){
						thisHolder.find('.edgtf-eg-middle-item').prev().addClass('edgtf-eg-show');
						thisHolder.find('.edgtf-eg-middle-item').next().addClass('edgtf-eg-show');
					},250);

					if (thisHolder.hasClass('edgtf-eg-five')) {
						setTimeout(function(){
							thisHolder.find('.edgtf-eg-middle-item').prev().prev().addClass('edgtf-eg-show');
							thisHolder.find('.edgtf-eg-middle-item').next().next().addClass('edgtf-eg-show');
						},500);
					}
				}, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var googleMap = {};
	edgtf.modules.googleMap = googleMap;
	
	googleMap.edgtfShowGoogleMap = edgtfShowGoogleMap;
	
	
	googleMap.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfShowGoogleMap();
	}
	
	/*
	 **	Show Google Map
	 */
	function edgtfShowGoogleMap(){
		var googleMap = $('.edgtf-google-map');
		
		if(googleMap.length){
			googleMap.each(function(){
				var element = $(this);
				
				var customMapStyle;
				if(typeof element.data('custom-map-style') !== 'undefined') {
					customMapStyle = element.data('custom-map-style');
				}
				
				var colorOverlay;
				if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
					colorOverlay = element.data('color-overlay');
				}
				
				var saturation;
				if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
					saturation = element.data('saturation');
				}
				
				var lightness;
				if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
					lightness = element.data('lightness');
				}
				
				var zoom;
				if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
					zoom = element.data('zoom');
				}
				
				var pin;
				if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
					pin = element.data('pin');
				}
				
				var mapHeight;
				if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
					mapHeight = element.data('height');
				}
				
				var uniqueId;
				if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
					uniqueId = element.data('unique-id');
				}
				
				var scrollWheel;
				if(typeof element.data('scroll-wheel') !== 'undefined') {
					scrollWheel = element.data('scroll-wheel');
				}
				var addresses;
				if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
					addresses = element.data('addresses');
				}
				
				var map = "map_"+ uniqueId;
				var geocoder = "geocoder_"+ uniqueId;
				var holderId = "edgtf-map-"+ uniqueId;
				
				edgtfInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin,  map, geocoder, addresses);
			});
		}
	}
	
	/*
	 **	Init Google Map
	 */
	function edgtfInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){
		
		var mapStyles = [
			{
				stylers: [
					{hue: color },
					{saturation: saturation},
					{lightness: lightness},
					{gamma: 1}
				]
			}
		];
		
		var googleMapStyleId;
		
		if(customMapStyle === 'yes'){
			googleMapStyleId = 'edgtf-style';
		} else {
			googleMapStyleId = google.maps.MapTypeId.ROADMAP;
		}
		
		if(wheel === 'yes'){
			wheel = true;
		} else {
			wheel = false;
		}
		
		var qoogleMapType = new google.maps.StyledMapType(mapStyles,
			{name: "Edge Google Map"});
		
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		
		if (!isNaN(height)){
			height = height + 'px';
		}
		
		var myOptions = {
			zoom: zoom,
			scrollwheel: wheel,
			center: latlng,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			scaleControl: false,
			scaleControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			streetViewControl: false,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeControl: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'edgtf-style'],
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeId: googleMapStyleId
		};
		
		map = new google.maps.Map(document.getElementById(holderId), myOptions);
		map.mapTypes.set('edgtf-style', qoogleMapType);
		
		var index;
		
		for (index = 0; index < data.length; ++index) {
			edgtfInitializeGoogleAddress(data[index], pin, map, geocoder);
		}
		
		var holderElement = document.getElementById(holderId);
		holderElement.style.height = height;
	}
	
	/*
	 **	Init Google Map Addresses
	 */
	function edgtfInitializeGoogleAddress(data, pin, map, geocoder){
		if (data === '') {
			return;
		}
		
		var contentString = '<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<div id="bodyContent">'+
			'<p>'+data+'</p>'+
			'</div>'+
			'</div>';
		
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		
		geocoder.geocode( { 'address': data}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					icon:  pin,
					title: data.store_title
				});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
				
				google.maps.event.addDomListener(window, 'resize', function() {
					map.setCenter(results[0].geometry.location);
				});
			}
		});
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var icon = {};
	edgtf.modules.icon = icon;
	
	icon.edgtfIcon = edgtfIcon;
	
	
	icon.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfIcon().init();
	}
	
	/**
	 * Object that represents icon shortcode
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var edgtfIcon = function() {
		var icons = $('.edgtf-icon-shortcode');
		
		/**
		 * Function that triggers icon animation and icon animation delay
		 */
		var iconAnimation = function(icon) {
			if(icon.hasClass('edgtf-icon-animation')) {
				icon.appear(function() {
					icon.parent('.edgtf-icon-animation-holder').addClass('edgtf-icon-animation-show');
				}, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			}
		};
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var iconElement = icon.find('.edgtf-icon-element');
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};
		
		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconHolderBackgroundHover = function(icon) {
			if(typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function(event) {
					event.data.icon.css('background-color', event.data.color);
				};
				
				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = icon.css('background-color');
				
				if(hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};
		
		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconHolderBorderHover = function(icon) {
			if(typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function(event) {
					event.data.icon.css('border-color', event.data.color);
				};
				
				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = icon.css('border-color');
				
				if(hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconAnimation($(this));
						iconHoverColor($(this));
						iconHolderBackgroundHover($(this));
						iconHolderBorderHover($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
(function($) {
	'use strict';
	
	var iconListItem = {};
	edgtf.modules.iconListItem = iconListItem;
	
	iconListItem.edgtfInitIconList = edgtfInitIconList;
	
	
	iconListItem.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitIconList().init();
	}
	
	/**
	 * Button object that initializes icon list with animation
	 * @type {Function}
	 */
	var edgtfInitIconList = function() {
		var iconList = $('.edgtf-animate-list');
		
		/**
		 * Initializes icon list animation
		 * @param list current slider
		 */
		var iconListInit = function(list) {
			setTimeout(function(){
				list.appear(function(){
					list.addClass('edgtf-appeared');
				},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			},30);
		};
		
		return {
			init: function() {
				if(iconList.length) {
					iconList.each(function() {
						iconListInit($(this));
					});
				}
			}
		};
	};
	
})(jQuery);
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
(function($) {
	'use strict';
	
	var itemShowcase = {};
	edgtf.modules.itemShowcase = itemShowcase;
	
	itemShowcase.edgtfInitItemShowcase = edgtfInitItemShowcase;
	
	
	itemShowcase.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitItemShowcase();
	}
	
	/**
	 * Init item showcase shortcode
	 */
	function edgtfInitItemShowcase() {
		var itemShowcase = $('.edgtf-item-showcase-holder');

		if (itemShowcase.length) {
			itemShowcase.each(function(){
				var thisItemShowcase = $(this),
					leftItems = thisItemShowcase.find('.edgtf-is-left'),
					rightItems = thisItemShowcase.find('.edgtf-is-right'),
					itemImage = thisItemShowcase.find('.edgtf-is-image');

				//logic
				leftItems.wrapAll( "<div class='edgtf-is-item-holder edgtf-is-left-holder' />");
				rightItems.wrapAll( "<div class='edgtf-is-item-holder edgtf-is-right-holder' />");
				thisItemShowcase.animate({opacity:1},200);

				setTimeout(function(){
					thisItemShowcase.appear(function(){
						itemImage.addClass('edgtf-appeared');
						thisItemShowcase.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
							function(e) {
								if(edgtf.windowWidth > 1200) {
									itemAppear('.edgtf-is-left-holder .edgtf-is-item');
									itemAppear('.edgtf-is-right-holder .edgtf-is-item');
								} else {
									itemAppear('.edgtf-is-item');
								}
							});
					},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
				},100);

				//appear animation trigger
				function itemAppear(itemCSSClass) {
					thisItemShowcase.find(itemCSSClass).each(function(i){
						var thisListItem = $(this);
						setTimeout(function(){
							thisListItem.addClass('edgtf-appeared');
						}, i*150);
					});
				}
			});
		}
	}
	
})(jQuery);
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
(function($) {
	'use strict';

	var pieChart = {};
	edgtf.modules.pieChart = pieChart;

	pieChart.edgtfInitPieChart = edgtfInitPieChart;


	pieChart.edgtfOnDocumentReady = edgtfOnDocumentReady;

	$(document).ready(edgtfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitPieChart();
	}

	/**
	 * Init Pie Chart shortcode
	 */
	function edgtfInitPieChart() {
		var pieChartHolder = $('.edgtf-pie-chart-holder');

		if (pieChartHolder.length) {
			pieChartHolder.each(function () {
				var thisPieChartHolder = $(this),
					pieChart = thisPieChartHolder.children('.edgtf-pc-percentage'),
					hasGradient = pieChart.hasClass('edgtf-pc-percentage-gradient'),
					barColor = '#25abd1',
					trackColor = '#f7f7f7',
					lineWidth = 5,
					size = 176;

				if(typeof pieChart.data('size') !== 'undefined' && pieChart.data('size') !== '') {
					size = pieChart.data('size');
				}

				if(!hasGradient && typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
					barColor = pieChart.data('bar-color');
				}

				if(typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
					trackColor = pieChart.data('track-color');
				}

				if(typeof pieChart.data('line-width') !== 'undefined' && pieChart.data('line-width') !== '') {
					lineWidth = pieChart.data('line-width');
				}

				pieChart.appear(function() {
					initToCounterPieChart(pieChart);
					thisPieChartHolder.css('opacity', '1');

					if(hasGradient) {
						var element = document.querySelectorAll('.edgtf-pc-percentage-gradient');

						for( var n = 0; element.length > n; n++ ) {
							new EasyPieChart(element[n], {
								barColor: function (percent) {
									var ctx = this.renderer.ctx(),
										canvas = this.renderer.canvas(),
										gradient = ctx.createLinearGradient(0, 0, canvas.width / 2, 50),
										gradient1 = pieChart.data('bar-1st-color'),
										gradient2 = pieChart.data('bar-2nd-color');

									gradient.addColorStop(0, gradient1);
									gradient.addColorStop(1, gradient2);

									return gradient;
								},
								trackColor: trackColor,
								scaleColor: false,
								lineCap: 'butt',
								lineWidth: lineWidth,
								animate: 1000,
								size: size
							});
						}
					} else {
						pieChart.easyPieChart({
							barColor: barColor,
							trackColor: trackColor,
							scaleColor: false,
							lineCap: 'butt',
							lineWidth: lineWidth,
							animate: 1000,
							size: size
						});
					}
				},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
			});
		}
	}

	/*
	 **	Counter for pie chart number from zero to defined number
	 */
	function initToCounterPieChart(pieChart){
		var counter = pieChart.find('.edgtf-pc-percent'),
			max = parseFloat(counter.text());

		counter.countTo({
			from: 0,
			to: max,
			speed: 1500,
			refreshInterval: 50
		});
	}

})(jQuery);
(function($) {
	'use strict';
	
	var progressBar = {};
	edgtf.modules.progressBar = progressBar;
	
	progressBar.edgtfInitProgressBars = edgtfInitProgressBars;
	
	
	progressBar.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitProgressBars();
	}
	
	/*
	 **	Horizontal progress bars shortcode
	 */
	function edgtfInitProgressBars(){
		var progressBar = $('.edgtf-progress-bar');
		var isGradient = false;

		if( progressBar.hasClass('edgtf-has-gradient') ) {
			isGradient = true;
		}

		if(progressBar.length){
			progressBar.each(function() {
				var thisBar = $(this),
					thisBarContent = thisBar.find('.edgtf-pb-content'),
					percentage = thisBarContent.data('percentage');
				
				thisBar.appear(function() {
					edgtfInitToCounterProgressBar(thisBar, percentage, isGradient);
					
					thisBarContent.css('width', '0%');
					thisBarContent.animate({'width': percentage+'%'}, 2000);
				});
			});
		}
	}
	
	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function edgtfInitToCounterProgressBar(progressBar, $percentage, $isGradient){
		var percentage = parseFloat($percentage),
			percent = progressBar.find('.edgtf-pb-percent');
		
		if(percent.length) {
			percent.each(function() {
				var thisPercent = $(this).find('.edgtf-pb-percent-inner');
				thisPercent.css('opacity', '1');
				
				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 2000,
					refreshInterval: 50
				});

				if($isGradient) {
					var position = percent.data('position');

					percent.addClass('edgtf-active');
					percent.animate({'left': position+'%'}, 2000);
				}
			});
		}
	}
	
})(jQuery);
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
(function($) {
	'use strict';
	
	var stackedImages = {};
	edgtf.modules.stackedImages = stackedImages;

	stackedImages.edgtfInitItemShowcase = edgtfInitStackedImages;


	stackedImages.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitStackedImages();
	}
	
	/**
	 * Init item showcase shortcode
	 */
	function edgtfInitStackedImages() {
		var stackedImages = $('.edgtf-stacked-images-holder');

		if (stackedImages.length) {
			stackedImages.each(function(){
				var thisStackedImages = $(this),
					itemImage = thisStackedImages.find('.edgtf-si-images');

				//logic
				thisStackedImages.animate({opacity:1},200);

				setTimeout(function(){
					thisStackedImages.appear(function(){
						itemImage.addClass('edgtf-appeared');
					},{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
				},100);
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var tabs = {};
	edgtf.modules.tabs = tabs;
	
	tabs.edgtfInitTabs = edgtfInitTabs;
	tabs.edgtfTabsNavUnderline = edgtfTabsNavUnderline;
	
	
	tabs.edgtfOnDocumentReady = edgtfOnDocumentReady;
	tabs.edgtfOnWindowLoad = edgtfOnWindowLoad;
	
	$(document).ready(edgtfOnDocumentReady);
	$(window).load(edgtfOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitTabs();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfTabsNavUnderline();
	}
	
	/*
	 **	Init tabs shortcode
	 */
	function edgtfInitTabs(){
		var tabs = $('.edgtf-tabs');
		
		if(tabs.length){
			tabs.each(function(){
				var thisTabs = $(this);
				
				thisTabs.children('.edgtf-tab-container').each(function(index){
					index = index + 1;
					var that = $(this),
						link = that.attr('id'),
						navItem = that.parent().find('.edgtf-tabs-nav li:nth-child('+index+') a'),
						navLink = navItem.attr('href');
					
					link = '#'+link;
					
					if(link.indexOf(navLink) > -1) {
						navItem.attr('href',link);
					}
				});
				
				thisTabs.tabs();
			});
		}
	}

	/*
	 * Tabs nav underline animation
	 */
	function edgtfTabsNavUnderline() {
		//first level menu
		var tabs         = $('.edgtf-tabs'),
			simpleTabs   = 'edgtf-tabs-simple',
			verticalTabs = 'edgtf-tabs-vertical';

		if(tabs.length && tabs.hasClass(simpleTabs)) {
			$('.'+simpleTabs).each(function(){
				var tabNav = $(this),
					tabNavs = tabNav.find('.edgtf-tabs-nav'),
					navItemActive = tabNavs.find('.ui-state-active'),
					navLine = tabNav.find('.edgtf-tabs-nav-line'),
					navItems = tabNavs.find('> li');

				var navLineParams = function() {
					var navItemActive = tabNavs.find('.ui-state-active');
					navLine.css('width', navItemActive.outerWidth() - 50);
					navLine.css('left', navItemActive.offset().left - tabNavs.offset().left + 25);
					navLine.css('opacity', 1);
				};

				if( navItemActive.length ) {
					navLineParams();
				} else {
					navLine.css('left', navItems.first().offset().left - tabNavs.offset().left + 25);
				}

				navItems.each(function(){
					var navItem = $(this),
						navItemWidth = navItem.outerWidth() - 50,
						navMenuOffset = tabNavs.offset().left,
						navItemOffset = navItem.offset().left - navMenuOffset + 25;

					navItem.mouseenter(function(){
						navLine.css('width', navItemWidth);
						navLine.css('left', navItemOffset);
					});
				});

				tabNavs.mouseleave(function(){
					navLineParams();
				});
			});
		}

		//vertical tabs
		if(tabs.length && tabs.hasClass(verticalTabs)) {
			$('.'+verticalTabs).each(function(){
				var tabNav = $(this),
					tabNavs = tabNav.find('.edgtf-tabs-nav'),
					navItemActive = tabNavs.find('.ui-state-active'),
					navLine = tabNav.find('.edgtf-tabs-nav-line'),
					navItems = tabNavs.find('> li'),
					setIdleState = false;

				var navLineParams = function() {
					var navItemActive = tabNavs.find('.ui-state-active');
					navLine.css('height', navItemActive.outerHeight());
					navLine.css('top', navItemActive.offset().top - tabNavs.offset().top);
					navLine.css('opacity', 1);
				};

				if( navItemActive.length ) {
					navLineParams();
				}

				navItems.each(function(){
					var navItem = $(this),
						navItemHeight = navItem.outerHeight(),
						verticalNavOffset = tabNavs.offset().top,
						navItemOffset = navItem.offset().top  - verticalNavOffset;

					if (!setIdleState) {
						navLine.css('top', navItemOffset);
						setIdleState = true;
					}

					navItem.mouseenter(function(){
						navLine.css('height', navItemHeight);
						navLine.css('top', navItemOffset);
					});
				});

				tabNavs.mouseleave(function(){
					navLineParams();
				});
			});
		}
	}
	
})(jQuery);
(function($) {
	'use strict';
	
	var verticalSplitSlider = {};
	edgtf.modules.verticalSplitSlider = verticalSplitSlider;
	
	verticalSplitSlider.edgtfInitVerticalSplitSlider = edgtfInitVerticalSplitSlider;
	
	
	verticalSplitSlider.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitVerticalSplitSlider();
	}
	
	/*
	 **	Vertical Split Slider
	 */
	function edgtfInitVerticalSplitSlider() {
		var slider = $('.edgtf-vertical-split-slider');
		
		if (slider.length) {
			if (edgtf.body.hasClass('edgtf-vss-initialized')) {
				edgtf.body.removeClass('edgtf-vss-initialized');
				$.fn.multiscroll.destroy();
			}
			
			slider.height(edgtf.windowHeight).animate({opacity: 1}, 300);
			
			var defaultHeaderStyle = '';
			if (edgtf.body.hasClass('edgtf-light-header')) {
				defaultHeaderStyle = 'light';
			} else if (edgtf.body.hasClass('edgtf-dark-header')) {
				defaultHeaderStyle = 'dark';
			}
			
			slider.multiscroll({
				scrollingSpeed: 700,
				easing: 'easeInOutQuart',
				navigation: true,
				useAnchorsOnLoad: false,
				sectionSelector: '.edgtf-vss-ms-section',
				leftSelector: '.edgtf-vss-ms-left',
				rightSelector: '.edgtf-vss-ms-right',
				afterRender: function () {
					edgtfCheckVerticalSplitSectionsForHeaderStyle($('.edgtf-vss-ms-left .edgtf-vss-ms-section:last-child').data('header-style'), defaultHeaderStyle);
					edgtf.body.addClass('edgtf-vss-initialized');
					
					var contactForm7 = $('div.wpcf7 > form');
					if (contactForm7.length) {
						_wpcf7.supportHtml5 = $.wpcf7SupportHtml5();
						contactForm7.wpcf7InitForm();
					} // this function need to be initialized after initVerticalSplitSlide
					
					//prepare html for smaller screens - start //
					var verticalSplitSliderResponsive = $('<div class="edgtf-vss-responsive"></div>'),
						leftSide = slider.find('.edgtf-vss-ms-left > div'),
						rightSide = slider.find('.edgtf-vss-ms-right > div');
					
					slider.after(verticalSplitSliderResponsive);
					
					for (var i = 0; i < leftSide.length; i++) {
						verticalSplitSliderResponsive.append($(leftSide[i]).clone(true));
						verticalSplitSliderResponsive.append($(rightSide[leftSide.length - 1 - i]).clone(true));
					}
					
					//prepare google maps clones
					var googleMapHolder = $('.edgtf-vss-responsive .edgtf-google-map');
					if (googleMapHolder.length) {
						googleMapHolder.each(function () {
							var map = $(this);
							map.empty();
							var num = Math.floor((Math.random() * 100000) + 1);
							map.attr('id', 'edgtf-map-' + num);
							map.data('unique-id', num);
						});
					}
					
					if (typeof edgtf.modules.button.edgtfButton === "function") {
						edgtf.modules.button.edgtfButton().init();
					}
					
					if (typeof edgtf.modules.elementsHolder.edgtfInitElementsHolderResponsiveStyle === "function") {
						edgtf.modules.elementsHolder.edgtfInitElementsHolderResponsiveStyle();
					}
					
					if (typeof edgtf.modules.googleMap.edgtfShowGoogleMap === "function") {
						edgtf.modules.googleMap.edgtfShowGoogleMap();
					}
					
					if (typeof edgtf.modules.icon.edgtfIcon === "function") {
						edgtf.modules.icon.edgtfIcon().init();
					}
					
					if (typeof edgtf.modules.progressBar.edgtfInitProgressBars === "function") {
						edgtf.modules.progressBar.edgtfInitProgressBars();
					}
				},
				onLeave: function (index, nextIndex, direction) {
					edgtfCheckVerticalSplitSectionsForHeaderStyle($($('.edgtf-vss-ms-left .edgtf-vss-ms-section')[$(".edgtf-vss-ms-left .edgtf-vss-ms-section").length - nextIndex]).data('header-style'), defaultHeaderStyle);
				}
			});
			
			if (edgtf.windowWidth <= 1024) {
				$.fn.multiscroll.destroy();
			} else {
				$.fn.multiscroll.build();
			}
			
			$(window).resize(function () {
				if (edgtf.windowWidth <= 1024) {
					$.fn.multiscroll.destroy();
				} else {
					$.fn.multiscroll.build();
				}
			});
		}
	}
	
	/*
	 **	Check slides on load and slide change for header style changing
	 */
	function edgtfCheckVerticalSplitSectionsForHeaderStyle(section_header_style, default_header_style) {
		if (section_header_style !== undefined && section_header_style !== '') {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header').addClass('edgtf-' + section_header_style + '-header');
		} else if (default_header_style !== '') {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header').addClass('edgtf-' + default_header_style + '-header');
		} else {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header');
		}
	}
	
})(jQuery);