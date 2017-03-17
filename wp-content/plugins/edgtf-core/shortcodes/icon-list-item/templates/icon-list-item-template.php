<?php $icon_html = fluid_edge_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>
<div class="edgtf-icon-list-holder" <?php echo fluid_edge_get_inline_style($holder_styles); ?>>
	<div class="edgtf-il-icon-holder">
		<?php print $icon_html;	?>
	</div>
	<p class="edgtf-il-text" <?php echo fluid_edge_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></p>
</div>