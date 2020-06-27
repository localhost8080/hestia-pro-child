<?php
/* enqueue script for parent theme stylesheeet */        
function childtheme_parent_styles() {
 
 // enqueue style
 wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );                       
}
add_action( 'wp_enqueue_scripts', 'childtheme_parent_styles');



if ( ! function_exists( 'hestia_comments_list' ) ) {
	/**
	 * Custom list of comments for the theme.
	 *
	 * @since Hestia 1.0
	 *
	 * @param string  $comment comment.
	 * @param array   $args    arguments.
	 * @param integer $depth   depth.
	 */
	function hestia_comments_list( $comment, $args, $depth ) {
		?>
		<li>
        <div <?php comment_class( empty( $args['has_children'] ) ? 'media' : 'parent media' ); ?>
				id="comment-<?php comment_ID(); ?>">
			<?php if ( $args['type'] != 'pings' ) : ?>
				<a class="pull-left" href="<?php echo esc_url( get_comment_author_url( $comment ) ); ?> ">
					<div class="comment-author avatar vcard">
						<?php
						if ( $args['avatar_size'] != 0 ) {
							echo get_avatar( $comment, 64 );
						}
						?>
					</div>
				</a>
			<?php endif; ?>
			<div class="media-body">
				<h4 class="media-heading">
					<?php echo get_comment_author_link(); ?>
					<small>
						<?php
						printf(
							/* translators: %1$s is Date, %2$s is Time */
							esc_html__( '&#183; %1$s at %2$s', 'hestia-pro' ),
							get_comment_date(),
							get_comment_time()
						);
						edit_comment_link( esc_html__( '(Edit)', 'hestia-pro' ), '  ', '' );
						?>
					</small>
				</h4>
				<?php comment_text(); ?>
				<div class="media-footer">
					<?php
					echo get_comment_reply_link(
						array(
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
							'reply_text' => sprintf( '<i class="fas fa-reply"></i> %s', esc_html__( 'Reply', 'hestia-pro' ) ),
						),
						$comment->comment_ID,
						$comment->comment_post_ID
					);
					?>
				</div>
			</div>
		</div>
        </li>
		<?php
	}
}
