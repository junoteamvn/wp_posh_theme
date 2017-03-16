<?php
if ( ! function_exists( 'Generate_Featured_Image' ) ) {
	/**
	 * Function to set a featured image (thumbnail)
	 */
	function Generate_Featured_Image( $image_url, $post_id ) {
		$upload_dir = wp_upload_dir();
	    $image_data = file_get_contents($image_url);
	    $filename = basename($image_url);
	    if( wp_mkdir_p($upload_dir['path']) ) $file = $upload_dir['path'] . '/' . $filename;
	    else $file = $upload_dir['basedir'] . '/' . $filename;

	    file_put_contents($file, $image_data);
	    $wp_filetype = wp_check_filetype($filename, null );
	    $attachment = array(
	        'post_mime_type' => $wp_filetype['type'],
	        'post_title' => sanitize_file_name($filename),
	        'post_content' => '',
	        'post_status' => 'inherit',
	        'guid' =>  $upload_dir['url'] . '/' . $filename, 
	    );
	    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	    require_once(ABSPATH . 'wp-admin/includes/image.php');
	    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	    wp_update_attachment_metadata( $attach_id, $attach_data );
	    set_post_thumbnail( $post_id, $attach_id );
	}
}
if ( ! function_exists( 'site_add_menu_items' ) ) {
	/**
	 * Function to import Menu
	 */
	function site_add_menu_items($force = false ) {
		/**
		* @see Import Menu
		*/
		$import = get_option( 'site_import' );
		if ( $import['menu'] ) {  // Check if Menu exist
			return;
		}
	    $import['menu'] = '1';
	    update_option( 'site_import', $import );


		$import['category-post'] = 1;
		//give your menu a name
	    $name = 'Main Menu';
	    //create the menu
	    $menu_id = wp_create_nav_menu($name);
	    //then get the menu object by its name
	    $menu = get_term_by( 'name', $name, 'nav_menu' );

	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  'Home',
        	'menu-item-url' => '#header', 
	        'menu-item-status' => 'publish')
	    );

	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  'Service',
	        'menu-item-url' => '#service', 
	        'menu-item-status' => 'publish')
	    );

	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  'Gallery',
	        'menu-item-url' => '#gallery', 
	        'menu-item-status' => 'publish')
	    );

	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  'Channel',
	        'menu-item-url' => '#channel', 
	        'menu-item-status' => 'publish')
	    );

	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  'Blog',
	        'menu-item-url' => '#blog', 
	        'menu-item-status' => 'publish')
	    );

	    //then add the actuall link/ menu item and you do this for each item you want to add
	    wp_update_nav_menu_item($menu->term_id, 0, array(
	        'menu-item-title' =>  'Contact',
	        'menu-item-url' => '#contact', 
	        'menu-item-status' => 'publish')
	    );

	    //then you set the wanted theme  location
	    $locations = get_nav_menu_locations();
	    $locations['main_menu'] = $menu->term_id;
	    set_theme_mod( 'nav_menu_locations', $locations );
	}
}
if ( ! function_exists( 'site_add_widget' ) ) {
	/**
	 * Function to import widgets based on a JSON config file
	 */
	function site_add_widget($force = false ) {
		$import = get_option( 'site_import' );
		if ( $import['widget'] ) {  // Check if widget exist
			return;
		}
	    $import['widget'] = '1';
	    update_option( 'site_import', $import );

		$json             = '{"header_widget":{"header_widget-6":{"banner":"\/assets\/images\/header_background_1.jpg","title":"A Perfect Beauty Template","number_title":"2","description":"The Ultimate Niche Theme for the Makeup & Beauty Industry, a freebie from Junoteam","url":"http:\/\/junoteam.com\/","video":"https:\/\/www.youtube.com\/watch?v=tV2VSAX7KX8","labelurl":"About Us"},"header_widget-5":{"banner":"\/assets\/images\/header_background_2.jpg","title":"Take Your Art To The Next Level","number_title":"1","description":"The Ultimate Niche Theme for the Makeup & Beauty Industry, a freebie from Junoteam","url":"http:\/\/junoteam.com\/","video":"https:\/\/www.youtube.com\/watch?v=tV2VSAX7KX8","labelurl":"About Us"},"header_widget-3":{"banner":"\/assets\/images\/header_background_4.jpg","title":"It&rsquo;s Fun To Make Things Up","number_title":"2","description":"The Ultimate Niche Theme for the Makeup & Beauty Industry, a freebie from Junoteam","url":"http:\/\/junoteam.com\/","video":"https:\/\/www.youtube.com\/watch?v=tV2VSAX7KX8","labelurl":"About Us"},"header_widget-4":{"banner":"\/assets\/images\/header_background_3.jpg","title":"Enhance Your Beauty Brand With Us","number_title":"1","description":"The Ultimate Niche Theme for the Makeup & Beauty Industry, a freebie from Junoteam","url":"http:\/\/junoteam.com\/","video":"https:\/\/www.youtube.com\/watch?v=tV2VSAX7KX8","labelurl":"About Us"}},"services_widget":{"services_widget-5":{"type":"Wedding","icon":"\/assets\/images\/services_icon_wedding.svg","title":"We love sharing, please subscribe our site for more resources","image":"\/assets\/images\/services_thumb_wedding.png","content":"Beauty is a subject as old as time and many sites cover it in the online world. There is a plethora of so-called beauty blogs or sites that offer beauty tips, but only a small amount are genuine. And POSH is a perfect template for your beauty site and it is FREE.","url":"http:\/\/junoteam.com\/"},"services_widget-2":{"icon":"\/assets\/images\/services_icon_about.svg","title":"We love sharing, please subscribe our site for more resources","image":"\/assets\/images\/services_thumb_about.png","content":"Beauty is a subject as old as time and many sites cover it in the online world. There is a plethora of so-called beauty blogs or sites that offer beauty tips, but only a small amount are genuine. And POSH is a perfect template for your beauty site and it is FREE.","type":"About","url":"http:\/\/junoteam.com\/"},"services_widget-6":{"type":"Party","icon":"\/assets\/images\/services_icon_party.svg","title":"We love sharing, please subscribe our site for more resources","image":"\/assets\/images\/services_thumb_party.png","content":"Beauty is a subject as old as time and many sites cover it in the online world. There is a plethora of so-called beauty blogs or sites that offer beauty tips, but only a small amount are genuine. And POSH is a perfect template for your beauty site and it is FREE.","url":"http:\/\/junoteam.com\/"},"services_widget-4":{"type":"Cosmetic","icon":"\/assets\/images\/services_icon_beautybox.svg","title":"We love sharing, please subscribe our site for more resources","image":"\/assets\/images\/services_thumb_beauty.png","content":"Beauty is a subject as old as time and many sites cover it in the online world. There is a plethora of so-called beauty blogs or sites that offer beauty tips, but only a small amount are genuine. And POSH is a perfect template for your beauty site and it is FREE.","url":"http:\/\/junoteam.com\/"},"services_widget-3":{"type":"Course","icon":"\/assets\/images\/services_icon_course.svg","title":"We love sharing, please subscribe our site for more resources","image":"\/assets\/images\/services_thumb_course.png","content":"Beauty is a subject as old as time and many sites cover it in the online world. There is a plethora of so-called beauty blogs or sites that offer beauty tips, but only a small amount are genuine. And POSH is a perfect template for your beauty site and it is FREE.","url":"http:\/\/junoteam.com\/"}}}';
		$config           = json_decode( $json );
		$sidebars_widgets = get_option( 'sidebars_widgets' );
		// Parse config
		foreach ( $config as $sidebar => $elemements ) {
				// create an empty array for active widgets
				$this_sidebar_active_widgets = array();
				// parse all widgets for current sidebar
				foreach ( $elemements as $id_widget => $args ) {
					// add current widget to current sidebar
					$this_sidebar_active_widgets[] = $id_widget;
					// split widget name in order to get widget name and index
					$id_widget_parts = explode( '-', $id_widget );
					// get widget index
					$index_widget = end( $id_widget_parts );
					//remove widget index from array
					array_pop( $id_widget_parts );
					// generate widget name
					$widget_name = implode( '-', $id_widget_parts );
					// get all widgets who are like current widget
					$widgets = get_option( 'widget_' . $widget_name );
					// check if current index exist in array
					if ( ! isset( $widgets[ $index_widget ] ) ) {
						// add current widget with his index and args
						$widgets[ $index_widget ] = get_object_vars( $args );
					}
					// update widgets who are like current widget
					update_option( 'widget_' . $widget_name, $widgets );
				}
				$sidebars_widgets[ $sidebar ] = $this_sidebar_active_widgets;
			}
		update_option( 'sidebars_widgets', $sidebars_widgets );
	}
}
if ( ! function_exists( 'site_add_category_and_posts' ) ) {
	/**
	 * Function to import category
	 */
	function site_add_category_and_posts($force = false ) {
		/**
		* @see Create Reviews Categories
		*/
		$import = get_option( 'site_import' );
		if ( $import['category-post'] ) {  // Check if category-post exist
			return;
		}
	    $import['category-post'] = '1';
	    update_option( 'site_import', $import );

		/********** Create Reviews Term ***********/
		$reviews = term_exists( 'reviews', 'category' );
		if ( empty($reviews) ){
			$reviews = wp_insert_term(
			    'reviews',   // the term 
			    'category', // the taxonomy
			    array(
			        'description' => 'reviews',
			        'slug'        => 'reviews',
			        'parent'      => '',
			    )
			);
		}
		$cid_reviews = $reviews['term_id'];

		/********** Create Looks Term ***********/
		$looks = term_exists( 'looks', 'category' );
		if ( empty($looks) ){
			$looks = wp_insert_term(
			    'looks',   // the term 
			    'category', // the taxonomy
			    array(
			        'description' => 'looks',
			        'slug'        => 'looks',
			        'parent'      => '',
			    )
			);
		}
		$cid_looks = $looks['term_id'];

		/********** Create Life Styles Term ***********/
		$lifestyles = term_exists( 'lifestyles', 'category' );
		if ( empty($lifestyles) ){
			$lifestyles = wp_insert_term(
			    'lifestyles',   // the term 
			    'category', // the taxonomy
			    array(
			        'description' => 'lifestyles',
			        'slug'        => 'lifestyles',
			        'parent'      => '',
			    )
			);
		}
		$cid_lifestyles = $lifestyles['term_id'];

		/********** Create Tips Term ***********/
		$tips = term_exists( 'tips', 'category' );
		if ( empty($tips) ){
			$tips = wp_insert_term(
			    'tips',   // the term 
			    'category', // the taxonomy
			    array(
			        'description' => 'tips',
			        'slug'        => 'tips',
			        'parent'      => '',
			    )
			);
		}
		$cid_tips = $tips['term_id'];

		/********** Create Tutorials Term ***********/
		$tutorials = term_exists( 'tutorials', 'category' );
		if ( empty($tutorials) ){
			$tutorials = wp_insert_term(
			    'tutorials',   // the term 
			    'category', // the taxonomy
			    array(
			        'description' => 'tutorials',
			        'slug'        => 'tutorials',
			        'parent'      => '',
			    )
			);
		}
		$cid_tutorials = $tutorials['term_id'];

		/**
		* @see Insert POST
		*/
		$post1 = array(
		    'post_title'    => 'Hollywood Hairstyles Do Not Require A Trip To A High Priced Salon Or Beautician',
		    'post_status'   => 'publish',
		    'post_category' => array( $cid_reviews, $cid_looks , $cid_tutorials),
		    'post_content' 	=> ''
		);
		$post2 = array(
		    'post_title'    => 'Forehead Lift Brow Lift Temporal Lift For Head Rejuvenation',
		    'post_status'   => 'publish',
		    'post_category' => array( $cid_reviews, $cid_looks, $cid_lifestyles),
		    'post_content' 	=> ''
		); 
		$post3 = array(
		    'post_title'    => 'Breast Enlargement Exercises Cheapest Inborn Sense Promoting Breast Lump',
		    'post_status'   => 'publish',
		    'post_category' => array( $cid_looks, $cid_tips ),
		    'post_content' 	=> ''
		); 
		$post4 = array(
		    'post_title'    => 'Curling Irons Are As Individual As The Women Who Use Them',
		    'post_status'   => 'publish',
		    'post_category' => array( $cid_tips, $cid_tutorials ),
		    'post_content' 	=> ''
		); 
		$post5 = array(
		    'post_title'    => 'Do It Yourself Wedding Bouquet Basics, From Start To Finish',
		    'post_status'   => 'publish',
		    'post_category' => array( $cid_tips, $cid_lifestyles, $cid_looks ),
		    'post_content' 	=> ''
		); 
		$post6 = array(
		    'post_title'    => 'The essential guide to choosing and buying your wedding rings',
		    'post_status'   => 'publish',
		    'post_category' => array( $cid_tips, $cid_looks, $cid_reviews ),
		    'post_content' 	=> ''
		); 

		$meta_key = 'blog_url';
		$new_meta_value = 'http://junoteam.com/';
		$new_meta_value_blog = 'http://junoteam.com/blog';

		$post1_id = wp_insert_post( $post1 );
		update_post_meta( $post1_id, $meta_key, $new_meta_value_blog );
		$getImageFile = get_template_directory_uri() . '/assets/images/blog_img_1.jpg';
        Generate_Featured_Image( $getImageFile , $post1_id );

		$post2_id = wp_insert_post( $post2 );
		update_post_meta( $post2_id, $meta_key, $new_meta_value );
		$getImageFile = get_template_directory_uri() . '/assets/images/blog_img_2.jpg';
        Generate_Featured_Image( $getImageFile , $post2_id );

		$post3_id = wp_insert_post( $post3 );
		update_post_meta( $post3_id, $meta_key, $new_meta_value );
		$getImageFile = get_template_directory_uri() . '/assets/images/blog_img_3.jpg';
        Generate_Featured_Image( $getImageFile , $post3_id );

        $post4_id = wp_insert_post( $post4 );
        update_post_meta( $post4_id, $meta_key, $new_meta_value );
		$getImageFile = get_template_directory_uri() . '/assets/images/blog_img_4.jpg';
        Generate_Featured_Image( $getImageFile , $post4_id );

        $post5_id = wp_insert_post( $post5 );
        update_post_meta( $post5_id, $meta_key, $new_meta_value );
		$getImageFile = get_template_directory_uri() . '/assets/images/blog_img_5.jpg';
        Generate_Featured_Image( $getImageFile , $post5_id );

        $post6_id = wp_insert_post( $post6 );
        update_post_meta( $post6_id, $meta_key, $new_meta_value );
		$getImageFile = get_template_directory_uri() . '/assets/images/blog_img_6.jpg';
        Generate_Featured_Image( $getImageFile , $post6_id );

	}
}
if ( ! function_exists( 'site_add_gallery' ) ) {
	/**
	 * Function to import gallery
	 */
	function site_add_gallery($force = false ) {
		/**
		* @see Insert Post Type Gallery
		*/
		$import = get_option( 'site_import' );
		if ( $import['gallery'] ) {  // Check if gallery exist
			return;
		}
	    $import['gallery'] = '1';
	    update_option( 'site_import', $import );

		$post1 = array(
		    'post_title'    => 'Gallery 1',
		    'post_status'   => 'publish',
		    'post_type'		=> 'gallery',
		    'post_content' 	=> 'Beauty is a subject as old as time and many sites cover it in the online world. There is a plethora of so-called beauty blogs or sites that offer beauty tips, but only a small amount are genuine. And POSH is a perfect template for your beauty site and it is free...'
		);
		$post2 = array(
		    'post_title'    => 'Gallery 2',
		    'post_status'   => 'publish',
		    'post_type'		=> 'gallery',
		    'post_content' 	=> 'We&rsquo;re driven by our passion for innovation and meticulous attention to detail. Junoteam’s culture engages employees, encourages collaboration and thrives on ideas and ambitions. It defines our past, our future and our average workday...'
		); 
		$post3 = array(
		    'post_title'    => 'Gallery 3',
		    'post_status'   => 'publish',
		    'post_type'		=> 'gallery',
		    'post_content' 	=> 'Junoteam Ltd was registered as a company in July 2015 when the team already had some significations and as well as a known position in Computer Design community.With the demand of our customers, Junoteam has been growing day by day...'
		); 

		$post1_id = wp_insert_post( $post1 );
		$getImageFile = get_template_directory_uri() . '/assets/images/gallery_1.jpg';
        Generate_Featured_Image( $getImageFile , $post1_id );

		$post2_id = wp_insert_post( $post2 );
		$getImageFile = get_template_directory_uri() . '/assets/images/gallery_2.jpg';
        Generate_Featured_Image( $getImageFile , $post2_id );

		$post3_id = wp_insert_post( $post3 );
		$getImageFile = get_template_directory_uri() . '/assets/images/gallery_3.jpg';
        Generate_Featured_Image( $getImageFile , $post3_id );

	}
}
if ( ! function_exists( 'site_i_recommend_this' ) ) {
	/**
	 * Function to Update Options I Recommend This
	 */
	function site_i_recommend_this() {
		/**
		* @see Update Option I recommend This
		*/
		$options = get_option( 'dot_irecommendthis_settings' );
	    $options['disable_css'] = '1';	// Use Own Css
	    $options['recommend_style'] = '1'; //Heart
	    update_option( 'dot_irecommendthis_settings', $options );
	}
}

if ( ! function_exists( 'site_data_update' ) ) {
	/**
	 * Function to Update Data
	 */
	function site_data_update() {
		// Add Menu items
		site_add_menu_items();

		// Add Categories And Posts
		site_add_category_and_posts();

		// Add Post Type Gallery
		site_add_gallery();

		// Add Widgets
		site_add_widget();

		// Update I Recommend This
		site_i_recommend_this();
	}
	add_action('after_switch_theme', 'site_data_update');
}
