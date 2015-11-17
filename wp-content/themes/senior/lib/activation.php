<?php
/**
 * Theme activation
 */
if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' == $GLOBALS['pagenow'] ) {
	wp_redirect( admin_url( 'themes.php?page=theme_activation_options' ) );
	exit;
}
add_action( 'admin_menu', 'wheels_theme_activation_options_add_page', 50 );
add_action( 'admin_init', 'wheels_import_data' );


function wheels_theme_activation_options_add_page() {

	add_theme_page( __( 'Theme Activation', 'wheels' ), __( 'Theme Activation', 'wheels' ), 'edit_theme_options', 'theme_activation_options', 'wheels_theme_activation_options_render_page' );
}

function wheels_import_data() {


//	 require_once 'demo-importer/Wheels_Import_Manager.php';
//
//	 $import_manager = new Wheels_Import_Manager();
//
//	 $import_manager->import_theme_options( 'content.xml' );


	if ( isset( $_POST['wheels-demo-data'] ) ) {
		if ( check_admin_referer( 'wheels-demo-data-nonce' ) ) {

//			require_once 'radium-one-click-demo-install/init.php';
//			$importer = new Demo_Data_Importer();
//
//			if ( $_REQUEST['import_demo_content'] === 'true' ) {
//				$importer->content_xml();
//			}

			if ( $_REQUEST['create_front_page'] === 'true' ) {

				$home = get_page_by_title( __( 'Home', 'wheels' ) );
				if ($home) {
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', $home->ID );

					$home_menu_order = array(
						'ID'         => $home->ID,
						'menu_order' => - 1
					);
					wp_update_post( $home_menu_order );
				}
			}

			if ( $_REQUEST['create_blog_static_page'] === 'true' ) {

				$blog = get_page_by_title( __( 'Blog', 'wheels' ) );
				if ($blog) {
					update_option( 'page_for_posts', $blog->ID );
				}
			}

			if ( $_REQUEST['change_permalink_structure'] === 'true' ) {

				if ( get_option( 'permalink_structure' ) !== '/%postname%/' ) {
					global $wp_rewrite;
					$wp_rewrite->set_permalink_structure( '/%postname%/' );
					flush_rewrite_rules();
				}
			}

			// if ( $_REQUEST['mega_main_menu'] === 'true' ) {
			// 	$importer->mega_menu();
			// }
//			if ( $_REQUEST['layer_slider'] === 'true' ) {
//				$importer->layer_slider();
//			}
//			if ( $_REQUEST['theme_options'] === 'true' ) {
//				$importer->theme_options();
//			}
//			if ( $_REQUEST['menus'] === 'true' ) {
//				$importer->menus();
//			}
//			if ( $_REQUEST['widgets'] === 'true' ) {
//				$importer->process_widget_import_file();
//			}

		}
	}

}

