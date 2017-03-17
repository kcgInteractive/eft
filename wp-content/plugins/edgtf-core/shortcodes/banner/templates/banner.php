<div class="edgtf-banner-holder">
    <div class="edgtf-banner-image">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>
    <div class="edgtf-banner-text-holder">
	    <div class="edgtf-banner-text-inner">
	        <?php if(!empty($subtitle)) { ?>
	            <<?php echo esc_attr($subtitle_tag); ?> class="edgtf-banner-subtitle" <?php echo fluid_edge_get_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
	        <?php } ?>
	        <?php if(!empty($title)) { ?>
	            <<?php echo esc_attr($title_tag); ?> class="edgtf-banner-title" <?php echo fluid_edge_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
	        <?php } ?>
			<?php if(!empty($text)) { ?>
	            <p class="edgtf-banner-text" <?php echo fluid_edge_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	        <?php } ?>
		</div>
	</div>
	<?php if (!empty($link)) { ?>
        <a itemprop="url" class="edgtf-banner-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
    <?php } ?>
</div>