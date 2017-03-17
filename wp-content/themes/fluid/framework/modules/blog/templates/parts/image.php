<?php
$featured_image_size = isset($featured_image_size) ? $featured_image_size : 'full';
$featured_image_meta = get_post_meta(get_the_ID(), 'edgtf_blog_list_featured_image_meta', true);
if(!empty($featured_image_size) && !empty($featured_image_meta)) {
	$featured_image_metas = wp_get_attachment_image_src(fluid_edge_get_attachment_id_from_url($featured_image_meta), $featured_image_size);
	$featured_image_meta = $featured_image_metas[0];
}
$has_featured = !empty($featured_image_meta) || has_post_thumbnail();

$blog_list_image_src = !empty($featured_image_meta) && fluid_edge_blog_item_has_link() ? $featured_image_meta : '';
?>

<?php if ( $has_featured ) { ?>
	<div class="edgtf-post-image">
        <?php if(fluid_edge_blog_item_has_link()) { ?>
		    <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php } ?>
        <?php if($blog_list_image_src !== '')  { ?>
            <img itemprop="image" class="edgtf-custom-post-image" src="<?php echo esc_url($blog_list_image_src); ?>" alt="<?php esc_html_e('Blog list featured image', 'fluid'); ?>" />
        <?php } else { ?>
            <?php the_post_thumbnail($featured_image_size); ?>
        <?php } ?>
        <?php if(fluid_edge_blog_item_has_link()) { ?>
		    </a>
        <?php } ?>
	</div>
<?php } ?>