<?php
/**
 * Welcome Screen Class
 */
class site_welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'site_welcome_register_menu' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'site_welcome_style_and_scripts' ) );

		/* load welcome screen */
		add_action( 'site_welcome', array( $this, 'site_welcome_about_site' ), 10 );

	}

	/**
	 * Creates the dashboard page
	 */
	public function site_welcome_register_menu() {
		add_theme_page( 'About Posh Web', 'About Posh Web', 'activate_plugins', 'site', array( $this, 'site_welcome_screen' ) );
	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function site_welcome_style_and_scripts( $hook_suffix ) {

		wp_enqueue_style( 'site-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );
		wp_enqueue_script( 'site-screen-js', get_template_directory_uri() . '/inc/welcome/js/welcome.js', array('jquery'), false, true );
		wp_localize_script( 'site-screen-js', 'siteImport', array('ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}

	/**
	 * Welcome screen content
	 */
	public function site_welcome_screen() {

		?>

		<ul class="nav-tabs">
			<li role="presentation" class="active"><a href="#about_site" aria-controls="about_site" role="tab" data-toggle="tab">About Posh Web</a></li>
		</ul>
		<div class="tab-content">
			<?php do_action( 'site_welcome' ); ?>
		</div>
		<?php
	}

	/**
	 * Getting started
	 */
	public function site_welcome_about_site() {
		require_once( get_template_directory() . '/inc/welcome/sections/about.php' );
	}

}

new site_welcome();
