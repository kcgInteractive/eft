<?php
$rand = rand(0, 1000);
?>
<div class="edgtf-video-button-link-holder">
	<a class="edgtf-video-button-link-play" <?php echo fluid_edge_get_inline_style($play_button_styles); ?> href="<?php echo esc_url($video_link); ?>" target="_self" data-rel="prettyPhoto[video_button_link_pretty_photo_<?php echo esc_attr($rand); ?>]">
		<span class="edgtf-video-button-link-play-inner">
			<span class="edgtf-video-button-link-text"  <?php echo fluid_edge_get_inline_style($play_button_text_styles); ?>><?php echo esc_html($button_text); ?></span>
			<span class="arrow_triangle-right_alt"  <?php echo fluid_edge_get_inline_style($play_button_icon_styles); ?>></span>
		</span>
	</a>
</div>