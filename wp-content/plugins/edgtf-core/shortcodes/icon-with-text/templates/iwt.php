<div <?php fluid_edge_class_attribute($holder_classes); ?>>
	<div class="edgtf-iwt-icon">
		<?php if(!empty($link)) : ?>
			<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
		<?php endif; ?>
			<?php if(!empty($custom_icon)) : ?>
				<?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
			<?php else: ?>
				<?php echo edgtf_core_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
			<?php endif; ?>
		<?php if(!empty($link)) : ?>
			</a>
		<?php endif; ?>
	</div>
	<?php if ($underline_effect == 'yes') { ?>
		<div class="edgtf-iwt-line" <?php fluid_edge_inline_style($line_styles); ?>></div>
	<?php } ?>
	<div class="edgtf-iwt-content" <?php fluid_edge_inline_style($content_styles); ?>>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="edgtf-iwt-title" <?php fluid_edge_inline_style($title_styles); ?>>
				<?php if(!empty($link)) : ?>
					<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
				<?php endif; ?>
					<span class="edgtf-iwt-title-text"><?php echo wp_kses($title, array('br' => true)); ?></span>
					<?php if(!empty($title_description)) { ?>
						<span class="edgtf-iwt-title-description"><?php echo esc_html($title_description); ?></span>
					<?php } ?>
				<?php if(!empty($link)) : ?>
					</a>
				<?php endif; ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<p class="edgtf-iwt-text" <?php fluid_edge_inline_style($text_styles); ?>><?php echo wp_kses($text, array('br') ); ?></p>
		<?php } ?>
	</div>
</div>