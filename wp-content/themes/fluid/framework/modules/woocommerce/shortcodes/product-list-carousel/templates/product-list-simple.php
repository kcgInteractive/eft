<div class="edgtf-plc-holder <?php echo esc_attr($holder_classes) ?>">
	<div class="edgtf-plc-outer edgtf-owl-slider" <?php echo fluid_edge_get_inline_attrs($holder_data); ?>>
		<?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post(); ?>
			<div class="edgtf-plc-item">
				<div class="edgtf-grid">
					<div class="edgtf-plc-image-outer">
						<div class="edgtf-plc-image">
							<?php fluid_edge_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
						</div>
						<a class="edgtf-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
					</div>
					<div class="edgtf-plc-text-wrapper">
						<div class="edgtf-plc-text">
							<div class="edgtf-plc-text-outer">
								<div class="edgtf-plc-text-inner">
									<?php fluid_edge_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>
									
									<?php fluid_edge_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>
									
									<?php fluid_edge_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>
									
									<?php fluid_edge_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>
									
									<?php fluid_edge_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>
									
									<?php fluid_edge_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', '', $params); ?>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;	else:
			fluid_edge_get_module_template_part('templates/parts/no-posts', 'woocommerce', '', $params);
		endif;
			wp_reset_postdata();
		?>
	</div>
</div>