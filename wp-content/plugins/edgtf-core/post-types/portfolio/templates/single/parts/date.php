<?php if(fluid_edge_options()->getOptionValue('portfolio_single_hide_date') === 'yes') : ?>
    <div class="edgtf-ps-info-item edgtf-ps-date">
        <p class="edgtf-ps-info-title"><?php esc_html_e('Date:', 'edgtf-core'); ?></p>
        <p itemprop="dateCreated" class="edgtf-ps-info-date entry-date updated"><?php the_time(get_option('date_format')); ?></p>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(fluid_edge_get_page_id()); ?>"/>
    </div>
<?php endif; ?>