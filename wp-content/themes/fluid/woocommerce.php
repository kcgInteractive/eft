<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php
$edgtf_sidebar_layout  = fluid_edge_sidebar_layout();

get_header();
fluid_edge_get_title();

//Woocommerce content
if ( ! is_singular('product') ) {
	get_template_part('slider');
?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<div class="edgtf-grid-row">
				<div <?php echo fluid_edge_get_content_sidebar_class(); ?>>
					<?php fluid_edge_woocommerce_content(); ?>
				</div>
				<?php if($edgtf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo fluid_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<?php fluid_edge_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>