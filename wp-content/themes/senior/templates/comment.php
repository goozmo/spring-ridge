<div class="avatar">
	<?php echo get_avatar( $comment, $size = '64' ); ?>	
</div>
<div class="body">
	<span class="author-link">
		<?php echo get_comment_author_link(); ?>
	</span> / 
	<time datetime="<?php echo comment_date( 'c' ); ?>"><a
			href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s', 'wheels' ), get_comment_date(), get_comment_time() ); ?></a>
	</time> /
	<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	<?php if (is_user_logged_in()): ?>
		
	/ <?php edit_comment_link( __( '(Edit)', 'wheels' ), '', '' ); ?>
	<?php endif ?>

	<?php if ( $comment->comment_approved == '0' ) : ?>
		<div class="alert alert-info">
			<?php _e( 'Your comment is awaiting moderation.', 'wheels' ); ?>
		</div>
	<?php endif; ?>

	<?php comment_text(); ?>
	<hr />
