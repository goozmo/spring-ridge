<?php $top_bar_additional_text = wheels_get_option( 'top-bar-additional-text', '' ); ?>
<div class="<?php echo wheels_class( 'top-bar-additional' ); ?>">
	<div class="<?php echo wheels_class( 'container' ); ?>">
		<?php if ( $top_bar_additional_text ): ?>
			<div class="<?php echo wheels_class( 'top-bar-additional-text' ); ?>">
				<?php echo do_shortcode( $top_bar_additional_text ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>