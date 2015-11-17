<?php $top_bar_text = wheels_get_option( 'top-bar-text', '' ); ?>
<?php if ( $top_bar_text ): ?>
	<div class="<?php echo wheels_class( 'top-bar-text' ); ?>">
		<?php echo do_shortcode( $top_bar_text ); ?>
	</div>
<?php endif; ?>
