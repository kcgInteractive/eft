<?php
get_header();
fluid_edge_get_title(); ?>
<div class="edgtf-container edgtf-default-page-template">
	<?php do_action('fluid_edge_action_after_container_open'); ?>
	<div class="edgtf-container-inner clearfix">
		<?php
			$edgtf_taxonomy_id = get_queried_object_id();
			$edgtf_taxonomy = !empty($edgtf_taxonomy_id) ? get_category($edgtf_taxonomy_id) : '';
			$edgtf_taxonomy_slug = !empty($edgtf_taxonomy) ? $edgtf_taxonomy->slug : '';
		
			edgtf_core_get_team_category_list($edgtf_taxonomy_slug);
		?>
	</div>
	<?php do_action('fluid_edge_action_before_container_close'); ?>
</div>
<?php get_footer(); ?>
