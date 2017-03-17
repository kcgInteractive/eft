<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * fluid_edge_action_header_meta hook
     *
     * @see fluid_edge_header_meta() - hooked with 10
     * @see fluid_edge_user_scalable_meta - hooked with 10
     */
    do_action('fluid_edge_action_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * fluid_edge_action_after_body_tag hook
	 *
	 * @see fluid_edge_get_side_area() - hooked with 10
	 * @see fluid_edge_smooth_page_transitions() - hooked with 10
	 */
	do_action('fluid_edge_action_after_body_tag'); ?>
	
	<div class="edgtf-wrapper edgtf-404-page">
	    <div class="edgtf-wrapper-inner">
		    <?php fluid_edge_get_header(); ?>
		    
			<div class="edgtf-content" <?php fluid_edge_content_elem_style_attr(); ?>>
	            <div class="edgtf-content-inner">
					<div class="edgtf-page-not-found">
						<?php
							$edgtf_title_image_404 = fluid_edge_options()->getOptionValue('404_page_title_image');
							$edgtf_title_404       = fluid_edge_options()->getOptionValue('404_title');
							$edgtf_text_404        = fluid_edge_options()->getOptionValue('404_text');
							$edgtf_button_label    = fluid_edge_options()->getOptionValue('404_back_to_home');
						?>

						<?php if (!empty($edgtf_title_image_404)) { ?>
							<div class="edgtf-404-title-image"><img src="<?php echo esc_url($edgtf_title_image_404); ?>" alt="<?php esc_html_e('404 Title Image', 'fluid'); ?>" /></div>
						<?php } ?>
						<div class="edgtf-404-content-wrap">
							<h1 class="edgtf-page-not-found-title">
								<?php if(!empty($edgtf_title_404)) {
									echo esc_html($edgtf_title_404);
								} else {
									esc_html_e('404 Error. Page not Found', 'fluid');
								} ?>
							</h1>

							<p class="edgtf-page-not-found-text">
								<?php if(!empty($edgtf_text_404)){
									echo esc_html($edgtf_text_404);
								} else {
									esc_html_e('Oops! It seems the page you are looking for does not exist. It might have been moved or deleted.', 'fluid');
								} ?>
							</p>

							<?php
								$edgtf_params = array();
								$edgtf_params['text'] = !empty($edgtf_button_label) ? $edgtf_button_label : esc_html__('Back to Home', 'fluid');
								$edgtf_params['link'] = esc_url(home_url('/'));
								$edgtf_params['target'] = '_self';
							
								if (fluid_edge_options()->getOptionValue('404_button_style') == 'light-button'){
									$edgtf_params['custom_class'] = 'edgtf-btn-light';
								}

							echo fluid_edge_execute_shortcode('edgtf_button',$edgtf_params);?>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>		
	<?php wp_footer(); ?>
</body>
</html>