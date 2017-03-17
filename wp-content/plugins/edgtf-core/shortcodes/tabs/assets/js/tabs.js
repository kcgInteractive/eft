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