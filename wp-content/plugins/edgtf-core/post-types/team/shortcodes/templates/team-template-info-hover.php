<div class="edgtf-team <?php echo esc_attr($team_member_layout) ?>">
    <div class="edgtf-team-inner">
        <?php if (get_the_post_thumbnail($member_id) !== '') { ?>
            <div class="edgtf-team-image">
                <?php echo get_the_post_thumbnail($member_id); ?>
                <div class="edgtf-team-info-tb" <?php echo fluid_edge_get_inline_style($item_info_styles); ?>>
                    <div class="edgtf-team-info-tc">
                        <div class="edgtf-team-title-holder">
                            <h5 itemprop="name" class="edgtf-team-name entry-title">
                                <a itemprop="url" href="<?php echo esc_url(get_the_permalink($member_id)) ?>"><?php echo esc_html($title) ?></a>
                            </h5>
                            <?php if (!empty($position)) { ?>
                                <p class="edgtf-team-position"><?php echo esc_html($position); ?></p>
                            <?php } ?>
                        </div>
	                    <div class="edgtf-team-social-holder-between">
		                    <div class="edgtf-team-social">
			                    <div class="edgtf-team-social-inner">
				                    <div class="edgtf-team-social-wrapp">
					                    <?php foreach ($team_social_icons as $team_social_icon) {
						                    print $team_social_icon;
					                    } ?>
				                    </div>
			                    </div>
		                    </div>
	                    </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>