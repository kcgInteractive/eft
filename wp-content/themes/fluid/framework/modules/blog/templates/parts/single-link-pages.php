<?php
$args_pages = array(
    'before'           => '<div class="edgtf-single-links-pages"><div class="edgtf-single-links-pages-inner">',
    'after'            => '</div></div>',
    'link_before'      => '<span>'. esc_html__('Post Page Link: ', 'fluid'),
    'link_after'       => '</span>',
    'pagelink'         => '%'
);

wp_link_pages($args_pages);