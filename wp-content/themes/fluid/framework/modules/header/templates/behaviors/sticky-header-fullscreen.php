<?php do_action('fluid_edge_action_after_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action('fluid_edge_action_after_sticky_menu_html_open'); ?>
    <div class="edgtf-sticky-holder">
        <?php if ($sticky_header_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class=" edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if (!$hide_logo) {
	                        fluid_edge_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <a href="javascript:void(0)" class="edgtf-fullscreen-menu-opener">
                                <span class="edgtf-fm-lines">
									<span class="edgtf-fm-line edgtf-line-1"></span>
									<span class="edgtf-fm-line edgtf-line-2"></span>
									<span class="edgtf-fm-line edgtf-line-3"></span>
								</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('fluid_edge_action_after_sticky_header'); ?>
