<?php
/**
 * Highlight shortcode template
 */
?>

<span class="edgtf-highlight" <?php fluid_edge_inline_style($highlight_style);?>>
	<?php echo esc_html($content);?>
</span>