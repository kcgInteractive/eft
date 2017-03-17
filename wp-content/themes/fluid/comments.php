<?php if ( post_password_required() ) { ?>
		<p class="edgtf-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'fluid' ); ?></p>
<?php } else { ?>
	<?php if ( have_comments() ) { ?>
		<div class="edgtf-comment-holder clearfix" id="comments">
			<div class="edgtf-comment-holder-inner">
				<div class="edgtf-comments-title">
					<h4><?php esc_html_e('COMMENTS', 'fluid' ); ?></h4>
				</div>
				<div class="edgtf-comments">
					<ul class="edgtf-comment-list">
						<?php wp_list_comments(array( 'callback' => 'fluid_edge_comment')); ?>
					</ul>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<?php if ( ! comments_open() ) : ?>
			<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'fluid'); ?></p>
		<?php endif; ?>	
	<?php } ?>
<?php } ?>
<?php
$edgtf_commenter = wp_get_current_commenter();
$edgtf_req = get_option( 'require_name_email' );
$edgtf_aria_req = ( $edgtf_req ? " aria-required='true'" : '' );

$edgtf_args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'Post a comment','fluid' ),
	'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
	'title_reply_after' => '</h3>',
	'title_reply_to' => esc_html__( 'Post a Reply to %s','fluid' ),
	'cancel_reply_link' => esc_html__( 'cancel reply','fluid' ),
	'label_submit' => esc_html__( 'Submit','fluid' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Your comment','fluid' ).'" name="comment" cols="45" rows="6" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="edgtf-grid-row edgtf-columns-tiny-space"><div class="edgtf-grid-col-6"><input id="author" name="author" placeholder="'. esc_html__( 'Your Name','fluid' ) .'" type="text" value="' . esc_attr( $edgtf_commenter['comment_author'] ) . '"' . $edgtf_aria_req . ' /></div>',
		'email' => '<div class="edgtf-grid-col-6"><input id="email" name="email" placeholder="'. esc_html__( 'Your Email','fluid' ) .'" type="text" value="' . esc_attr(  $edgtf_commenter['comment_author_email'] ) . '"' . $edgtf_aria_req . ' /></div></div>'
		 ) ) );
 ?>
<?php if(get_comment_pages_count() > 1){ ?>
	<div class="edgtf-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<?php if(comments_open()) { ?>
	<div class="edgtf-comment-form">
		<div class="edgtf-comment-form-inner">
			<?php comment_form($edgtf_args); ?>
		</div>
	</div>
<?php } ?>	