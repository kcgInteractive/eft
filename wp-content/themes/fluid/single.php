<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php
        fluid_edge_include_blog_helper_functions('singles', 'standard');
		//Action added for applying module specific filters that couldn't be applied on init
		do_action('fluid_edge_action_blog_single_loaded');
        $edgtf_holder_params = fluid_edge_get_holder_params_blog();
        ?>

        <?php fluid_edge_get_title(false, 'blog'); ?>
            <?php get_template_part('slider'); ?>
            <div class="<?php echo esc_attr($edgtf_holder_params['holder']); ?>">
                <?php do_action('fluid_edge_action_after_container_open'); ?>
                <div class="<?php echo esc_attr($edgtf_holder_params['inner']); ?>">
                    <?php fluid_edge_get_blog_single('standard'); ?>
                </div>
            <?php do_action('fluid_edge_action_before_container_close'); ?>
            </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>