<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
	            <div class="edgtf-post-text-main">
		            <div class="edgtf-post-mark">
			            <?php echo fluid_edge_icon_collections()->renderIcon('icon-bubbles', 'simple_line_icons'); ?>
		            </div>
		            <?php fluid_edge_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
	            </div>
            </div>
        </div>
    </div>
	<?php fluid_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	<div class="edgtf-post-info-top">
		<?php fluid_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
		<?php fluid_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
		<?php fluid_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
		<?php fluid_edge_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
	</div>
    <div class="edgtf-post-additional-content">
        <?php the_content(); ?>
    </div>
	<div class="edgtf-post-info-bottom">
		<?php fluid_edge_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
	</div>
</article>