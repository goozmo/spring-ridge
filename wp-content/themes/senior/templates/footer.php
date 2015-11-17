<div class="<?php echo wheels_class( 'bottom-widgets' ); ?>">
	<?php if ( is_active_sidebar( 'wheels-sidebar-footer' ) ) : ?>
		<div class="<?php echo wheels_class( 'container' ); ?>">
			<?php dynamic_sidebar( 'wheels-sidebar-footer' ); ?>
		</div>
	<?php endif; ?>
	<div class="<?php echo wheels_class( 'footer' ); ?>">
		<div class="<?php echo wheels_class( 'container' ); ?>">
			<?php
			$footer_layout = wheels_get_option( 'footer-layout', array() );
			$sections      = isset( $footer_layout['enabled'] ) ? $footer_layout['enabled'] : false;

			if ( $sections ) {
				foreach ( $sections as $key => $value ) {
					switch ( $key ) {
						case 'menu':
							get_template_part( 'templates/footer-menu' );
							break;
						case 'text':
							get_template_part( 'templates/footer-text' );
							break;
					}
				}
			}
			?>
		</div>
	</div>
</div>