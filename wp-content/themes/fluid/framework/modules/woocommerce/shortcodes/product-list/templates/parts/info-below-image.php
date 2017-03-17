<?php
$masonry_image_size = get_post_meta(get_the_ID(), 'edgtf_product_featured_image_size', true);
if(empty($masonry_image_size)) {
	$masonry_image_size = '';
}
?>
<div class="edgtf-pli <?php echo esc_html($masonry_image_size); ?>">
	<div class="edgtf-pli-inner">
		<div class="edgtf-pli-image">
			<?php fluid_edge_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
		</div>
		<div class="edgtf-pli-text" <?php echo fluid_edge_get_inline_style($shader_styles); ?>>
			<div class="edgtf-pli-text-outer">
				<div class="edgtf-pli-text-inner">
					<?php fluid_edge_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', '', $params); ?>
				</div>
			</div>
		</div>
		<a class="edgtf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="edgtf-pli-text-wrapper" <?php echo fluid_edge_get_inline_style($text_wrapper_styles); ?>>
		<?php fluid_edge_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>

		<?php fluid_edge_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>
		
		<?php fluid_edge_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>
		
		<?php fluid_edge_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>
		
		<?php fluid_edge_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>
	</div>
</div>