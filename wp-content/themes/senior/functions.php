<?php
/**
 * Wheels includes
 */
$wheels_includes = array(
	'lib/utils.php',            // Utility functions
	'lib/css-classes.php',      // Dynamic CSS Classes
	'lib/init.php',             // Initial theme setup and constants
	'lib/config.php',           // Configuration
	'lib/activation.php',       // Theme activation
	'lib/activate-plugins.php', // Activate plugins
	'lib/titles.php',           // Page titles
	'lib/cleanup.php',          // Cleanup
	'lib/comments.php',         // Custom comments modifications
	'lib/scripts.php',          // Scripts and stylesheets
	// 'lib/gallery.php',       // Custom [gallery] modifications
	'lib/extras.php',           // Custom functions
);
foreach ( $wheels_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'wheels' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
