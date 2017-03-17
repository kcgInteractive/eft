<div <?php fluid_edge_class_attribute($holder_class); ?> <?php echo fluid_edge_get_inline_style($holder_styles); ?>>
	<div class="edgtf-counter-inner">
		<?php if(!empty($custom_icon)) : ?>
			<?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
		<?php elseif( isset( $icon_parameters['has_icon']) ) : ?>
			<?php echo edgtf_core_get_shortcode_module_template_part('templates/icon', 'counter', '', array('icon_parameters' => $icon_parameters)); ?>
		<?php endif; ?>
		<?php if(!empty($digit)) { ?>
			<span class="edgtf-counter <?php echo esc_attr($type) ?>" <?php echo fluid_edge_get_inline_style($counter_styles); ?>><?php echo esc_html($digit); ?></span>
		<?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="edgtf-counter-title" <?php echo fluid_edge_get_inline_style($counter_title_styles); ?>>
				<?php echo esc_html($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<p class="edgtf-counter-text" <?php echo fluid_edge_get_inline_style($counter_text_styles); ?>><?php echo esc_html($text); ?></p>
		<?php } ?>
	</div>
</div>