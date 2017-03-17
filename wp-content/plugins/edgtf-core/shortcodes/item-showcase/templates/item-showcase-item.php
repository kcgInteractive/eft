<div class="edgtf-is-item <?php echo esc_attr($showcase_item_class); ?>">
	<div class="edgtf-is-content">
		<?php if(!empty($custom_icon)) : ?>
			<?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
		<?php else: ?>
			<?php echo edgtf_core_get_shortcode_module_template_part('templates/icon', 'item-showcase', '', array('icon_parameters' => $icon_parameters)); ?>
		<?php endif; ?>
		<?php if (!empty($item_title)) { ?>
			<<?php echo esc_attr($item_title_tag); ?> class="edgtf-is-title" <?php echo fluid_edge_get_inline_style($item_title_styles); ?>>
				<?php if (!empty($item_link)) { ?><a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target); ?>"><?php } ?>
				<?php echo esc_html($item_title); ?>
				<?php if (!empty($item_link)) { ?></a><?php } ?>
			</<?php echo esc_attr($item_title_tag); ?>>
		<?php } ?>
		<?php if (!empty($item_text)) { ?>
			<p class="edgtf-is-text" <?php echo fluid_edge_get_inline_style($item_text_styles); ?>><?php echo esc_html($item_text); ?></p>
		<?php } ?>
	</div>
</div>