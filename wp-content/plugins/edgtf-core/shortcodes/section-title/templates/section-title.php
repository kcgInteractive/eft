<div class="edgtf-section-title-holder" <?php echo fluid_edge_get_inline_style($holder_styles); ?>>
	<?php if(!empty($title)) { ?>
		<<?php echo esc_attr($title_tag); ?> class="edgtf-st-title" <?php echo fluid_edge_get_inline_style($title_styles); ?>>
			<span><?php echo esc_html($title); ?></span>
		</<?php echo esc_attr($title_tag); ?>>
	<?php } ?>
	<?php if(!empty($text)) { ?>
		<p class="edgtf-st-text" <?php echo fluid_edge_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	<?php } ?>
</div>