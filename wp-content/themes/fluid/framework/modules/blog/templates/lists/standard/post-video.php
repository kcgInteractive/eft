<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-heading">
            <?php fluid_edge_get_module_template_part('templates/parts/post-type/video', 'blog', '', $part_params); ?>
        </div>
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
	            <?php fluid_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	            <div class="edgtf-post-text-main">
		            <?php fluid_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>

		            <div class="edgtf-post-info-top">
			            <?php fluid_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
			            <?php fluid_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
			            <?php fluid_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
			            <?php fluid_edge_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
		            </div>
		            <?php fluid_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
		            <?php do_action('fluid_edge_action_single_link_pages'); ?>
		            <?php fluid_edge_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
	            </div>
            </div>
        </div>
    </div>
</article>