<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class scp_Pricing_Plan {

	protected $textdomain = SCP_TEXT_DOMAIN;
	protected $namespace = 'scp_pricing_plan';

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


		/*
		Add your Visual Composer logic here.
		Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

		More info: http://kb.wpbakery.com/index.php?title=Vc_map
		*/
		vc_map( array(
			'name'        => __( 'Pricing Plan', $this->textdomain ),
			'description' => __( '', $this->textdomain ),
			'base'        => $this->namespace,
			'class'       => '',
			'controls'    => 'full',
			'icon'        => plugins_url( 'assets/aislin-vc-icon.png', __FILE__ ),
			// or css class name which you can reffer in your css file later. Example: 'vc_extend_my_class'
			'category'    => __( 'Content', 'js_composer' ),
			//'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
			//'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
			'params'      => array(
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Price', $this->textdomain ),
					'param_name' => 'price',
					'value'      => '$59',
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Subprice', $this->textdomain ),
					'param_name' => 'subprice',
					'value'      => 'A MONTH',
				),
				array(
					"type"       => "number",
					"heading"    => __( "Height", $this->textdomain ),
					"param_name" => "height",
					"min"        => 10,
					"suffix"     => "px",
				),
				array(
					'type'       => 'textarea_html',
					'class'      => '',
					'heading'    => __( 'Text', $this->textdomain ),
					'param_name' => 'text',
					'value'      => '',
				),
				array(
					'type'       => 'vc_link',
					'class'      => '',
					'heading'    => __( 'Link', $this->textdomain ),
					'param_name' => 'link',
					'value'      => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', $this->textdomain ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', $this->textdomain ),
				),
				/* typography */
				array(
					'type'             => 'ult_param_heading',
					'text'             => __( 'Price Settings', $this->textdomain ),
					'param_name'       => 'price_typography',
					'group'            => 'Typography',
					'class'            => 'ult-param-heading',
					'edit_field_class' => 'ult-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'        => 'ultimate_google_fonts',
					'heading'     => __( 'Font Family', $this->textdomain ),
					'param_name'  => 'price_font_family',
					'description' => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=ultimate-font-manager' ) . "'>add new in the collection here</a>.", $this->textdomain ),
					'group'       => 'Typography'
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", $this->textdomain ),
					"param_name" => "price_font_style",
					"group"      => "Typography"
				),
				array(
					"type"       => "number",
					"class"      => "font-size",
					"heading"    => __( "Font Size", $this->textdomain ),
					"param_name" => "price_font_size",
					"min"        => 10,
					"suffix"     => "px",
					"group"      => "Typography"
				),
				array(
					"type"       => "colorpicker",
					"class"      => "",
					"heading"    => __( "Font Color", $this->textdomain ),
					"param_name" => "price_font_color",
					"value"      => "",
					"group"      => "Typography"
				),
			)
		) );
	}

	public function render( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'price'             => '',
			'subprice'          => '',
			'height'            => '300px',
			'text'              => '',
			'link'              => '',
			'el_class'          => '',
			'price_font_family' => '',
			'price_font_style'  => '',
			'price_font_size'   => '24',
			'price_font_color'  => '#000',
		), $atts ) );

		// $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content

		ob_start();
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'dntp-pricing-plan ' . $el_class, $this->namespace, $atts );
		$uid       = uniqid( 'pricing-plan-widget-' );
		$link      = vc_build_link( $link );
		?>

		<div id="<?php echo $uid; ?>" class="<?php echo $css_class; ?>">
			<div class="price">
				<?php echo $price; ?>
			</div>
			<div class="sub-price">
				<?php echo $subprice; ?>
			</div>
			<div class="text">
				<?php echo $text; ?>
			</div>
			<?php if ( $link['url'] && $link['title'] ): ?>
				<a class="button" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
			<?php endif; ?>
		</div>

		<?php
		$css = '';

		// #uid
		$css .= '#' . $uid . ' {';
		$css .= 'height:' . (int) $height . 'px;';

		$css .= '}';


		// #uid .price
		$css .= '#' . $uid . ' .price {';
		$css .= 'font-size:' . (int) $price_font_size . 'px;';
		$css .= 'color:' . $price_font_color . ';';

		if ( $price_font_family != '' ) {
			$price_font_family = get_ultimate_font_family( $price_font_family );
			$css .= 'font-family:' . $price_font_family . ';';
		}
		$css .= '}';

		echo '<style>' . $css . '</style>';

		$args = array(
			$price_font_family
		);
		enquque_ultimate_google_fonts( $args );
		$content = ob_get_clean();

		return $content;
	}

	/*
	Load plugin css and javascript files which you may need on front end of your site
	*/
	public function loadCssAndJs() {
		wp_register_style( $this->namespace . '_style', plugins_url( 'assets/pricing-plan.css', __FILE__ ) );
		wp_enqueue_style( $this->namespace . '_style' );

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

new scp_Pricing_Plan();