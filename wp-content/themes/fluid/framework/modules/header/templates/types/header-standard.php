<?php do_action('fluid_edge_action_before_page_header'); ?>

<header class="edgtf-page-header">
	<?php if($show_fixed_wrapper) : ?>
	<div class="edgtf-fixed-wrapper">
		<?php endif; ?>
		<div class="edgtf-menu-area <?php echo esc_attr($standard_menu_area_class); ?>">
			<?php do_action( 'fluid_edge_action_after_header_menu_area_html_open' )?>
			<?php if($header_in_grid) : ?>
			<div class="edgtf-grid">
				<?php endif; ?>
				<div class="edgtf-vertical-align-containers">
					<div class="edgtf-position-left">
						<div class="edgtf-position-left-inner">
							<?php if(!$hide_logo) {
								fluid_edge_get_logo();
							} ?>
							<?php if($set_menu_area_position === 'left') : ?>
								<?php fluid_edge_get_main_menu(); ?>
							<?php endif; ?>
						</div>
					</div>
					<?php if($set_menu_area_position === 'center') : ?>
						<div class="edgtf-position-center">
							<div class="edgtf-position-center-inner">
								<?php fluid_edge_get_main_menu(); ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="edgtf-position-right">
						<div class="edgtf-position-right-inner">
							<?php if($set_menu_area_position === 'right') : ?>
								<?php fluid_edge_get_main_menu(); ?>
							<?php endif; ?>

							<?php fluid_edge_get_header_widget_area(); ?>
						</div>
					</div>
				</div>
				<?php if($header_in_grid) : ?>
			</div>
		<?php endif; ?>
		</div>
		<?php if($show_fixed_wrapper) { ?>
		<?php do_action('fluid_edge_action_end_of_page_header_html'); ?>
	</div>
<?php } else {
	do_action('fluid_edge_action_end_of_page_header_html');
} ?>
	<?php if($show_sticky) {
		fluid_edge_get_sticky_header();
	} ?>
</header>

<?php do_action('fluid_edge_action_after_page_header'); ?>

