<div class="edgtf-ss-item" <?php echo fluid_edge_get_inline_attrs($item_responsive_data); ?>>
	<div class="edgtf-ss-item-content <?php echo esc_attr($content_class); ?>" <?php echo fluid_edge_get_inline_style($content_style); ?>>
		<?php echo do_shortcode($content); ?>
	</div>
	<div class="edgtf-ss-item-watermark" <?php echo fluid_edge_get_inline_style($watermark_style); ?>></div>
</div>