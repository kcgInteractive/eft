<?php
$edgtf_sidebar_layout = fluid_edge_sidebar_layout();

get_header();
fluid_edge_get_title();
?>
<div class="edgtf-container">
    <?php do_action('fluid_edge_action_after_container_open'); ?>
    <div class="edgtf-container-inner clearfix">
        <div class="edgtf-container">
            <?php do_action('fluid_edge_action_after_container_open'); ?>
            <div class="edgtf-container-inner">
	            <div class="edgtf-grid-row">
		            <div <?php echo fluid_edge_get_content_sidebar_class(); ?>>
                        <div class="edgtf-search-page-holder">
                            <form action="<?php echo esc_url(home_url('/')); ?>" class="edgtf-search-page-form" method="get">
                                <h2 class="edgtf-search-title"><?php esc_html_e('Search results:', 'fluid'); ?></h2>
                                <div class="edgtf-form-holder">
                                    <div class="edgtf-column-left">
                                        <input type="text" name="s" class="edgtf-search-field" autocomplete="off" value="" placeholder="<?php esc_html_e('Type here', 'fluid'); ?>"/>
                                    </div>
                                    <div class="edgtf-column-right">
                                        <button type="submit" class="edgtf-search-submit"><span class="icon_search"></span></button>
                                    </div>
                                </div>
                                <div class="edgtf-search-label">
                                    <?php esc_html_e("If you are not happy with the results below please do another search", "fluid"); ?>
                                </div>
                            </form>
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="edgtf-post-content">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="edgtf-post-image">
                                                <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <?php the_post_thumbnail('thumbnail'); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="edgtf-post-title-area <?php if (!has_post_thumbnail()) { echo esc_attr('edgtf-no-thumbnail'); } ?>">
                                            <div class="edgtf-post-title-area-inner">
                                                <h4 itemprop="name" class="edgtf-post-title entry-title">
                                                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <?php
                                                $edgtf_my_excerpt = get_the_excerpt();
                                                if ($edgtf_my_excerpt != '') { ?>
                                                    <p itemprop="description" class="edgtf-post-excerpt"><?php echo esc_html($edgtf_my_excerpt); ?></p>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <p class="edgtf-blog-no-posts"><?php esc_html_e('No posts were found.', 'fluid'); ?></p>
                            <?php endif; ?>
                            <?php
                                if ( get_query_var('paged') ) { $edgtf_paged = get_query_var('paged'); }
                                elseif ( get_query_var('page') ) { $edgtf_paged = get_query_var('page'); }
                                else { $edgtf_paged = 1; }

                                $edgtf_params['max_num_pages'] = fluid_edge_get_max_number_of_pages();
                                $edgtf_params['paged'] = $edgtf_paged;
                                fluid_edge_get_module_template_part('templates/parts/pagination/standard', 'blog', '', $edgtf_params);
                            ?>
                        </div>
                        <?php do_action('fluid_edge_page_after_content'); ?>
                    </div>
		            <?php if($edgtf_sidebar_layout !== 'no-sidebar') { ?>
			            <div <?php echo fluid_edge_get_sidebar_holder_class(); ?>>
				            <?php get_sidebar(); ?>
			            </div>
		            <?php } ?>
                </div>
				<?php do_action('fluid_edge_action_before_container_close'); ?>
            </div>
        </div>
    </div>
    <?php do_action('fluid_edge_action_before_container_close'); ?>
</div>
<?php get_footer(); ?>