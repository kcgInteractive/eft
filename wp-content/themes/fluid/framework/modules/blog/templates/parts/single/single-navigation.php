<?php
$blog_single_navigation = fluid_edge_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = fluid_edge_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="edgtf-blog-single-navigation">
		<div class="edgtf-blog-single-navigation-inner clearfix">
			<?php
			/* Single navigation section - SETTING PARAMS */
			$post_navigation = array(
				'prev' => array(
					'mark' => '<span class="edgtf-blog-single-nav-mark icon-arrows-left"></span>',
					'label' => '<span class="edgtf-blog-single-nav-label">'.esc_html__('Previous', 'fluid').'</span>'
				),
				'next' => array(
					'mark' => '<span class="edgtf-blog-single-nav-mark icon-arrows-right"></span>',
					'label' => '<span class="edgtf-blog-single-nav-label">'.esc_html__('Next', 'fluid').'</span>'
				)
			);

			if(get_previous_post() !== ""){
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
				} else {
					if(get_previous_post() != ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
				}
			}
			if(get_next_post() != ""){
				if($blog_navigation_through_same_category){
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}
			}

			/* Single navigation section - RENDERING */
			if (isset($post_navigation['prev']['post']) || isset($post_navigation['next']['post'])) {
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<?php if($nav_type === 'prev') { ?>
							<div class="edgtf-blog-single-<?php print $nav_type; ?>-holder clearfix">
								<?php if( has_post_thumbnail($post_navigation[$nav_type]['post']->ID) ) { ?>
									<div class="edgtf-blog-single-thumb-wrapper">
										<a itemprop="url" class="edgtf-blog-single-nav-thumb" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
											<?php echo get_the_post_thumbnail($post_navigation[$nav_type]['post']->ID, 'thumbnail'); ?>
										</a>
									</div>
								<?php } ?>
								<div class="edgtf-blog-single-nav-wrapper">
									<a itemprop="url" class="edgtf-blog-single-<?php print $nav_type; ?> clearfix" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
										<?php echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true))); ?>
										<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
									</a>
								</div>
							</div>
						<?php } else { ?>
							<div  class="edgtf-blog-single-<?php print $nav_type; ?>-holder clearfix">
								<div class="edgtf-blog-single-nav-wrapper">
									<a itemprop="url" class="edgtf-blog-single-<?php print $nav_type; ?>  clearfix" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
										<?php echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true))); ?>
										<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
									</a>
								</div>
								<?php if( has_post_thumbnail($post_navigation[$nav_type]['post']->ID) ) { ?>
									<div class="edgtf-blog-single-thumb-wrapper">
										<a itemprop="url" class="edgtf-blog-single-nav-thumb" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
											<?php echo get_the_post_thumbnail($post_navigation[$nav_type]['post']->ID, 'thumbnail'); ?>
										</a>
									</div>
								<?php } ?>
							</div>
							<?php } ?>
					<?php }
				}
			}
			?>
		</div>
	</div>
<?php } ?>