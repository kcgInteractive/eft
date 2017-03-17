<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
	            <div class="edgtf-post-text-main">
		            <div class="edgtf-post-mark">
			            <?php echo fluid_edge_icon_collections()->renderIcon('icon-link', 'simple_line_icons'); ?>
		            </div>
		            <?php fluid_edge_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
	            </div>
            </div>
        </div>
    </div>
</article>