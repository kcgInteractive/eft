<div class="edgtf-blog-slider-holder">
    <ul class="edgtf-blog-slider edgtf-owl-slider" <?php echo fluid_edge_get_inline_attrs($slider_data); ?>>
        <?php
            if($query_result->have_posts()):
                while ($query_result->have_posts()) : $query_result->the_post();
                    fluid_edge_get_module_template_part('shortcodes/blog-slider/layout-collections/blog-slide', 'blog', '', $params);
                endwhile;
            else: ?>
                <div class="edgtf-blog-slider-messsage">
                    <p><?php esc_html_e('No posts were found.', 'fluid'); ?></p>
                </div>
            <?php endif;

            wp_reset_postdata();
        ?>
    </ul>
</div>
