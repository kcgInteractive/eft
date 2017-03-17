<div class="edgtf-blog-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<div class="edgtf-bl-wrapper">
		<ul class="edgtf-blog-list">
			<div class="edgtf-bl-grid-sizer"></div>
			<div class="edgtf-bl-grid-gutter"></div>
			<?php
	            if($query_result->have_posts()):
	                while ($query_result->have_posts()) : $query_result->the_post();
	                    fluid_edge_get_module_template_part('shortcodes/blog-list/layout-collections/'.$type, 'blog', '', $params);
	                endwhile;
	            else:
	                fluid_edge_get_module_template_part('templates/parts/no-posts', 'blog', '', $params);
	            endif;
			
                wp_reset_postdata();
			?>
		</ul>
	</div>
	<?php fluid_edge_get_module_template_part('templates/parts/pagination/'.$params['pagination_type'], 'blog', '', $params); ?>
</div>