function wheels_theme_activation_options_render_page() {
	?>
	<div class="wrap">
		<h2><?php printf( __( '%s Theme Activation', 'wheels' ), wp_get_theme() ); ?></h2>

		<div class="update-nag">
			<?php _e( 'These settings are optional and should usually be used only on a fresh installation.', 'wheels' ); ?>
		</div>
		<p><?php _e( 'These videos cover installation and update process.', 'wheels' ); ?></p>

		<p>
			<iframe width="560" height="315" src="//www.youtube.com/embed/bRnThJE0HCc" frameborder="0"
			        allowfullscreen></iframe>
	        <iframe width="560" height="315" src="https://www.youtube.com/embed/aHR7iWr-iWE" frameborder="0" allowfullscreen></iframe>
		</p>
		<br/>
		<hr/>
		<h3><?php _e( 'Update Instructions', 'wheels' ); ?></h3>
		<p>
		<?php _e( 'If you are updating the theme, please watch the video on the right.',
						'wheels' ); ?>
		</p>
		<hr/>
		<h3><?php _e( 'Installation Steps', 'wheels' ); ?></h3>

		<ol>
			<li>
				<p><strong><?php _e( 'Install required plugins', 'wheels' ); ?></strong></p>
				<p><?php _e( 'First, enable required plugins. If you have not already done so, there should be a link "Install Required Plugins" in the top of the page. Follow that link and after you finish plugin installation return to this page to complete the installation process.',
						'wheels' ); ?></p>
			</li>
			<li>
				<p><strong><?php _e( 'Import demo content', 'wheels' ); ?></strong></p>
				<p><?php _e( 'Proceed only after all plugins are installed', 'wheels' ); ?></p>
				<?php if ( is_plugin_active( 'wordpress-importer/wordpress-importer.php' ) ): ?>
					<a href="<?php echo admin_url( 'import.php?import=wordpress' ); ?>"><?php _e('Go to Wordpress Importer', 'wheels'); ?></a>
				<?php else: ?>
					<?php _e( 'In order to import demo content you need to install and activate Wordpress Importer plugin', 'wheels' ); ?>
				<?php endif; ?>
			</li>
			<li>
				<p><strong><?php _e( 'Import Theme Options', 'wheels' ); ?></strong></p>
				<?php if ( is_plugin_active( 'redux-framework/redux-framework.php' ) ): ?>
					<a href="<?php echo admin_url( 'admin.php?page=_options&tab=28' ); ?>"><?php _e('Go to Theme Options Importer', 'wheels'); ?></a>
				<?php else: ?>
					<?php _e( 'In order to import demo content you need to install and activate Redux Framework plugin', 'wheels' ); ?>
				<?php endif; ?>
			</li>
			<li>
				<p><strong><?php _e( 'Save Menus', 'wheels' ); ?></strong></p>
				<a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php _e('Go to Wordpress Menus', 'wheels'); ?></a>
			</li>
			<li>
				<p><strong><?php _e( 'Import Layer Slider demo sliders', 'wheels' ); ?></strong></p>
				<?php if ( is_plugin_active( 'LayerSlider/layerslider.php' ) ): ?>
					<a href="<?php echo admin_url( 'admin.php?page=layerslider' ); ?>"><?php _e('Go to Layer Slider Importer', 'wheels'); ?></a>
				<?php else: ?>
					<?php _e( 'In order to import demo sliders you need to install and activate Layer Slider plugin', 'wheels' ); ?>
				<?php endif; ?>
			</li>
			<li>
				<p><strong><?php _e( 'Import Icons', 'wheels' ); ?></strong></p>
				<a href="<?php echo admin_url( 'admin.php?page=font-icon-Manager' ); ?>"><?php _e('Go to Ultimate VC Addons Icon Manager', 'wheels'); ?></a>
			</li>
			<li>
				<p><strong><?php _e( 'Ultimate Addons VC Settings', 'wheels' ); ?></strong></p>
				<?php if ( is_plugin_active( 'Ultimate_VC_Addons/Ultimate_VC_Addons.php' ) ): ?>
					<a href="<?php echo admin_url( 'admin.php?page=ultimate-dashboard#css-settings' ); ?>"><?php _e( 'Go to Ultimate VC Addons Settngs', 'wheels' ); ?></a>
				<?php else: ?>
					<?php _e( 'Ultimate Addons for Visual Composer is not activated. Please activate the plugin', 'wheels' ); ?>
				<?php endif; ?>
			</li>
			<li>
				<p><strong><?php _e( 'Permalink Structure/Front and Blog Page Settings', 'wheels' ); ?></strong></p>
			</li>
		</ol>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
			<input type="hidden" name="wheels-demo-data" value="1">
			<?php wp_nonce_field( 'wheels-demo-data-nonce' ); ?>
			<table class="form-table">

				<tr valign="top">
					<th scope="row"><?php _e( 'Home page as static front page', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Home page as static front page', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="create_front_page" value="false"/>
							<input type="checkbox" name="create_front_page"
							       value="true"/>

							<p class="description"><?php printf( __( 'Set Home page to be the static front page (recommended)', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Blog page as static posts page', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Blog page as static posts page', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="create_blog_static_page" value="false"/>
							<input type="checkbox" name="create_blog_static_page"
							       value="true"/>

							<p class="description"><?php printf( __( 'Set Blog page to be the static posts page (recommended)', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Permalink structure', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Permalink structure', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="change_permalink_structure" value="false"/>
							<input type="checkbox" name="change_permalink_structure"
							       value="true"/>

							<p class="description"><?php printf( __( 'Change permalink structure to /&#37;postname&#37;/ (optional)', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<?php /*
                <tr valign="top">
					<th scope="row"><?php _e( 'Demo content', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Demo content', 'wheels' ); ?></span>
							</legend>
							<input type="hidden" name="import_demo_content" value="false"/>
							<input type="checkbox" name="import_demo_content"
							       value="true"/>

							<p class="description"><?php printf( __( 'Import demo content (posts, pages, comments, custom fields, terms, navigation menus and custom posts)', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Mega Main Menu settings', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Mega Main Menu settings', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="mega_main_menu" value="false"/>
							<input type="checkbox" name="mega_main_menu"
							       value="true"/>

							<p class="description"><?php printf( __( 'Import to have the menu look like on a demo', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'Theme Options demo settings', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Theme Options demo settings', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="theme_options" value="false"/>
							<input type="checkbox" name="theme_options"
							       value="true"/>

							<p class="description"><?php printf( __( 'Import theme options settings', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Layer Slider', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Layer Slider', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="layer_slider" value="false"/>
							<input type="checkbox" name="layer_slider"
							       value="true"/>

							<p class="description"><?php printf( __( 'Import Layer Slider demo sliders', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Menus', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Menus', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="menus" value="false"/>
							<input type="checkbox" name="menus"
							       value="true"/>

							<p class="description"><?php printf( __( 'Set menus', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Widgets', 'wheels' ); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php _e( 'Widgets', 'wheels' ); ?></span>
							</legend>

							<input type="hidden" name="widgets" value="false"/>
							<input type="checkbox" name="widgets"
							       value="true"/>

							<p class="description"><?php printf( __( 'Import sidebar and footer widgets', 'wheels' ) ); ?></p>
						</fieldset>
					</td>
				</tr>
                */ ?>
			</table>
			<?php submit_button(); ?>
		</form>
		<br/>
		<hr/>
		<br/>
		<h3>
			<em><?php printf( __( 'After you complete demo data import, visit %s page for details on how to customize the theme.', 'wheels' ),
					'<a target="_blank" href="' . get_template_directory_uri() . '/documentation/index.html" title="' . __( 'Documentation', 'wheels' ) . '">' . __( 'Documentation', 'wheels' ) . '</a>' ); ?></em>
		</h3>
		<br/>
		<hr/>
		<br/>
	</div>

<?php

}
