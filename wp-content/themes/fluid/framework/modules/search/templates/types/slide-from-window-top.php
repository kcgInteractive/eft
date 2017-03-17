<?php ?>
<form action="<?php echo esc_url(home_url('/')); ?>" class="edgtf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
		<div class="edgtf-container">
			<div class="edgtf-container-inner clearfix">
				<?php } ?>
					<div class="form-inner">
						<i class="fa fa-search"></i>
						<input type="text" placeholder="<?php esc_html_e('Search', 'fluid'); ?>" name="s" class="edgtf-search-field" autocomplete="off" />
						<input type="submit" value="Search" />
						<div class="edgtf-search-close">
							<a href="#">
                                <?php print $search_icon_close; ?>
							</a>
						</div>
					</div>
				<?php if ( $search_in_grid ) { ?>
			</div>
		</div>
	<?php } ?>
</form>