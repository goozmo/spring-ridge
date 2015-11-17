<?php

/**
 * Enqueue scripts and stylesheets
 */

add_action( 'wp_enqueue_scripts', 'wheels_scripts', 100 );
add_action( 'wp_enqueue_scripts', 'wheels_add_compiled_style', 999 );
add_action( 'wp_head', 'wheels_set_js_global_var' );

function wheels_scripts() {
	wp_enqueue_style( 'bricklayer.groundwork', get_template_directory_uri() . '/assets/css/groundwork-responsive.css', false );
	wp_enqueue_style( 'style.default', get_stylesheet_uri(), false );
	wp_enqueue_style( 'iconsmind.line-icons', get_template_directory_uri() . '/assets/css/iconsmind-line-icons.css', false );

	if ( wheels_get_option( 'is-rtl', false ) ) {
		wp_enqueue_style( 'wheels_rtl', get_template_directory_uri() . '/assets/css/rtl.css', false );
	}

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', array(), null, false );
	wp_register_script( 'wheels_plugins', get_template_directory_uri() . '/assets/js/wheels-plugins.min.js', array(), null, true );
	wp_register_script( 'wheels_scripts', get_template_directory_uri() . '/assets/js/wheels-main.min.js', array(), null, true );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'wheels_plugins' );
	wp_enqueue_script( 'wheels_scripts' );
}

if ( ! function_exists( 'wheels_add_compiled_style' ) ) {

	function wheels_add_compiled_style() {
		$upload_dir = wp_upload_dir();

		if ( file_exists( $upload_dir['basedir'] . '/' . WHEELS_THEME_OPTION_NAME . '_style.css' ) ) {
			$upload_url = $upload_dir['baseurl'];
			if ( strpos( $upload_url, 'https' ) !== false ) {
				$upload_url = str_replace( 'https:', '', $upload_url );
			} else {
				$upload_url = str_replace( 'http:', '', $upload_url );
			}
			wp_enqueue_style( WHEELS_THEME_OPTION_NAME . '_style', $upload_url . '/' . WHEELS_THEME_OPTION_NAME . '_style.css', false );
		} else {
			wp_enqueue_style( WHEELS_THEME_OPTION_NAME . '_style', get_template_directory_uri() . '/assets/css/wheels_options_style.css', false );
		}
	}
}

function wheels_set_js_global_var() {
	$scroll_to_top_text = wheels_get_option( 'scroll-to-top-text', 'Scroll to Top' );
	?>
	<script>
		var wheels = wheels ||
			{
				siteName: "<?php bloginfo('name'); ?>",
				data: {
					useScrollToTop: <?php echo json_encode( filter_var( wheels_get_option( 'use-scroll-to-top', true ), FILTER_VALIDATE_BOOLEAN ) ); ?>,
					useStickyMenu: <?php echo json_encode( filter_var( wheels_get_option( 'main-menu-use-menu-is-sticky', true ), FILTER_VALIDATE_BOOLEAN ) ); ?>,
					scrollToTopText: '<?php echo $scroll_to_top_text; ?>',
					isAdminBarShowing: <?php echo is_admin_bar_showing() ? 'true' : 'false'; ?>,
					initialWaypointScrollCompensation: <?php echo json_encode( wheels_get_option( 'main-menu-initial-waypoint-compensation', 120 ) ); ?>
				}
			};
	</script>
<?php
}
