<?php
/**
 * Plugin Name: Senior Plugin
 * Plugin URI:  http://wordpress.org/plugins
 * Description: Senior theme helper plugin
 * Version:     1.1.2
 * Author:      Aislin Themes
 * Author URI:  http://themeforest.net/user/Aislin/portfolio
 * License:     GPLv2+
 * Text Domain: chp
 * Domain Path: /languages
 */
define( 'SCP_PLUGIN_VERSION', '1.1.2' );
define( 'SCP_PLUGIN_NAME'   , 'Senior' );
define( 'SCP_PLUGIN_PREFIX' , 'scp_' );
define( 'SCP_PLUGIN_URL'    , plugin_dir_url( __FILE__ ) );
define( 'SCP_PLUGIN_PATH'   , dirname( __FILE__ ) . '/' );
define( 'SCP_TEXT_DOMAIN'   , 'scp_senior' );


register_activation_hook( __FILE__, 'scp_activate' );
register_deactivation_hook( __FILE__, 'scp_deactivate' );

add_action( 'plugins_loaded', 'scp_init' );
add_action( 'widgets_init', 'scp_register_wp_widgets' );
add_action( 'wp_head', 'scp_set_js_global_var' );

// Dynamically add a section. Can be also used to modify sections/fields
// add_filter( 'redux/options/wheels_options/sections', 'scp_dynamic_section' );

add_filter( 'pre_get_posts', 'scp_portfolio_posts' );

require_once 'shortcodes.php';

function scp_clean($item) {
    $firstClosingPTag = substr($item, 0, 4);
    $lastOpeningPTag  = substr($item, -3);

    if ($firstClosingPTag == '</p>') {
        $item = substr($item, 4);
    }

    if ($lastOpeningPTag == '<p>') {
        $item = substr($item, 0, -3);
    }

    return $item;
}


function scp_init() {
	scp_add_extensions();
}

function scp_activate() {
	scp_init();
	flush_rewrite_rules();
}

function scp_deactivate() {

}

function scp_add_extensions() {
	if ( apply_filters( 'scp_filter_enable_portfolio', false ) ) {
		require_once 'extensions/portfolio-post-type/portfolio-post-type.php';
	}
	if ( apply_filters( 'scp_filter_enable_post_subtitles', false ) ) {
		require_once 'extensions/easy-post-subtitle/easy-post-subtitle.php';
	}
}

function scp_dynamic_section( $sections ) {

	$sections[] = array(
		'title'  => __( 'Widgets', SCP_TEXT_DOMAIN ),
		'desc'   => __( '<p class="description">This where you style widgets used mostly on the home page. Each subsection holds settings for custom widgets included with the theme.</p>', SCP_TEXT_DOMAIN ),
		'icon'   => 'el-icon-cog',
		// Leave this as a blank section, no options just some intro text set above.
		'fields' => array()
	);

	include 'vc-addons/our-process/redux-options.php';

	return $sections;

}


function scp_get_wheels_option( $option_name, $default = false ) {

	if ( function_exists( 'wheels_get_option' ) ) {
		return wheels_get_option( $option_name, $default );
	}

	return $default;
}

function scp_set_js_global_var() {

	$our_process_breakpoint = scp_get_wheels_option( 'dntp-our-process-widget-device-trigger', '480' );
	?>
	<script>
		var scp = scp ||
			{
				data: {
					vcWidgets: {
						ourProcess: {
							breakpoint: '<?php echo (int) $our_process_breakpoint; ?>'
						}
					}
				}
			};
	</script>
<?php
}

function scp_register_wp_widgets() {
	require_once 'wp-widgets/SCP_Latest_Posts_Widget.php';
}

function scp_portfolio_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( is_tax() && isset( $query->tax_query ) && $query->tax_query->queries[0]['taxonomy'] == 'portfolio_category' ) {
		$query->set( 'posts_per_page', 10 );

		return;
	}
}
