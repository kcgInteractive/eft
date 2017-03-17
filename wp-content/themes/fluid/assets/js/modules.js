(function($) {
    "use strict";

    window.edgtf = {};
    edgtf.modules = {};

    edgtf.scroll = 0;
    edgtf.window = $(window);
    edgtf.document = $(document);
    edgtf.windowWidth = $(window).width();
    edgtf.windowHeight = $(window).height();
    edgtf.body = $('body');
    edgtf.html = $('html, body');
    edgtf.htmlEl = $('html');
    edgtf.menuDropdownHeightSet = false;
    edgtf.defaultHeaderStyle = '';
    edgtf.minVideoWidth = 1500;
    edgtf.videoWidthOriginal = 1280;
    edgtf.videoHeightOriginal = 720;
    edgtf.videoRatio = 1.61;

    edgtf.edgtfOnDocumentReady = edgtfOnDocumentReady;
    edgtf.edgtfOnWindowLoad = edgtfOnWindowLoad;
    edgtf.edgtfOnWindowResize = edgtfOnWindowResize;
    edgtf.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtf.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(edgtf.body.hasClass('edgtf-dark-header')){ edgtf.defaultHeaderStyle = 'edgtf-dark-header';}
        if(edgtf.body.hasClass('edgtf-light-header')){ edgtf.defaultHeaderStyle = 'edgtf-light-header';}
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtf.windowWidth = $(window).width();
        edgtf.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
        edgtf.scroll = $(window).scrollTop();
    }

    //set boxed layout width variable for various calculations

    switch(true){
        case edgtf.body.hasClass('edgtf-grid-1300'):
            edgtf.boxedLayoutWidth = 1350;
            break;
        case edgtf.body.hasClass('edgtf-grid-1200'):
            edgtf.boxedLayoutWidth = 1250;
            break;
        case edgtf.body.hasClass('edgtf-grid-1000'):
            edgtf.boxedLayoutWidth = 1050;
            break;
        case edgtf.body.hasClass('edgtf-grid-800'):
            edgtf.boxedLayoutWidth = 850;
            break;
        default :
            edgtf.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
(function($) {
	"use strict";

    var blog = {};
    edgtf.modules.blog = blog;

    blog.edgtfOnDocumentReady = edgtfOnDocumentReady;
    blog.edgtfOnWindowLoad = edgtfOnWindowLoad;
    blog.edgtfOnWindowResize = edgtfOnWindowResize;
    blog.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitAudioPlayer();
        edgtfInitBlogMasonry();
        edgtfInitBlogListMasonry();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
	    edgtfInitBlogPagination().init();
	    edgtfInitBlogListShortcodePagination().init();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfInitBlogMasonry();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
	    edgtfInitBlogPagination().scroll();
	    edgtfInitBlogListShortcodePagination().scroll();
    }

    /**
    * Init audio player for Blog list and single pages
    */
    function edgtfInitAudioPlayer() {
        var players = $('audio.edgtf-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    /**
     * Init Resize Blog Items
     */
    function edgtfResizeBlogItems(size,container){

        if(container.hasClass('edgtf-masonry-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.edgtf-post-size-default'),
                largeWidthMasonryItem = container.find('.edgtf-post-size-large-width'),
                largeHeightMasonryItem = container.find('.edgtf-post-size-large-height'),
                largeWidthHeightMasonryItem = container.find('.edgtf-post-size-large-width-height');

			if (edgtf.windowWidth > 680) {
				defaultMasonryItem.css('height', size - 2 * padding);
				largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
				largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
				largeWidthMasonryItem.css('height', size - 2 * padding);
			} else {
				defaultMasonryItem.css('height', size);
				largeHeightMasonryItem.css('height', size);
				largeWidthHeightMasonryItem.css('height', size);
				largeWidthMasonryItem.css('height', Math.round(size / 2));
			}
        }
    }

    /**
    * Init Blog Masonry Layout
    */
    function edgtfInitBlogMasonry() {
	    var holder = $('.edgtf-blog-holder.edgtf-blog-type-masonry');
	
	    if(holder.length){
		    holder.each(function(){
			    var thisHolder = $(this),
				    masonry = thisHolder.children('.edgtf-blog-holder-inner'),
                    size = thisHolder.find('.edgtf-blog-masonry-grid-sizer').width();
			    
                edgtfResizeBlogItems(size, thisHolder);
                
			    masonry.waitForImages(function() {
				    masonry.isotope({
					    layoutMode: 'packery',
					    itemSelector: 'article',
					    percentPosition: true,
					    packery: {
						    gutter: '.edgtf-blog-masonry-grid-gutter',
						    columnWidth: '.edgtf-blog-masonry-grid-sizer'
					    }
				    });
                    masonry.css('opacity', '1');
                    
                    setTimeout(function(){
	                    masonry.isotope('layout');
                    }, 800);
                });
		    });
	    }
    }
	
	/**
	 * Initializes blog pagination functions
	 */
	function edgtfInitBlogPagination(){
		var holder = $('.edgtf-blog-holder');
		
		var initLoadMorePagination = function(thisHolder) {
			var loadMoreButton = thisHolder.find('.edgtf-blog-pag-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisHolder);
			});
		};
		
		var initInifiteScrollPagination = function(thisHolder) {
			var blogListHeight = thisHolder.outerHeight(),
				blogListTopOffest = thisHolder.offset().top,
				blogListPosition = blogListHeight + blogListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;
			
			if(!thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > blogListPosition) {
				initMainPagFunctionality(thisHolder);
			}
		};
		
		var initMainPagFunctionality = function(thisHolder) {
			var thisHolderInner = thisHolder.children('.edgtf-blog-holder-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}
			
			if(thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
				thisHolder.addClass('edgtf-blog-pagination-infinite-scroll-started');
			}
			
			var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisHolder),
				loadingItem = thisHolder.find('.edgtf-blog-pag-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				loadingItem.addClass('edgtf-showing');
				
				var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'fluid_edge_blog_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: edgtfGlobalVars.vars.edgtfAjaxUrl,
					success: function (data) {
						nextPage++;
						
						thisHolder.data('next-page', nextPage);

						var response = $.parseJSON(data),
							responseHtml =  response.html;

						thisHolder.waitForImages(function(){
							if(thisHolder.hasClass('edgtf-blog-type-masonry')){
								edgtfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                edgtfResizeBlogItems(thisHolderInner.find('.edgtf-blog-masonry-grid-sizer').width(), thisHolder);
								
								setTimeout(function() {
									thisHolderInner.isotope('layout');
								}, 1000);
							} else {
								edgtfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
							}
							
							setTimeout(function() {
								edgtfInitAudioPlayer();
								edgtf.modules.common.edgtfOwlSlider();
								edgtf.modules.common.edgtfFluidVideo();
								edgtf.modules.common.edgtfInitSelfHostedVideoPlayer();
								edgtf.modules.common.edgtfSelfHostedVideoSize();
							}, 400);
						});
						
						if(thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll-started')) {
							thisHolder.removeClass('edgtf-blog-pagination-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisHolder.find('.edgtf-blog-pag-load-more').hide();
			}
		};
		
		var edgtfInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('edgtf-showing');
			
			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 400);
		};
		
		var edgtfInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing');
			thisHolderInner.append(responseHtml);
		};
		
		return {
			init: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edgtf-blog-pagination-load-more')) {
							initLoadMorePagination(thisHolder);
						}
						
						if(thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}
	
	/**
	 * Init blog list shortcode masonry layout
	 */
	function edgtfInitBlogListMasonry() {
		var holder = $('.edgtf-blog-list-holder.edgtf-bl-masonry');
		
		if(holder.length){
			holder.each(function(){
				var thisHolder = $(this),
					masonry = thisHolder.find('.edgtf-blog-list');
				
				masonry.waitForImages(function() {
					masonry.isotope({
						layoutMode: 'packery',
						itemSelector: '.edgtf-bl-item',
						percentPosition: true,
						packery: {
							gutter: '.edgtf-bl-grid-gutter',
							columnWidth: '.edgtf-bl-grid-sizer'
						}
					});
					
					masonry.css('opacity', '1');
				});
			});
		}
	}
	
	/**
	 * Init blog list shortcode pagination functions
	 */
	function edgtfInitBlogListShortcodePagination(){
		var holder = $('.edgtf-blog-list-holder');
		
		var initStandardPagination = function(thisHolder) {
			var standardLink = thisHolder.find('.edgtf-bl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisHolder, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisHolder) {
			var loadMoreButton = thisHolder.find('.edgtf-blog-pag-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisHolder);
			});
		};
		
		var initInifiteScrollPagination = function(thisHolder) {
			var blogListHeight = thisHolder.outerHeight(),
				blogListTopOffest = thisHolder.offset().top,
				blogListPosition = blogListHeight + blogListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;
			
			if(!thisHolder.hasClass('edgtf-bl-pag-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > blogListPosition) {
				initMainPagFunctionality(thisHolder);
			}
		};
		
		var initMainPagFunctionality = function(thisHolder, pagedLink) {
			var thisHolderInner = thisHolder.find('.edgtf-blog-list'),
				nextPage,
				maxNumPages;
			
			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}
			
			if(thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
				thisHolder.data('next-page', pagedLink);
			}
			
			if(thisHolder.hasClass('edgtf-bl-pag-infinite-scroll')) {
				thisHolder.addClass('edgtf-bl-pag-infinite-scroll-started');
			}
			
			var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisHolder),
				loadingItem = thisHolder.find('.edgtf-blog-pag-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				if(thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
					loadingItem.addClass('edgtf-showing edgtf-standard-pag-trigger');
					thisHolder.addClass('edgtf-bl-pag-standard-blog-list-animate');
				} else {
					loadingItem.addClass('edgtf-showing');
				}
				
				var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'fluid_edge_blog_shortcode_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: edgtfGlobalVars.vars.edgtfAjaxUrl,
					success: function (data) {
						if(!thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
							nextPage++;
						}
						
						thisHolder.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
							edgtfInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage);
							
							thisHolder.waitForImages(function(){
								if(thisHolder.hasClass('edgtf-bl-masonry')){
									edgtfInitHtmlIsotopeNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
								} else {
									edgtfInitHtmlGalleryNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisHolder.waitForImages(function(){
								if(thisHolder.hasClass('edgtf-bl-masonry')){
									edgtfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
								} else {
									edgtfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
								}
							});
						}
						
						if(thisHolder.hasClass('edgtf-bl-pag-infinite-scroll-started')) {
							thisHolder.removeClass('edgtf-bl-pag-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisHolder.find('.edgtf-blog-pag-load-more').hide();
			}
		};
		
		var edgtfInitStandardPaginationLinkChanges = function(thisHolder, maxNumPages, nextPage) {
			var standardPagHolder = thisHolder.find('.edgtf-bl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.edgtf-bl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.edgtf-bl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.edgtf-bl-pag-next a');
			
			standardPagNumericItem.removeClass('edgtf-bl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('edgtf-bl-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var edgtfInitHtmlIsotopeNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
			thisHolder.removeClass('edgtf-bl-pag-standard-blog-list-animate');
			
			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 400);
		};
		
		var edgtfInitHtmlGalleryNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
			thisHolder.removeClass('edgtf-bl-pag-standard-blog-list-animate');
			thisHolderInner.html(responseHtml);
		};
		
		var edgtfInitAppendIsotopeNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('edgtf-showing');
			
			setTimeout(function() {
				thisHolderInner.isotope('layout');
			}, 400);
		};
		
		var edgtfInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing');
			thisHolderInner.append(responseHtml);
		};
		
		return {
			init: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
							initStandardPagination(thisHolder);
						}
						
						if(thisHolder.hasClass('edgtf-bl-pag-load-more')) {
							initLoadMorePagination(thisHolder);
						}
						
						if(thisHolder.hasClass('edgtf-bl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edgtf-bl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}

})(jQuery);
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
(function($) {
    "use strict";

    var header = {};
    edgtf.modules.header = header;

    header.isStickyVisible = false;
    header.stickyAppearAmount = 0;
    header.behaviour = '';

    header.edgtfOnDocumentReady = edgtfOnDocumentReady;
    header.edgtfOnWindowLoad = edgtfOnWindowLoad;
    header.edgtfOnWindowResize = edgtfOnWindowResize;
    header.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfHeaderBehaviour();
        edgtfSideArea();
        edgtfSideAreaScroll();
        edgtfFullscreenMenu();
        edgtfInitMobileNavigation();
        edgtfMobileHeaderBehavior();
        edgtfSetDropDownMenuPosition();
        edgtfDropDownMenu();    
        edgtfSearch();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfSetDropDownMenuPosition();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
        
    }

    /*
     **	Show/Hide sticky header on window scroll
     */
    function edgtfHeaderBehaviour() {

        var header = $('.edgtf-page-header'),
	        stickyHeader = $('.edgtf-sticky-header'),
            fixedHeaderWrapper = $('.edgtf-fixed-wrapper'),
	        menuAreaHeight = fixedHeaderWrapper.children('.edgtf-menu-area').outerHeight();
        
        var revSliderHeight =  0;
        if ($('.edgtf-slider').length) {
            revSliderHeight = $('.edgtf-slider').outerHeight();
        }

        var headerMenuAreaOffset = $('.edgtf-page-header').find('.edgtf-fixed-wrapper').length ? $('.edgtf-page-header').find('.edgtf-fixed-wrapper').offset().top - edgtfGlobalVars.vars.edgtfAddForAdminBar : 0;
		
        var stickyAppearAmount;
        var headerAppear;

        switch(true) {
            // sticky header that will be shown when user scrolls up
            case edgtf.body.hasClass('edgtf-sticky-header-on-scroll-up'):
                edgtf.modules.header.behaviour = 'edgtf-sticky-header-on-scroll-up';
                var docYScroll1 = $(document).scrollTop();
                stickyAppearAmount = parseInt(edgtfGlobalVars.vars.edgtfTopBarHeight) + parseInt(edgtfGlobalVars.vars.edgtfLogoAreaHeight) + parseInt(edgtfGlobalVars.vars.edgtfMenuAreaHeight) + parseInt(edgtfGlobalVars.vars.edgtfStickyHeaderHeight);
	            
                headerAppear = function(){
                    var docYScroll2 = $(document).scrollTop();

                    if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                        edgtf.modules.header.isStickyVisible= false;
                        stickyHeader.removeClass('header-appear').find('.edgtf-main-menu .second').removeClass('edgtf-drop-down-start');
                    }else {
                        edgtf.modules.header.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                    }

                    docYScroll1 = $(document).scrollTop();
                };
                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // sticky header that will be shown when user scrolls both up and down
            case edgtf.body.hasClass('edgtf-sticky-header-on-scroll-down-up'):
                edgtf.modules.header.behaviour = 'edgtf-sticky-header-on-scroll-down-up';

                if(edgtfPerPageVars.vars.edgtfStickyScrollAmount !== 0){
                    edgtf.modules.header.stickyAppearAmount = parseInt(edgtfPerPageVars.vars.edgtfStickyScrollAmount);
                } else {
                    edgtf.modules.header.stickyAppearAmount = parseInt(edgtfGlobalVars.vars.edgtfTopBarHeight) + parseInt(edgtfGlobalVars.vars.edgtfLogoAreaHeight) + parseInt(edgtfGlobalVars.vars.edgtfMenuAreaHeight) + revSliderHeight;
                }

                headerAppear = function(){
                    if(edgtf.scroll < edgtf.modules.header.stickyAppearAmount) {
                        edgtf.modules.header.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.edgtf-main-menu .second').removeClass('edgtf-drop-down-start');
                    }else{
                        edgtf.modules.header.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                    }
                };

                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // on scroll down, part of header will be sticky
            case edgtf.body.hasClass('edgtf-fixed-on-scroll'):
                edgtf.modules.header.behaviour = 'edgtf-fixed-on-scroll';
                var headerFixed = function(){

                    if(edgtf.scroll <= headerMenuAreaOffset) {
                        fixedHeaderWrapper.removeClass('fixed');
	                    fixedHeaderWrapper.children('.edgtf-menu-area').css({'height': menuAreaHeight});
                        header.css('margin-bottom', '0');
                    } else {
                        fixedHeaderWrapper.addClass('fixed');
	                    fixedHeaderWrapper.children('.edgtf-menu-area').css({'height': (menuAreaHeight - 20) + 'px'});
	                    header.css('margin-bottom', (menuAreaHeight - 20) + 'px');
                    }
                };

                headerFixed();

                $(window).scroll(function() {
                    headerFixed();
                });

                break;
        }
    }

    /**
     * Show/hide side area
     */
    function edgtfSideArea() {

        var wrapper = $('.edgtf-wrapper'),
            sideMenuButtonOpen = $('a.edgtf-side-menu-button-opener'),
            cssClass = 'edgtf-right-side-menu-opened';

        wrapper.prepend('<div class="edgtf-cover"/>');

        $('a.edgtf-side-menu-button-opener, a.edgtf-close-side-menu').click( function(e) {
            e.preventDefault();

            if(!sideMenuButtonOpen.hasClass('opened')) {

                sideMenuButtonOpen.addClass('opened');
                edgtf.body.addClass(cssClass);

                $('.edgtf-wrapper .edgtf-cover').click(function() {
                    edgtf.body.removeClass('edgtf-right-side-menu-opened');
                    sideMenuButtonOpen.removeClass('opened');
                });

                var currentScroll = $(window).scrollTop();
                $(window).scroll(function() {
                    if(Math.abs(edgtf.scroll - currentScroll) > 400){
                        edgtf.body.removeClass(cssClass);
                        sideMenuButtonOpen.removeClass('opened');
                    }
                });
            } else {
                sideMenuButtonOpen.removeClass('opened');
                edgtf.body.removeClass(cssClass);
            }
        });
    }

    /*
    **  Smooth scroll functionality for Side Area
    */
    function edgtfSideAreaScroll(){

        var sideMenu = $('.edgtf-side-menu');

        if(sideMenu.length){    
            sideMenu.niceScroll({ 
                scrollspeed: 60,
                mousescrollstep: 40,
                cursorwidth: 0, 
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false, 
                horizrailenabled: false 
            });
        }
    }

    /**
     * Init Fullscreen Menu
     */
    function edgtfFullscreenMenu() {

        if ($('a.edgtf-fullscreen-menu-opener').length) {

            var popupMenuOpener = $( 'a.edgtf-fullscreen-menu-opener'),
                popupMenuHolderOuter = $(".edgtf-fullscreen-menu-holder-outer"),
                cssClass,
            //Flags for type of animation
                fadeRight = false,
                fadeTop = false,
            //Widgets
                widgetAboveNav = $('.edgtf-fullscreen-above-menu-widget-holder'),
                widgetBelowNav = $('.edgtf-fullscreen-below-menu-widget-holder'),
            //Menu
                menuItems = $('.edgtf-fullscreen-menu-holder-outer nav > ul > li > a'),
                menuItemWithChild =  $('.edgtf-fullscreen-menu > ul li.has_sub > a'),
                menuItemWithoutChild = $('.edgtf-fullscreen-menu ul li:not(.has_sub) a');


            //set height of popup holder and initialize nicescroll
            popupMenuHolderOuter.height(edgtf.windowHeight).niceScroll({
                scrollspeed: 30,
                mousescrollstep: 20,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            }); //200 is top and bottom padding of holder

            //set height of popup holder on resize
            $(window).resize(function() {
                popupMenuHolderOuter.height(edgtf.windowHeight);
            });

            if (edgtf.body.hasClass('edgtf-fade-push-text-right')) {
                cssClass = 'edgtf-push-nav-right';
                fadeRight = true;
            } else if (edgtf.body.hasClass('edgtf-fade-push-text-top')) {
                cssClass = 'edgtf-push-text-top';
                fadeTop = true;
            }

            //Appearing animation
            if (fadeRight || fadeTop) {
                if (widgetAboveNav.length) {
                    widgetAboveNav.children().css({
                        '-webkit-animation-delay' : 0 + 'ms',
                        '-moz-animation-delay' : 0 + 'ms',
                        'animation-delay' : 0 + 'ms'
                    });
                }
                menuItems.each(function(i) {
                    $(this).css({
                        '-webkit-animation-delay': (i+1) * 70 + 'ms',
                        '-moz-animation-delay': (i+1) * 70 + 'ms',
                        'animation-delay': (i+1) * 70 + 'ms'
                    });
                });
                if (widgetBelowNav.length) {
                    widgetBelowNav.children().css({
                        '-webkit-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        '-moz-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        'animation-delay' : (menuItems.length + 1)*70 + 'ms'
                    });
                }
            }

            // Open popup menu
            popupMenuOpener.on('click',function(e){
                e.preventDefault();

                if (!popupMenuOpener.hasClass('edgtf-fm-opened')) {
                    popupMenuOpener.addClass('edgtf-fm-opened');
                    edgtf.body.addClass('edgtf-fullscreen-menu-opened');
                    edgtf.body.removeClass('edgtf-fullscreen-fade-out').addClass('edgtf-fullscreen-fade-in');
                    edgtf.body.removeClass(cssClass);
                    if(!edgtf.body.hasClass('page-template-full_screen-php')){
                        edgtf.modules.common.edgtfDisableScroll();
                    }
                    $(document).keyup(function(e){
                        if (e.keyCode == 27 ) {
                            popupMenuOpener.removeClass('edgtf-fm-opened');
                            edgtf.body.removeClass('edgtf-fullscreen-menu-opened');
                            edgtf.body.removeClass('edgtf-fullscreen-fade-in').addClass('edgtf-fullscreen-fade-out');
                            edgtf.body.addClass(cssClass);
                            if(!edgtf.body.hasClass('page-template-full_screen-php')){
                                edgtf.modules.common.edgtfEnableScroll();
                            }
                            $("nav.edgtf-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                                $('nav.popup_menu').getNiceScroll().resize();
                            });
                        }
                    });
                } else {
                    popupMenuOpener.removeClass('edgtf-fm-opened');
                    edgtf.body.removeClass('edgtf-fullscreen-menu-opened');
                    edgtf.body.removeClass('edgtf-fullscreen-fade-in').addClass('edgtf-fullscreen-fade-out');
                    edgtf.body.addClass(cssClass);
                    if(!edgtf.body.hasClass('page-template-full_screen-php')){
                        edgtf.modules.common.edgtfEnableScroll();
                    }
                    $("nav.edgtf-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                        $('nav.popup_menu').getNiceScroll().resize();
                    });
                }
            });

            //logic for open sub menus in popup menu
            menuItemWithChild.on('tap click', function(e) {
                e.preventDefault();

                var thisItem = $(this),
	                thisItemParent = thisItem.parent();

                if (thisItemParent.hasClass('has_sub')) {
                    var submenu = thisItemParent.find('> ul.sub_menu');

                    if (submenu.is(':visible')) {
                        submenu.slideUp(450, 'easeInOutQuint', function() {
                            popupMenuHolderOuter.getNiceScroll().resize();
                        });
	                    thisItemParent.removeClass('open_sub');
                    } else if($('.open_sub').length <= 0) {
	                    popupMenuHolderOuter.getNiceScroll().resize();

	                    submenu.slideDown(400, 'easeInOutQuint', function() {
		                    popupMenuHolderOuter.getNiceScroll().resize();
	                    });
                    } else {
	                    thisItemParent.addClass('open_sub');
	                    thisItemParent.siblings().removeClass('open_sub').find('.sub_menu').slideUp(400, 'easeInOutQuint', function() {
		                    popupMenuHolderOuter.getNiceScroll().resize();

		                    submenu.slideDown(400, 'easeInOutQuint', function() {
			                    popupMenuHolderOuter.getNiceScroll().resize();
		                    });
	                    });
                    }
                }
                return false;
            });

            //if link has no submenu and if it's not dead, than open that link
            menuItemWithoutChild.click(function (e) {

                if(($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")){

                    if (e.which == 1) {
                        popupMenuOpener.removeClass('edgtf-fm-opened');
                        edgtf.body.removeClass('edgtf-fullscreen-menu-opened');
                        edgtf.body.removeClass('edgtf-fullscreen-fade-in').addClass('edgtf-fullscreen-fade-out');
                        edgtf.body.addClass(cssClass);
                        $("nav.edgtf-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                            $('nav.popup_menu').getNiceScroll().resize();
                        });
                        edgtf.modules.common.edgtfEnableScroll();
                    }
                }else{
                    return false;
                }
            });
        }
    }

    function edgtfInitMobileNavigation() {
        var navigationOpener = $('.edgtf-mobile-header .edgtf-mobile-menu-opener');
        var navigationHolder = $('.edgtf-mobile-header .edgtf-mobile-nav');
        var dropdownOpener = $('.edgtf-mobile-nav .mobile_arrow, .edgtf-mobile-nav h6, .edgtf-mobile-nav a.edgtf-mobile-no-link');
        var animationSpeed = 200;

        //whole mobile menu opening / closing
        if(navigationOpener.length && navigationHolder.length) {
            navigationOpener.on('tap click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                if(navigationHolder.is(':visible')) {
                    navigationHolder.slideUp(animationSpeed);
                } else {
                    navigationHolder.slideDown(animationSpeed);
                }
            });
        }

        //dropdown opening / closing
        if(dropdownOpener.length) {
            dropdownOpener.each(function() {
                $(this).on('tap click', function(e) {
                    var dropdownToOpen = $(this).nextAll('ul').first();

                    if(dropdownToOpen.length) {
                        e.preventDefault();
                        e.stopPropagation();

                        var openerParent = $(this).parent('li');
                        if(dropdownToOpen.is(':visible')) {
                            dropdownToOpen.slideUp(animationSpeed);
                            openerParent.removeClass('edgtf-opened');
                        } else {
                            dropdownToOpen.slideDown(animationSpeed);
                            openerParent.addClass('edgtf-opened');
                        }
                    }

                });
            });
        }

        $('.edgtf-mobile-nav a, .edgtf-mobile-logo-wrapper a').on('click tap', function(e) {
            if($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
                navigationHolder.slideUp(animationSpeed);
            }
        });
    }

    function edgtfMobileHeaderBehavior() {
        if(edgtf.body.hasClass('edgtf-sticky-up-mobile-header')) {
            var stickyAppearAmount,
                mobileHeader = $('.edgtf-mobile-header'),
                mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0,
                adminBar     = $('#wpadminbar');

            var docYScroll1 = $(document).scrollTop();
            stickyAppearAmount = mobileHeaderHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar;

            $(window).scroll(function() {
                var docYScroll2 = $(document).scrollTop();

                if(docYScroll2 > stickyAppearAmount) {
                    mobileHeader.addClass('edgtf-animate-mobile-header');
                } else {
                    mobileHeader.removeClass('edgtf-animate-mobile-header');
                }

                if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                    mobileHeader.removeClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', 0);

                    if(adminBar.length) {
                        mobileHeader.find('.edgtf-mobile-header-inner').css('top', 0);
                    }
                } else {
                    mobileHeader.addClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', stickyAppearAmount);
                }

                docYScroll1 = $(document).scrollTop();
            });
        }
    }

    /**
     * Set dropdown position
     */
    function edgtfSetDropDownMenuPosition(){

        var menuItems = $(".edgtf-drop-down > ul > li.narrow");
        menuItems.each( function(i) {

            var browserWidth = edgtf.windowWidth-16; // 16 is width of scroll bar
            var menuItemPosition = $(this).offset().left;
            var dropdownMenuWidth = $(this).find('.second .inner ul').width();

            var menuItemFromLeft = 0;
            if(edgtf.body.hasClass('edgtf-boxed')){
                menuItemFromLeft = edgtf.boxedLayoutWidth  - (menuItemPosition - (browserWidth - edgtf.boxedLayoutWidth )/2);
            } else {
                menuItemFromLeft = browserWidth - menuItemPosition;
            }

            var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

            if($(this).find('li.sub').length > 0){
                dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
            }

            if(menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth){
                $(this).find('.second').addClass('right');
                $(this).find('.second .inner ul').addClass('right');
            }
        });
    }

    function edgtfDropDownMenu() {

        var menu_items = $('.edgtf-drop-down > ul > li');

        menu_items.each(function(i) {
            if($(menu_items[i]).find('.second').length > 0) {

                var dropDownSecondDiv = $(menu_items[i]).find('.second');

                if($(menu_items[i]).hasClass('wide')) {
                    
                    if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
                        dropDownSecondDiv.css('left', 0);
                    }

                    //set columns to be same height - start
                    var tallest = 0;
                    $(this).find('.second > .inner > ul > li').each(function() {
                        var thisHeight = $(this).height();
                        if(thisHeight > tallest) {
                            tallest = thisHeight;
                        }
                    });

                    $(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
                    $(this).find('.second > .inner > ul > li').height(tallest);
                    //set columns to be same height - end

                    var left_position;

                    if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
                        left_position = dropDownSecondDiv.offset().left;

                        dropDownSecondDiv.css('left', -left_position);
                        dropDownSecondDiv.css('width', edgtf.windowWidth);
                    }
                }

                if(!edgtf.menuDropdownHeightSet) {
                    $(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
                    dropDownSecondDiv.height(0);
                }

                if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                    $(menu_items[i]).on("touchstart mouseenter", function() {
                        dropDownSecondDiv.css({
                            'height': $(menu_items[i]).data('original_height'),
                            'overflow': 'visible',
                            'visibility': 'visible',
                            'opacity': '1'
                        });
                    }).on("mouseleave", function() {
                        dropDownSecondDiv.css({
                            'height': '0px',
                            'overflow': 'hidden',
                            'visibility': 'hidden',
                            'opacity': '0'
                        });
                    });

                } else {
                    if(edgtf.body.hasClass('edgtf-dropdown-animate-height')) {
                        $(menu_items[i]).mouseenter(function() {
                            dropDownSecondDiv.css({
                                'visibility': 'visible',
                                'height': '0px',
                                'opacity': '0'
                            });
                            dropDownSecondDiv.stop().animate({
                                'height': $(menu_items[i]).data('original_height'),
                                opacity: 1
                            }, 300, function() {
                                dropDownSecondDiv.css('overflow', 'visible');
                            });
                        }).mouseleave(function() {
                            dropDownSecondDiv.stop().animate({
                                'height': '0px'
                            }, 150, function() {
                                dropDownSecondDiv.css({
                                    'overflow': 'hidden',
                                    'visibility': 'hidden'
                                });
                            });
                        });
                    } else {
                        var config = {
                            interval: 0,
                            over: function() {
                                setTimeout(function() {
                                    dropDownSecondDiv.addClass('edgtf-drop-down-start');
                                    dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
                                }, 150);
                            },
                            timeout: 150,
                            out: function() {
                                dropDownSecondDiv.stop().css({'height': '0px'});
                                dropDownSecondDiv.removeClass('edgtf-drop-down-start');
                            }
                        };
                        $(menu_items[i]).hoverIntent(config);
                    }
                }
            }
        });
         $('.edgtf-drop-down ul li.wide ul li a').on('click', function(e) {
            if (e.which == 1){
                var $this = $(this);
                setTimeout(function() {
                    $this.mouseleave();
                }, 500);
            }
        });

        edgtf.menuDropdownHeightSet = true;
    }

    /**
     * Init Search Types
     */
    function edgtfSearch() {

        var searchOpener = $('a.edgtf-search-opener'),
            searchForm,
            searchClose,
            touch = false;

        if ( $('html').hasClass( 'touch' ) ) {
            touch = true;
        }

        if ( searchOpener.length > 0 ) {
            //Check for type of search
            if ( edgtf.body.hasClass( 'edgtf-fullscreen-search' ) ) {

                var fullscreenSearchFade;

                searchClose = $( '.edgtf-fullscreen-search-close' );
                fullscreenSearchFade = true;
                edgtfFullscreenSearch( fullscreenSearchFade);

            } else if ( edgtf.body.hasClass( 'edgtf-slide-from-header-bottom' ) ) {

                edgtfSearchSlideFromHeaderBottom();

            } else if ( edgtf.body.hasClass( 'edgtf-search-covers-header' ) ) {

                edgtfSearchCoversHeader();

            } else if ( edgtf.body.hasClass( 'edgtf-search-slides-from-window-top' ) ) {

                searchForm = $('.edgtf-search-slide-window-top');
                searchClose = $('.edgtf-search-close');
                edgtfSearchWindowTop();
            }
        }

        /**
         * Search slides from window top type of search
         */
        function edgtfSearchWindowTop() {

            searchOpener.click( function(e) {
                e.preventDefault();

                var yPos = 0;
                if($('.title').hasClass('has_parallax_background')){
                    yPos = parseInt($('.title.has_parallax_background').css('backgroundPosition').split(" ")[1]);
                }

                if ( searchForm.height() == "0") {
                    $('.edgtf-search-slide-window-top input[type="text"]').focus();
                    //Push header bottom
                    edgtf.body.addClass('edgtf-search-open');
                    $('.title.has_parallax_background').animate({
                        'background-position-y': (yPos + 50)+'px'
                    }, 150);
                } else {
                    edgtf.body.removeClass('edgtf-search-open');
                    $('.title.has_parallax_background').animate({
                        'background-position-y': (yPos - 50)+'px'
                    }, 150);
                }

                $(window).scroll(function() {
                    if ( searchForm.height() != '0' && edgtf.scroll > 50 ) {
                        edgtf.body.removeClass('edgtf-search-open');
                        $('.title.has_parallax_background').css('backgroundPosition', 'center '+(yPos)+'px');
                    }
                });

                searchClose.click(function(e){
                    e.preventDefault();
                    edgtf.body.removeClass('edgtf-search-open');
                    $('.title.has_parallax_background').animate({
                        'background-position-y': (yPos)+'px'
                    }, 150);
                });

            });
        }

        /**
         * Search covers header type of search
         */
        function edgtfSearchCoversHeader() {

            searchOpener.click(function (e) {
                e.preventDefault();
                var searchFormHeight,
	                adjsSearchFormHeight = 0,
                    searchFormHolder = $('.edgtf-search-cover .edgtf-form-holder-outer'),
                    searchForm,
                    searchFormLandmark; // there is one more div element if header is in grid

                if ($(this).closest('.edgtf-grid').length) {
                    searchForm = $(this).closest('.edgtf-grid').parent().children().first();
                    searchFormLandmark = searchForm;
                }
                else {
                    searchForm = $(this).closest('.edgtf-menu-area').children().first();
                    searchFormLandmark = searchForm;
                }

                if ($(this).closest('.edgtf-sticky-header').length > 0) {
                    searchForm = $(this).closest('.edgtf-sticky-header').children().first();
                    searchFormLandmark = searchForm;
                }
                if ($(this).closest('.edgtf-mobile-header').length > 0) {
                    searchForm = $(this).closest('.edgtf-mobile-header').children().children().first();
                    searchFormLandmark = searchForm.parent();
                }

                //Find search form position in header and height
                if (searchFormLandmark.parent().hasClass('edgtf-logo-area')) {
                    searchFormHeight = edgtfGlobalVars.vars.edgtfLogoAreaHeight;
                } else if (searchFormLandmark.parent().hasClass('edgtf-top-bar')) {
                    searchFormHeight = edgtfGlobalVars.vars.edgtfTopBarHeight;
                } else if (searchFormLandmark.parent().hasClass('edgtf-menu-area')) {
	                if(edgtf.body.find('.edgtf-top-bar').length) {
		                adjsSearchFormHeight = edgtfGlobalVars.vars.edgtfTopBarHeight;
	                }
                    searchFormHeight = edgtfGlobalVars.vars.edgtfMenuAreaHeight;
                } else if (searchFormLandmark.parent().hasClass('edgtf-sticky-header')) {
                    searchFormHeight = edgtfGlobalVars.vars.edgtfStickyHeaderTransparencyHeight;
                } else if (searchFormLandmark.parent().hasClass('edgtf-mobile-header')) {
	                if(edgtf.body.find('.edgtf-top-bar').length) {
		                adjsSearchFormHeight = edgtfGlobalVars.vars.edgtfTopBarHeight;
	                }
                    searchFormHeight = $('.edgtf-mobile-header-inner').height();
                }

	            if(edgtf.body.hasClass('edgtf-header-elegant')) {
		            adjsSearchFormHeight += 46; // 46 is top padding of header
	            }

	            searchFormHeight = searchFormHeight - adjsSearchFormHeight;

                searchFormHolder.height(searchFormHeight);
                searchForm.stop(true).fadeIn(600);
                $('.edgtf-search-cover input[type="text"]').focus();
                $('.edgtf-search-close, .edgtf-content, footer').click(function (e) {
                    e.preventDefault();
                    searchForm.stop(true).fadeOut(450);
                });
                searchForm.blur(function () {
                    searchForm.stop(true).fadeOut(450);
                });
            });

        }

        /**
         * Search slide from header bottom type of search
         */
        function edgtfSearchSlideFromHeaderBottom() {
	
	        searchOpener.click( function(e) {
		        e.preventDefault();
		
		        var thisItem = $(this),
			        searchIconPosition = parseInt(edgtf.windowWidth - thisItem.offset().left - thisItem.outerWidth());

		        if(edgtf.body.hasClass('edgtf-boxed') && edgtf.windowWidth > 1024) {
			        searchIconPosition -= parseInt((edgtf.windowWidth - $('.edgtf-boxed .edgtf-wrapper .edgtf-wrapper-inner').outerWidth()) / 2);
		        }
		
		        if(!edgtf.body.hasClass('edgtf-search-opened')){
			        edgtf.body.addClass('edgtf-search-opened');
			        if(thisItem.parents('.edgtf-fixed-wrapper').length) {
				        thisItem.parents('.edgtf-fixed-wrapper').find('.edgtf-slide-from-header-bottom-holder').css('right', searchIconPosition).slideToggle(300, 'easeOutBack');
			        } else if (thisItem.parents('.edgtf-sticky-header.header-appear').length) {
				        thisItem.parents('.edgtf-sticky-header.header-appear').find('.edgtf-slide-from-header-bottom-holder').css('right', searchIconPosition).slideToggle(300, 'easeOutBack');
			        } else if(thisItem.parents('.edgtf-logo-area').length) {
				        thisItem.parents('.edgtf-page-header').find('.edgtf-slide-from-header-bottom-holder').css('right', searchIconPosition).slideToggle(300, 'easeOutBack');
			        } else if (thisItem.parents('.edgtf-page-header').children('.edgtf-slide-from-header-bottom-holder').length) {
				        thisItem.parents('.edgtf-page-header').children('.edgtf-slide-from-header-bottom-holder').css('right', searchIconPosition).slideToggle(300, 'easeOutBack');
			        } else if (thisItem.parents('.edgtf-mobile-header').length) {
				        thisItem.parents('.edgtf-mobile-header').find('.edgtf-slide-from-header-bottom-holder').css('right', searchIconPosition).slideToggle(300, 'easeOutBack');
			        }
			        setTimeout(function(){
				        $('.edgtf-slide-from-header-bottom-holder input').focus();
			        },400);
		        } else {
			        edgtf.body.removeClass('edgtf-search-opened');
			        
			        if (thisItem.parents('.edgtf-page-header').length) {
				        thisItem.parents('.edgtf-page-header').find('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        } else if (thisItem.parents('.edgtf-mobile-header').length) {
				        thisItem.parents('.edgtf-mobile-header').find('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        }
		        }
	        });
	
	        //Close on escape
	        $(document).keyup(function(e){
		        if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
			        edgtf.body.removeClass('edgtf-search-opened');
			        if(searchOpener.parents('.edgtf-fixed-wrapper').length) {
				        searchOpener.parents('.edgtf-fixed-wrapper').find('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        } else if (searchOpener.parents('.edgtf-sticky-header.header-appear').length) {
				        searchOpener.parents('.edgtf-sticky-header.header-appear').find('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        } else if(searchOpener.parents('.edgtf-logo-area').length) {
				        searchOpener.parents('.edgtf-page-header').find('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        } else if (searchOpener.parents('.edgtf-page-header').children('.edgtf-slide-from-header-bottom-holder').length) {
				        searchOpener.parents('.edgtf-page-header').children('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        } else if (searchOpener.parents('.edgtf-mobile-header').length) {
				        searchOpener.parents('.edgtf-mobile-header').find('.edgtf-slide-from-header-bottom-holder').fadeOut(0);
			        }
		        }
	        });
        }

        /**
         * Fullscreen search fade
         */
        function edgtfFullscreenSearch( fade) {

            var searchHolder = $( '.edgtf-fullscreen-search-holder');

            searchOpener.click( function(e) {
                e.preventDefault();
                var samePosition = false,
                    closeTop = 0,
                    closeLeft = 0;
                if ( $(this).data('icon-close-same-position') === 'yes' ) {
                    closeTop = $(this).find('.edgtf-search-opener-wrapper').offset().top;
                    closeLeft = $(this).offset().left;
                    samePosition = true;
                }
                //Fullscreen search fade
                if ( fade ) {
                    if ( searchHolder.hasClass( 'edgtf-animate' ) ) {
                        edgtf.body.removeClass('edgtf-fullscreen-search-opened');
                        edgtf.body.addClass( 'edgtf-search-fade-out' );
                        edgtf.body.removeClass( 'edgtf-search-fade-in' );
                        searchHolder.removeClass( 'edgtf-animate' );
                        setTimeout(function(){
                            searchHolder.find('.edgtf-search-field').val('');
                            searchHolder.find('.edgtf-search-field').blur();
                        },300);
                        if(!edgtf.body.hasClass('page-template-full_screen-php')){
                            edgtf.modules.common.edgtfEnableScroll();
                        }
                    } else {
                        edgtf.body.addClass('edgtf-fullscreen-search-opened');
                        setTimeout(function(){
                            searchHolder.find('.edgtf-search-field').focus();
                        },900);
                        edgtf.body.removeClass('edgtf-search-fade-out');
                        edgtf.body.addClass('edgtf-search-fade-in');
                        searchHolder.addClass('edgtf-animate');
                        if (samePosition) {
                            searchClose.css({
                                'top' : closeTop - edgtf.scroll,
                                'left' : closeLeft
                            });
                        }
                        if(!edgtf.body.hasClass('page-template-full_screen-php')){
                            edgtf.modules.common.edgtfDisableScroll();
                        }
                    }
                    searchClose.click( function(e) {
                        e.preventDefault();
                        edgtf.body.removeClass('edgtf-fullscreen-search-opened');
                        searchHolder.removeClass('edgtf-animate');
                        setTimeout(function(){
                            searchHolder.find('.edgtf-search-field').val('');
                            searchHolder.find('.edgtf-search-field').blur();
                        },300);
                        edgtf.body.removeClass('edgtf-search-fade-in');
                        edgtf.body.addClass('edgtf-search-fade-out');
                        if(!edgtf.body.hasClass('page-template-full_screen-php')){
                            edgtf.modules.common.edgtfEnableScroll();
                        }
                    });

                    //Close on click away
                    $(document).mouseup(function (e) {
                        var container = $(".edgtf-form-holder-inner");
                        if (!container.is(e.target) && container.has(e.target).length === 0)  {
                            e.preventDefault();
                            edgtf.body.removeClass('edgtf-fullscreen-search-opened');
                            searchHolder.removeClass('edgtf-animate');
                            setTimeout(function(){
                                searchHolder.find('.edgtf-search-field').val('');
                                searchHolder.find('.edgtf-search-field').blur();
                            },300);
                            edgtf.body.removeClass('edgtf-search-fade-in');
                            edgtf.body.addClass('edgtf-search-fade-out');
                            if(!edgtf.body.hasClass('page-template-full_screen-php')){
                                edgtf.modules.common.edgtfEnableScroll();
                            }
                        }
                    });

                    //Close on escape
                    $(document).keyup(function(e){
                        if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
                            edgtf.body.removeClass('edgtf-fullscreen-search-opened');
                            searchHolder.removeClass('edgtf-animate');
                            setTimeout(function(){
                                searchHolder.find('.edgtf-search-field').val('');
                                searchHolder.find('.edgtf-search-field').blur();
                            },300);
                            edgtf.body.removeClass('edgtf-search-fade-in');
                            edgtf.body.addClass('edgtf-search-fade-out');
                            if(!edgtf.body.hasClass('page-template-full_screen-php')){
                                edgtf.modules.common.edgtfEnableScroll();
                            }
                        }
                    });
                }
            });

            //Text input focus change
            $('.edgtf-fullscreen-search-holder .edgtf-search-field').focus(function(){
                $('.edgtf-fullscreen-search-holder .edgtf-field-holder .edgtf-line').css("width","100%");
            });

            $('.edgtf-fullscreen-search-holder .edgtf-search-field').blur(function(){
                $('.edgtf-fullscreen-search-holder .edgtf-field-holder .edgtf-line').css("width","0");
            });
        }
    }

})(jQuery);
(function($) {
    "use strict";

    var title = {};
    edgtf.modules.title = title;

    title.edgtfOnDocumentReady = edgtfOnDocumentReady;
    title.edgtfOnWindowLoad = edgtfOnWindowLoad;
    title.edgtfOnWindowResize = edgtfOnWindowResize;
    title.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
	    edgtfParallaxTitle();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {

    }

    /*
     **	Title image with parallax effect
     */
    function edgtfParallaxTitle(){
	    var parallaxBackground = $('.edgtf-title.edgtf-has-parallax-background');
	    
        if(parallaxBackground.length > 0 && $('.touch').length === 0){
            var parallaxBackgroundWithZoomOut = $('.edgtf-title.edgtf-has-parallax-background.edgtf-zoom-out');

            var backgroundSizeWidth = parseInt(parallaxBackground.data('background-width').match(/\d+/));
            var titleHolderHeight = parallaxBackground.data('height');
            var titleRate = (titleHolderHeight / 10000) * 7;
            var titleYPos = -(edgtf.scroll * titleRate);

            //set position of background on doc ready
            parallaxBackground.css({'background-position': 'center '+ (titleYPos+edgtfGlobalVars.vars.edgtfAddForAdminBar) +'px' });
            parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-edgtf.scroll + 'px auto'});

            //set position of background on window scroll
            $(window).scroll(function() {
                titleYPos = -(edgtf.scroll * titleRate);
                parallaxBackground.css({'background-position': 'center ' + (titleYPos+edgtfGlobalVars.vars.edgtfAddForAdminBar) + 'px' });
                parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-edgtf.scroll + 'px auto'});
            });
        }
    }

})(jQuery);

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
(function($) {
    'use strict';

    var portfolio = {};
    edgtf.modules.portfolio = portfolio;

    portfolio.edgtfOnDocumentReady = edgtfOnDocumentReady;
    portfolio.edgtfOnWindowLoad = edgtfOnWindowLoad;
    portfolio.edgtfOnWindowResize = edgtfOnWindowResize;
    portfolio.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitPortfolioSlider();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitPortfolioMasonry();
        edgtfInitPortfolioFilter();
        initPortfolioSingleMasonry();
        edgtfInitPortfolioListAnimation();
	    edgtfInitPortfolioPagination().init();
        edgtfPortfolioSingleFollow().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtfOnWindowScroll() {
	    edgtfInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function edgtfInitPortfolioListAnimation(){
        var portList = $('.edgtf-portfolio-list-holder.edgtf-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.edgtf-pl-inner');

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('edgtf-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('edgtf-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function edgtfInitPortfolioMasonry(){
        var portList = $('.edgtf-portfolio-list-holder.edgtf-pl-masonry');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this),
                    masonry = thisPortList.children('.edgtf-pl-inner'),
                    size = thisPortList.find('.edgtf-pl-grid-sizer').width();
                
                edgtfResizePortfolioItems(size, thisPortList);

                masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    percentPosition: true,
                    packery: {
                        gutter: '.edgtf-pl-grid-gutter',
                        columnWidth: '.edgtf-pl-grid-sizer'
                    }
                });
                
                setTimeout(function () {
	                edgtf.modules.parallax.edgtfInitParallax();
                }, 600);

                masonry.css('opacity', '1');
            });
        }
    }

    /**
     * Init Resize Blog Items
     */
    function edgtfResizePortfolioItems(size,container){
        if(container.hasClass('edgtf-pl-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.edgtf-pl-masonry-default'),
                largeWidthMasonryItem = container.find('.edgtf-pl-masonry-large-width'),
                largeHeightMasonryItem = container.find('.edgtf-pl-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.edgtf-pl-masonry-large-width-height');

            if (edgtf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function edgtfInitPortfolioFilter(){
        var filterHolder = $('.edgtf-portfolio-list-holder .edgtf-pl-filter-holder');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.edgtf-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.edgtf-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('edgtf-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.edgtf-pl-filter:first').addClass('edgtf-pl-current');
	            
	            if(thisPortListHolder.hasClass('edgtf-pl-gallery')) {
		            thisPortListInner.isotope();
	            }

                thisFilterHolder.find('.edgtf-pl-filter').click(function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
                        portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.edgtf-pl-filter').removeClass('edgtf-pl-current');
                    thisFilter.addClass('edgtf-pl-current');

                    if(portListHasLoadMore && !portListHasArtciles) {
                        edgtfInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
                    } else {
                        thisFilterHolder.parent().children('.edgtf-pl-inner').isotope({ filter: filterValue });
	                    edgtf.modules.parallax.edgtfInitParallax();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function edgtfInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {
        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.edgtf-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'edgtf_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.edgtf-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('edgtf-showing edgtf-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                        if(portListHasArtciles) {
                            setTimeout(function() {
                                edgtfResizePortfolioItems(thisPortListInner.find('.edgtf-blog-masonry-grid-sizer').width(), thisPortList);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('edgtf-showing edgtf-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
	                                edgtf.modules.parallax.edgtfInitParallax();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('edgtf-showing edgtf-filter-trigger');
                            edgtfInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }
	
	/**
	 * Initializes portfolio pagination functions
	 */
	function edgtfInitPortfolioPagination(){
		var portList = $('.edgtf-portfolio-list-holder');
		
		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.edgtf-pl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.edgtf-pl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisPortList);
			});
		};
		
		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;
			
			if(!thisPortList.hasClass('edgtf-pl-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};
		
		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.edgtf-pl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}
			
			if(thisPortList.hasClass('edgtf-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}
			
			if(thisPortList.hasClass('edgtf-pl-pag-infinite-scroll')) {
				thisPortList.addClass('edgtf-pl-infinite-scroll-started');
			}
			
			var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.edgtf-pl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				if(thisPortList.hasClass('edgtf-pl-pag-standard')) {
					loadingItem.addClass('edgtf-showing edgtf-standard-pag-trigger');
					thisPortList.addClass('edgtf-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('edgtf-showing');
				}
				
				var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'edgtf_core_portfolio_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: edgtfGlobalVars.vars.edgtfAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('edgtf-pl-pag-standard')) {
							nextPage++;
						}
						
						thisPortList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisPortList.hasClass('edgtf-pl-pag-standard')) {
							edgtfInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);
							
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('edgtf-pl-masonry')){
                                    edgtfResizePortfolioItems(thisPortListInner.find('.edgtf-blog-masonry-grid-sizer').width(), thisPortList);
									edgtfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('edgtf-pl-gallery') && thisPortList.hasClass('edgtf-pl-has-filter')) {
									edgtfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									edgtfInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('edgtf-pl-masonry')){
									edgtfInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('edgtf-pl-gallery') && thisPortList.hasClass('edgtf-pl-has-filter')) {
									edgtfInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else {
									edgtfInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
								}
							});
						}
						
						if(thisPortList.hasClass('edgtf-pl-infinite-scroll-started')) {
							thisPortList.removeClass('edgtf-pl-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisPortList.find('.edgtf-pl-load-more-holder').hide();
			}
		};
		
		var edgtfInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.edgtf-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.edgtf-pl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.edgtf-pl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.edgtf-pl-pag-next a');
			
			standardPagNumericItem.removeClass('edgtf-pl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('edgtf-pl-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var edgtfInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
			thisPortList.removeClass('edgtf-pl-pag-standard-animate');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				edgtfInitPortfolioListAnimation();
				edgtf.modules.parallax.edgtfInitParallax();
			}, 400);
		};
		
		var edgtfInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
			thisPortList.removeClass('edgtf-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			edgtfInitPortfolioListAnimation();
			edgtf.modules.parallax.edgtfInitParallax();
		};
		
		var edgtfInitAppendIsotopeNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('edgtf-showing');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				edgtfInitPortfolioListAnimation();
				edgtf.modules.parallax.edgtfInitParallax();
			}, 400);
		};
		
		var edgtfInitAppendGalleryNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing');
			thisPortListInner.append(responseHtml);
			edgtfInitPortfolioListAnimation();
			edgtf.modules.parallax.edgtfInitParallax();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('edgtf-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}
						
						if(thisPortList.hasClass('edgtf-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}
						
						if(thisPortList.hasClass('edgtf-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('edgtf-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			}
		};
	}

    /**
     * Initializes portfolio slider
     */
    function edgtfInitPortfolioSlider(){
        var portSlider = $('.edgtf-portfolio-slider-holder');
	
	    if(portSlider.length) {
		    portSlider.each(function () {
			    var thisPortSlider = $(this),
				    portHolder = thisPortSlider.children('.edgtf-portfolio-list-holder'),
				    portSlider = portHolder.children('.edgtf-pl-inner'),
				    numberOfItems = 4,
				    margin = 0,
				    marginLabel,
				    sliderSpeed = 5000,
				    loop = true,
				    padding = false,
				    navigation = true,
				    pagination = true;
			
			    if (typeof portHolder.data('number-of-columns') !== 'undefined' && portHolder.data('number-of-columns') !== false) {
				    numberOfItems = portHolder.data('number-of-columns');
			    }
			
			    if (typeof portHolder.data('space-between-items') !== 'undefined' && portHolder.data('space-between-items') !== false) {
				    marginLabel = portHolder.data('space-between-items');
				
				    if (marginLabel === 'normal') {
                        margin = 30;
                    } else if (marginLabel === 'small') {
					    margin = 20;
				    } else if (marginLabel === 'tiny') {
                        margin = 10;
                    } else {
					    margin = 0;
				    }
			    }
			
			    if (typeof portHolder.data('slider-speed') !== 'undefined' && portHolder.data('slider-speed') !== false) {
				    sliderSpeed = portHolder.data('slider-speed');
			    }
			    if (typeof portHolder.data('enable-loop') !== 'undefined' && portHolder.data('enable-loop') !== false && portHolder.data('enable-loop') === 'no') {
				    loop = false;
			    }
			    if (typeof portHolder.data('enable-padding') !== 'undefined' && portHolder.data('enable-padding') !== false && portHolder.data('enable-padding') === 'yes') {
				    padding = true;
			    }
			    if (typeof portHolder.data('enable-navigation') !== 'undefined' && portHolder.data('enable-navigation') !== false && portHolder.data('enable-navigation') === 'no') {
				    navigation = false;
			    }
			    if (typeof portHolder.data('enable-pagination') !== 'undefined' && portHolder.data('enable-pagination') !== false && portHolder.data('enable-pagination') === 'no') {
				    pagination = false;
			    }
			
			    var responsiveNumberOfItems1 = 1,
				    responsiveNumberOfItems2 = 2,
				    responsiveNumberOfItems3 = 3;
			
			    if (numberOfItems < 3) {
				    responsiveNumberOfItems1 = numberOfItems;
				    responsiveNumberOfItems2 = numberOfItems;
				    responsiveNumberOfItems3 = numberOfItems;
			    }
			
			    portSlider.owlCarousel({
				    items: numberOfItems,
				    margin: margin,
				    loop: loop,
				    autoplay: true,
				    autoplayTimeout: sliderSpeed,
				    autoplayHoverPause: true,
				    smartSpeed: 800,
				    nav: navigation,
				    navText: [
					    '<span class="edgtf-prev-icon"><span class="edgtf-icon-arrow icon-arrows-left"></span></span>',
					    '<span class="edgtf-next-icon"><span class="edgtf-icon-arrow icon-arrows-right"></span></span>'
				    ],
				    dots: pagination,
				    responsive: {
					    0: {
						    items: responsiveNumberOfItems1,
						    stagePadding: 0
					    },
					    600: {
						    items: responsiveNumberOfItems2
					    },
					    768: {
						    items: responsiveNumberOfItems3
					    },
					    1024: {
						    items: numberOfItems
					    }
				    },
				    onInitialize: function () {
				    	edgtf.modules.parallax.edgtfInitParallax(); // reInit parallax function
				    }
			    });
			
			    thisPortSlider.css('opacity', '1');
		    });
	    }
    }

    var edgtfPortfolioSingleFollow = function() {
        var info = $('.edgtf-follow-portfolio-info .edgtf-portfolio-single-holder .edgtf-ps-info-sticky-holder');

        if (info.length) {
            var infoHolderOffset = info.offset().top,
                infoHolderHeight = info.height(),
                mediaHolder = $('.edgtf-ps-image-holder'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .edgtf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function() {
            if(info.length) {
                if (mediaHolderHeight > infoHolderHeight) {
                    if(edgtf.scroll > infoHolderOffset) {
                        var marginTop = edgtf.scroll + headerHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar - infoHolderOffset;
                        // if scroll is initially positioned below mediaHolderHeight
                        if(marginTop + infoHolderHeight > mediaHolderHeight){
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.animate({
                            marginTop: marginTop
                        });
                    }
                }
            }
        };

        var recalculateInfoHolderPosition = function() {
            if (info.length) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(edgtf.scroll > infoHolderOffset) {
                        if(edgtf.scroll + headerHeight + infoHolderHeight <  mediaHolderHeight) {
                            //Calculate header height if header appears
                            if ($('.header-appear, .edgtf-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .edgtf-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (edgtf.scroll + headerHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar - infoHolderOffset)
                            });
                            //Reset header height
                            headerHeight = 0;
                        } else{
                            info.stop().animate({
                            	marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {
            init : function() {
                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });
            }
        };
    };
	
	function initPortfolioSingleMasonry(){
		var masonryHolder = $('.edgtf-portfolio-single-holder .edgtf-ps-masonry-images'),
			masonry       = masonryHolder.children();
		
		if(masonry.length){
            masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.edgtf-ps-image',
                percentPosition: true,
                packery: {
                    gutter: '.edgtf-ps-grid-gutter',
                    columnWidth: '.edgtf-ps-grid-sizer'
                }
            });

            masonry.css('opacity', '1');
		}
	}

})(jQuery);
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