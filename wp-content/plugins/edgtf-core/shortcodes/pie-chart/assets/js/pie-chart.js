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