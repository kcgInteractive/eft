<?php
/*
Template Name: Coming Soon Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	    <?php
	    /**
	     * fluid_edge_action_header_meta hook
	     *
	     * @see fluid_edge_header_meta() - hooked with 10
	     * @see fluid_edge_user_scalable_meta() - hooked with 10
	     */
	    do_action('fluid_edge_action_header_meta');

	    wp_head(); ?>
    </head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<?php
		/**
		 * fluid_edge_action_after_body_tag hook
		 *
		 * @see fluid_edge_get_side_area() - hooked with 10
		 * @see fluid_edge_smooth_page_transitions() - hooked with 10
		 */
		do_action('fluid_edge_action_after_body_tag'); ?>

		<div class="edgtf-wrapper">
			<div class="edgtf-wrapper-inner">
				<div class="edgtf-content">
		            <div class="edgtf-content-inner">
						<div class="edgtf-full-width">
							<div class="edgtf-full-width-inner">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>