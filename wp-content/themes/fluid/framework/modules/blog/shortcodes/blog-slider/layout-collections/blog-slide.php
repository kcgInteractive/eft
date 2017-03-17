<li class="edgtf-blog-slider-item">
    <div class="edgtf-blog-slider-item-inner">
        <div class="edgtf-item-image clearfix">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size); ?>
            </a>
        </div>
        <div class="edgtf-item-text-wrapper">
            <div class="edgtf-item-text-holder">
                <div class="edgtf-item-text-holder-inner">
                    <?php if($post_info_date == 'yes' || $post_info_category == 'yes' || $post_info_author == 'yes' || $post_info_comments == 'yes'){ ?>
                        <div class="edgtf-item-info-section">
                            <?php fluid_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params); ?>
                            <?php fluid_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params); ?>
                            <?php fluid_edge_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params); ?>
                            <?php fluid_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params); ?>
                        </div>
                    <?php } ?>

                    <<?php echo esc_attr( $title_tag)?> itemprop="name" class="edgtf-item-title entry-title">
                        <a itemprop="url" href="<?php echo esc_url(get_permalink()); ?>">
                            <?php echo get_the_title(); ?>
                        </a>
                    </<?php echo esc_attr($title_tag); ?>>

                    <div class="edgtf-section-button-holder">
                        <?php fluid_edge_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>