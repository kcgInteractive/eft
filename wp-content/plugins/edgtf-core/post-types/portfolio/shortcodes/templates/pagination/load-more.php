<?php if($query_results->max_num_pages > 1) { ?>
	<div class="edgtf-pl-loading">
		<div class="edgtf-pl-loading-bounce1"></div>
		<div class="edgtf-pl-loading-bounce2"></div>
		<div class="edgtf-pl-loading-bounce3"></div>
	</div>
	<div class="edgtf-pl-load-more-holder">
		<div class="edgtf-pl-load-more">
			<?php 
				echo fluid_edge_get_button_html(array(
					'link' => 'javascript: void(0)',
					'size' => 'large',
					'text' => esc_html__('Load More', 'edgtf-core')
				));
			?>
		</div>
	</div>
<?php }