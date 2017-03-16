<?php
/**
* @see Register Function Of Theme
*/
if ( ! function_exists( 'site_setup_theme' ) ) {
	function site_setup_theme(){
	    
		/* Auto Add RSS to <head> */
		add_theme_support( 'automatic-feed-links' );

		/* Add post thumbnail */
		add_theme_support( 'post-thumbnails' );

		/*Add title for site*/
		add_theme_support( 'title-tag' );

		/* Indicate widget sidebars can use selective refresh in the Customizer. */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/** Enable HTML5 markup support
	  	* https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	  	*/
	  	add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

		/* Add Main Menu */
		register_nav_menu( 'main_menu', 'Main Menu' );

		/* Require Customize*/
		require_once get_template_directory() . '/inc/customize.php';

		/* Add Welcome Screen */
		require_once get_template_directory() . '/inc/welcome/welcome.php';

		/* Add Plugin Require*/
		require_once get_template_directory() . '/inc/TGM-Plugin-Activation/plugins.php';

		/* Add Custom Post Meta*/
		require_once get_template_directory() . '/inc/custom-meta.php';

		/* Add Demo Content */
		require_once get_template_directory() . '/inc/data-demo.php';

	}
	add_action( 'after_setup_theme','site_setup_theme' );
}


/**
* @see Register Custom Post Type
*/
if ( ! function_exists( 'site_custom_post_type' ) ) {
	function site_custom_post_type()
	{
	    register_post_type('Gallery',
	      array(
	        'labels' => array(
	          'name' => 'Gallery',
	          'singular_name' => 'Gallery',
	        ),
	        'public' => true,
	        'has_archive' => true,
	        'menu_position' => 6,
	        'menu_icon' => 'dashicons-format-gallery',
	      'supports' => array('title','gallery', 'author', 'editor', 'thumbnail'),
	      )
	    );
	}
	add_action('init', 'site_custom_post_type');
}
if ( ! function_exists( 'custom_column_post_type' ) ) {
	function custom_column_post_type( $columns ){
		$columns = array(
			'cb'         =>		'<input type="checkbox">',
			'post_thumb' =>		'Thumbnail',
			'title'      =>		'Photo Title',
			'author'     =>		'Author',
			'date'       =>		'Date',
			'likes'		=>		'Likes'
			
		);
		return $columns;
	}
	add_filter('manage_edit-gallery_columns', 'custom_column_post_type');
}
if ( ! function_exists( 'post_custom_column_post_type' ) ) {
	function post_custom_column_post_type( $column ){
		switch ($column) {
			case 'post_thumb' : echo the_post_thumbnail('thumbnail'); break;
		}
	}
	add_action('manage_posts_custom_column', 'post_custom_column_post_type');
}

/********* Import Css/Js ***********/
/**
* @see front site Js - Css
*/
if ( ! function_exists( 'site_front_layout' ) ) {
	function site_front_layout(){
		// Css
		wp_register_style( 'vendor-style', get_template_directory_uri() . "/assets/styles/vendor.css" );
		wp_enqueue_style( 'vendor-style' );
		wp_register_style( 'main-style', get_template_directory_uri() . "/assets/styles/main.css" );
		wp_enqueue_style( 'main-style' );
		wp_register_style( 'responsive-style', get_template_directory_uri() . "/assets/styles/responsive.css" );
		wp_enqueue_style( 'responsive-style' );

		// JavaScript
		wp_register_script( 'vendor-script', get_template_directory_uri() . "/assets/scripts/vendor.js",array('jquery') ,false ,true );
		wp_enqueue_script( 'vendor-script' );
		wp_register_script( 'app-js', get_template_directory_uri() . "/assets/scripts/app.js", array('jquery'), false, true );
		wp_enqueue_script( 'app-js' );
		wp_localize_script( 'app-js', 'ajax_posts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	}
	add_action('wp_enqueue_scripts', 'site_front_layout');
}

/**
* @see Admin Css-JS
*/
if ( ! function_exists( 'site_admin_layout' ) ) {
	function site_admin_layout() {
		/*
		*Import Style Css
		*/
		wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/inc/layout/css/admin.css');
	    wp_enqueue_style( 'custom_wp_admin_css' );

	    /*
		*Import Script
		*/
		wp_enqueue_media();
		wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/inc/layout/js/admin.js', array('jquery'), false, true );
	}
	add_action( 'admin_enqueue_scripts', 'site_admin_layout' );
}
/**
* @see Ajax Show Post
*/
if ( ! function_exists( 'site_isotope_ajax' ) ) {
	function site_isotope_ajax(){

	    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 8;
	    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	    $cat = (isset($_POST['cat'])) ? $_POST['cat'] : '';
	    header("Content-Type: text/html");

	    $args = array(
	        'suppress_filters' => true,
	        'post_type' => 'post',
	        'posts_per_page' => $ppp,
	        'category_name' => $cat,
	        'paged'    => $page,
	    );
	    
	    if ( $cat == '*' ){
	    	$args = array(
	        'suppress_filters' => true,
	        'post_type' => 'post',
	        'posts_per_page' => $ppp,
	        'paged'    => $page,
	   	 	);
	    }

	    $loop = new WP_Query($args);

	    $content = '';

	    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
		if (get_post_thumbnail_id()) { 
			$categories =  get_the_category();
			$cate_name ='';

		    foreach ($categories as $category) {
		    	$cate_name.=$category->slug.' ';
		    }
	        $content .= '<div class="grid-item '.$cate_name.'">
						<div class="item-bg"></div>
						<a class="item-cover-link" href="'.get_post_meta( get_the_ID(), 'blog_url', true).'" target="_blank">
							<div class="item-cover" style="background-image: url('.wp_get_attachment_url( get_post_thumbnail_id() ).');"></div>
						</a>
						<a href="'.get_post_meta( get_the_ID(), 'blog_url', true).'" class="item-title" target="_blank">'.get_the_title().'</a>
						<span class="item-date">'.get_the_author().' / '.get_the_time('M d').'</span>
					</div>';
	     }
	    endwhile;
	    endif;
	    echo $content;
	    wp_die();
	}
	add_action('wp_ajax_nopriv_site_isotope_ajax', 'site_isotope_ajax');
	add_action('wp_ajax_site_isotope_ajax', 'site_isotope_ajax');
}

/**
* @see Allow Svg Image
*/
define('ALLOW_UNFILTERED_UPLOADS', true);
if( !function_exists( 'cc_mime_types' ) ) {
	function cc_mime_types( $mimes = array() ) {
	  $mimes['svg']  = 'image/svg+xml';
	  $mimes['svgz'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
}

/**
* @see Get image ID from Image URL
*/
if( !function_exists( 'get_image_id_from_image_url' ) ) {
    function get_image_id_from_image_url( $image_url ) {
        global $wpdb;
        $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );

        if( $attachment ) {
            return $attachment[0];
        }
    }
}