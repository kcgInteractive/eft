<li class="edgtf-bl-item clearfix">
	<div class="edgtf-bli-inner">
		<?php if( $featured_image === 'yes' ) {
			fluid_edge_get_module_template_part('templates/parts/image', 'blog', '', $params);
		} ?>

        <div class="edgtf-bli-content">
	        <?php if($post_info_section == 'yes' && $post_info_date == 'yes') {
		        fluid_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
	        } ?>

            <?php fluid_edge_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

            <?php
            if($post_info_section == 'yes') { ?>
                <div class="edgtf-bli-info">
                    <?php
	                    if ($post_info_category == 'yes') {
	                        fluid_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
	                    }
	                    if ($post_info_author == 'yes') {
	                        fluid_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
	                    }
	                    if ($post_info_comments == 'yes') {
	                        fluid_edge_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
	                    }
	                    if ($post_info_like == 'yes') {
	                        fluid_edge_get_module_template_part('templates/parts/post-info/like', 'blog', '', $params);
	                    }
	                    if ($post_info_share == 'yes') {
	                        fluid_edge_get_module_template_part('templates/parts/post-info/share', 'blog', '', $params);
	                    }
                    ?>
                </div>
            <?php } ?>
            <div class="edgtf-bli-excerpt">
                <?php fluid_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
                <?php fluid_edge_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
            </div>
        </div>
	</div>
</li>