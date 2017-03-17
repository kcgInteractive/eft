<div class="edgtf-portfolio-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<?php echo edgtf_core_get_cpt_shortcode_module_template_part('portfolio', 'parts/filter', '', $params); ?>
	
	<div class="edgtf-pl-inner clearfix">
		<div class="edgtf-pl-grid-sizer"></div>
		<div class="edgtf-pl-grid-gutter"></div>
		<?php 
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					echo edgtf_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-item', $item_style, $params);
				endwhile;
			else:
				echo edgtf_core_get_cpt_shortcode_module_template_part('portfolio', 'parts/posts-not-found');
			endif;
		
			wp_reset_postdata();
		?>
	</div>
	
	<?php echo edgtf_core_get_cpt_shortcode_module_template_part('portfolio', 'pagination/'.$pagination_type, '', array(), $additional_params); ?>
</div>