<?php if(fluid_edge_options()->getOptionValue('enable_social_share') == 'yes' && fluid_edge_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="edgtf-ps-info-item edgtf-ps-social-share">
        <?php echo fluid_edge_get_social_share_html() ?>
    </div>
<?php endif; ?>