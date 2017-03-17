</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<?php if($display_footer) { ?>
			<footer class="edgtf-page-footer">
				<?php
					if($display_footer_top) {
						fluid_edge_get_footer_top();
					}
					if($display_footer_bottom) {
						fluid_edge_get_footer_bottom();
					}
				?>
			</footer>
		<?php } else { ?>
			<?php wp_footer(); ?>
		<?php } ?>
	</div> <!-- close div.edgtf-wrapper-inner  -->
</div> <!-- close div.edgtf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>