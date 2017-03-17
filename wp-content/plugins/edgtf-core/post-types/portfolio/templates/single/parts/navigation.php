<?php if(fluid_edge_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = fluid_edge_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    ?>
    <div class="edgtf-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="edgtf-ps-prev">
                <?php if($nav_same_category) {
	                previous_post_link('%link','<span class="edgtf-ps-nav-mark ion-ios-arrow-left"></span>', true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link','<span class="edgtf-ps-nav-mark ion-ios-arrow-left"></span>');
                } ?>
            </div>
        <?php endif; ?>

        <?php if($back_to_link !== '') : ?>
            <div class="edgtf-ps-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <?php echo fluid_edge_icon_collections()->renderIcon('icon_grid-2x2', 'font_elegant') ?>
                </a>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="edgtf-ps-next">
                <?php if($nav_same_category) {
                    next_post_link('%link', '<span class="edgtf-ps-nav-mark ion-ios-arrow-right"></span>', true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', '<span class="edgtf-ps-nav-mark ion-ios-arrow-right"></span>');
                } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>