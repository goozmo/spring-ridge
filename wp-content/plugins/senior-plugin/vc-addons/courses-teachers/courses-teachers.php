<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class scp_Courses_Teachers {

	protected $textdomain = SCP_TEXT_DOMAIN;
	protected $namespace = 'scp_teacher';

	function __construct() {
		// We safely integrate with VC with this hook
		add_action( 'init', array( $this, 'integrateWithVC' ) );

		// Use this when creating a shortcode addon
		add_shortcode( $this->namespace, array( $this, 'render' ) );

		// Register CSS and JS
		add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
	}

	public function integrateWithVC() {
		// Check if Visual Composer is installed
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			// Display notice that Visual Compser is required
			add_action( 'admin_notices', array( $this, 'showVcVersionNotice' ) );

			return;
		}

		global $_wp_additional_image_sizes;
		$thumbs_dimensions_array = array( 'thumbnail' );

		if ( $_wp_additional_image_sizes ) {
			foreach ( $_wp_additional_image_sizes as $imageSizeName => $image_size ) {
				$thumbs_dimensions_array[ $imageSizeName . ' | ' . $image_size['width'] . 'px, ' . $image_size['height'] . 'px' ] = $imageSizeName;
			}
		}
		$thumbs_dimensions_array[] = 'full-width';

		$users       = get_users( array( 'role' => 'teacher' ) );
		$users_array = array();
		foreach ( $users as $user ) {
			$users_array[ $user->user_nicename ] = $user->ID;
		}


		/*
		Add your Visual Composer logic here.
		Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

		More info: http://kb.wpbakery.com/index.php?title=Vc_map
		*/
		vc_map( array(
			'name'        => __( 'Teacher', $this->textdomain ),
			'description' => __( '', $this->textdomain ),
			'base'        => $this->namespace,
			'class'       => '',
			'controls'    => 'full',
			'icon'        => plugins_url( 'assets/aislin-vc-icon.png', __FILE__ ),
			// or css class name which you can reffer in your css file later. Example: 'vc_extend_my_class'
			'category'    => __( 'Sensei', $this->textdomain ),
			//'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
			//'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
			'params'      => array(
				array(
					'type'       => 'dropdown',
					'holder'     => '',
					'class'      => '',
					'heading'    => __( 'Teachers', $this->textdomain ),
					'param_name' => 'user_id',
					'value'      => $users_array,
				),
				array(
					'type'       => 'dropdown',
					'holder'     => '',
					'class'      => '',
					'heading'    => __( 'Image Size', $this->textdomain ),
					'param_name' => 'image_size',
					'value'      => $thumbs_dimensions_array,
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', $this->textdomain ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', $this->textdomain ),
				),
			)
		) );
	}

	/*
	Shortcode logic how it should be rendered
	*/
	public function render( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'user_id'    => '',
			'image_size' => 'thumbnail',
			'el_class'   => '',
		), $atts ) );

		// $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content

		ob_start();
		$user = get_user_by( 'id',  (int) $user_id);

		if (! $user) {
		    return '';
		}

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'dntp-teacher ' . $el_class, $this->namespace, $atts );
		?>

			<div class="<?php echo $css_class; ?>">
				<?php if ( function_exists( 'get_cupp_meta' ) ): ?>
					<a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>">
						<img src="<?php echo get_cupp_meta( $user->ID, $image_size ); ?>" alt=""/>
					</a>
				<?php else: ?>
					<a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>">
						<?php echo get_avatar( $user->ID, apply_filters( 'wheels_author_bio_avatar_size', 120 ) ); ?>
					</a>
				<?php endif; ?>

			</div>

			<?php echo $user->user_nicename; ?>
		<?php
		$content = ob_get_clean();

		return $content;
	}

	/*
	Load plugin css and javascript files which you may need on front end of your site
	*/
	public function loadCssAndJs() {
		wp_register_style( 'vc_extend_style', plugins_url( 'assets/vc_extend.css', __FILE__ ) );
		wp_enqueue_style( 'vc_extend_style' );

		// If you need any javascript files on front end, here is how you can load them.
		//wp_enqueue_script( 'vc_extend_js', plugins_url('assets/vc_extend.js', __FILE__), array('jquery') );
	}

	/*
	Show notice if your plugin is activated but Visual Composer is not
	*/
	public function showVcVersionNotice() {
		$plugin_data = get_plugin_data( __FILE__ );
		echo '
        <div class="updated">
          <p>' . sprintf( __( '<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', SCP_TEXT_DOMAIN ), $plugin_data['Name'] ) . '</p>
        </div>';
	}
}

// Finally initialize code
new scp_Courses_Teachers();