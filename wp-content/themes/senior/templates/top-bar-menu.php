<div class="<?php echo wheels_class( 'top-bar-menu-wrap' ); ?>">
	<?php
	$menu_options = array(
		'theme_location'  => 'top_navigation',
		'menu_class'      => wheels_class( 'top-menu' ),
		'container_class' => wheels_class( 'top-menu-container' ),
		'depth'           => 1
	);
	?>
	<?php wp_nav_menu( $menu_options ); ?>
</div>
