<?php
	$attachment_meta = fluid_edge_get_attachment_meta_from_url($logo_image);
	$hwstring = !empty($attachment_meta) ? image_hwstring( $attachment_meta['width'], $attachment_meta['height'] ) : '';
?>

<?php do_action('fluid_edge_action_before_mobile_logo'); ?>

<div class="edgtf-mobile-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php fluid_edge_inline_style($logo_styles); ?>>
        <img itemprop="image" src="<?php echo esc_url($logo_image); ?>" <?php print $hwstring; ?> alt="<?php esc_html_e('mobile logo','fluid'); ?>"/>
    </a>
</div>

<?php do_action('fluid_edge_action_after_mobile_logo'); ?>