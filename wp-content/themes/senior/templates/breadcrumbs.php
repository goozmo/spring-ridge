<?php if ( function_exists( 'breadcrumb_trail' ) ): ?>
	<div class="<?php echo wheels_class( 'breadcrumbs' ); ?>">
		<?php breadcrumb_trail( array( 'show_browse' => false ) ); ?>
	</div>
<?php endif; ?>
