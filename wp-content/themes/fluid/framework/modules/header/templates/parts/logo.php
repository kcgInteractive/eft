<?php
	$attachment_meta = fluid_edge_get_attachment_meta_from_url($logo_image);
	$hwstring = !empty($attachment_meta) ? image_hwstring( $attachment_meta['width'], $attachment_meta['height'] ) : '';

	if(!empty($logo_image_dark)) {
		$attachment_meta_dark = fluid_edge_get_attachment_meta_from_url($logo_image_dark);
		$hwstring_dark = !empty($attachment_meta_dark) ? image_hwstring($attachment_meta_dark['width'], $attachment_meta_dark['height']) : '';
	}

	if(!empty($logo_image_light)) {
		$attachment_meta_light = fluid_edge_get_attachment_meta_from_url( $logo_image_light );
		$hwstring_light = !empty($attachment_meta_light) ? image_hwstring($attachment_meta_light['width'], $attachment_meta_light['height']) : '';
	}
?>

<?php do_action('fluid_edge_action_before_site_logo'); ?>

<div class="edgtf-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php fluid_edge_inline_style($logo_styles); ?>>
        <img itemprop="image" class="edgtf-normal-logo" src="<?php echo esc_url($logo_image); ?>" <?php print $hwstring; ?> alt="<?php esc_html_e('logo','fluid'); ?>"/>
        <?php if(!empty($logo_image_dark)){ ?><img itemprop="image" class="edgtf-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" <?php print $hwstring_dark; ?> alt="<?php esc_html_e('dark logo','fluid'); ?>"/><?php } ?>
        <?php if(!empty($logo_image_light)){ ?><img itemprop="image" class="edgtf-light-logo" src="<?php echo esc_url($logo_image_light); ?>" <?php print $hwstring_light; ?> alt="<?php esc_html_e('light logo','fluid'); ?>"/><?php } ?>
    </a>
</div>

<?php do_action('fluid_edge_action_after_site_logo'); ?>