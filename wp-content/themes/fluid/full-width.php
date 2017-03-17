<?php 
/*
Template Name: Full Width
*/ 
?>
<?php
$edgtf_sidebar_layout  = fluid_edge_sidebar_layout();

get_header();
fluid_edge_get_title();
get_template_part('slider');
?>
<div class="edgtf-full-width">
	<div class="edgtf-full-width-inner">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="edgtf-grid-row">
				<div <?php echo fluid_edge_get_content_sidebar_class(); ?>>
					<?php
					the_content();
					do_action('fluid_edge_action_page_after_content');
					?>
				</div>
				<?php if($edgtf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo fluid_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>