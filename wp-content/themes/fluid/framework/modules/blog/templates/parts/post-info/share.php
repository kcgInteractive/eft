<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(fluid_edge_options()->getOptionValue('enable_social_share') === 'yes' && fluid_edge_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="edgtf-blog-share">
	    <span class="edgtf-blog-share-label"><?php echo esc_html__('Share', 'fluid'); ?></span>
        <?php echo fluid_edge_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>
