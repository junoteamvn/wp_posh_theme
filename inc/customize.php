<?php
/**
* Include Widget 
*/
require_once dirname( __FILE__ ) . '/widgets/header.widget.php';
require_once dirname( __FILE__ ) . '/widgets/services.widget.php';

/**
* Include Customize Live Preview
*/
require_once dirname( __FILE__ ) . '/custom-preview.php';

/**
*  @Import Section
*/
if ( ! function_exists( 'site_section_customize' ) ) {
	function site_section_customize( $wp_customize ) {

		// Header
		require_once dirname( __FILE__ ) . '/header.php';

		// Footer	    
	 	require_once dirname( __FILE__ ) . '/footer.php';

	 	// Services	    
	 	require_once dirname( __FILE__ ) . '/section/services.php';

	 	// Team	    
	 	require_once dirname( __FILE__ ) . '/section/channel.php';

	 	// Testimonials & CLient	    
	 	require_once dirname( __FILE__ ) . '/section/blog.php';

	 	// Contact Us	    
	 	require_once dirname( __FILE__ ) . '/section/contact.php';

	 	// Add Panel Section
		$wp_customize->add_panel( 'section', array(
	        'priority'       => 15,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => 'Section',
	        'description'    => 'Section Front Page'
	    ) );

	    // Remove Panel Widgets
	    $wp_customize->remove_panel( 'widgets' );

	}
	add_action( 'customize_register', 'site_section_customize' );
}


/*
@ Create Widget Area
*/
if ( ! function_exists( 'site_widget' ) ) {
	function site_widget(){
		/* Create Main Widget */
		register_sidebar([
			'name'         => 'Main Widget',
			'id'           => 'main_widget',
			'before_widget' => '<div id="%1$s sidebar" class="%2$s">',
			'after_widget'  =>'</div>'
		]);
		/* Create Header Widget */
		register_sidebar([
			'name'         => 'Header Widget',
			'id'           => 'header_widget',
			'before_widget' => '<div id="%1$s" class="item %2$s">',
			'after_widget'  =>'</div>'
		]);
		/* Create Services Widget */
		register_sidebar([
			'name'         => 'Services Widget',
			'id'           => 'services_widget',
			'before_widget' => '<div id="%1$s" class="in active item tab-pane fade service-post %2$s">',
			'after_widget'  =>'</div>'
		]);
	}
	add_action('widgets_init','site_widget');
}

/**
* @see Create Own Widget
*/
if ( ! function_exists( 'site_own_widget' ) ) {
	function site_own_widget() {
		register_widget('header_widget');
	    register_widget('services_widget');
	}
	add_action( 'widgets_init', 'site_own_widget' );
}

/**
* @see Remove "first" CSS classes to custom widget
*/
if ( ! function_exists( 'remove_first_class_widget' ) ) {
	function remove_first_class_widget($params){
		$sidebars_widgets = wp_get_sidebars_widgets();
        $widget_ids = $sidebars_widgets['services_widget']; 
        // For Each Avoid 1 element
        foreach( array_slice($widget_ids,1) as $id ) {
		    if ($params[0]['widget_id'] == $id){ 
		        // its your widget so you add  your classes
		        $classe_to_rm = 'in active ';
		        $params[0]['before_widget'] = str_replace( $classe_to_rm ,'', $params[0]['before_widget'] );
		    }
		}
		return $params;
	} 
	add_filter('dynamic_sidebar_params', 'remove_first_class_widget'); 
}