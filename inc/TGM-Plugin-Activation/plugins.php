<?php
/**
* Import Plugin
*/
require_once dirname( __FILE__ ). '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'site_required_plugins' );

function site_required_plugins() {

 	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */

	$plugins = array(

		// I Recommend This	
		array(
			'name'      => 'I Recommend This',
			'slug'      => 'i-recommend-this',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'poshweb',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'poshweb-plugin',
		// Menu slug.
		'has_notices'  => true,
		// Show admin notices or not.
		'capability'   => 'edit_theme_options',
		// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'dismissable'  => true,                    
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.
		'strings' => array(
			'page_title'                      => __( 'Install Required Plugins', 'poshweb' ),
			'menu_title'                      => __( 'Install Plugins', 'poshweb' ),
			'installing'                      => __( 'Installing Plugin: %s', 'poshweb' ),
			// %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'poshweb' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop( 'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'poshweb' ),
			// %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'poshweb' ),
			// %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'poshweb' ),
			'update_link'                     => _n_noop( 'Begin updating plugin', 'Begin updating plugins', 'poshweb' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'poshweb' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'poshweb' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'poshweb' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'poshweb' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'poshweb' ),
			// %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'poshweb' ),
			// %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'poshweb' ),
			// %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'poshweb' ),

			'nag_type' => 'updated',
			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);
	
	tgmpa( $plugins, $config );
}