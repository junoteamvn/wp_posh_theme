<?php
/**
* @see Add Custom Post Meta
*/
if( !function_exists( 'site_add_post_meta_boxes' ) ) {
	function site_add_post_meta_boxes() {
	  add_meta_box(
	    'site-blog-url',      // Unique ID
	    'Blog Url',    // Title
	    'blog_url_meta_box',   // Callback function
	    'post',         // Admin page (or post type)
	    'side',         // Context
	    'default'         // Priority
	  );
	}
	add_action( 'add_meta_boxes', 'site_add_post_meta_boxes' );
}
/* Display the post meta box. */
if( !function_exists( 'blog_url_meta_box' ) ) {
	function blog_url_meta_box( $object, $box ) {
	  	wp_nonce_field( basename( __FILE__ ), 'blog_url_nonce' );
	  	echo '<p>
		    	<label for="site-blog-url">The Url of this post</label>
		    	<br/>
		    	<input class="widefat" type="text" name="site-blog-url" id="site-blog-url" value="'.esc_attr(get_post_meta( $object->ID, 'blog_url', true )).'" size="30" />
		  	</p>';
	}
}
/* Save the meta box's post metadata. */
if( !function_exists( 'site_save_blog_url_meta' ) ) {
	function site_save_blog_url_meta( $post_id, $post ) {

	  	/* Verify the nonce before proceeding. */
	  	if ( !isset( $_POST['blog_url_nonce'] ) || !wp_verify_nonce( $_POST['blog_url_nonce'], basename( __FILE__ ) ) )
	    	return $post_id;

	  	/* Get the post type object. */
	  	$post_type = get_post_type_object( $post->post_type );

	  	/* Check if the current user has permission to edit the post. */
	  	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
	    	return $post_id;

	  	/* Get the posted data and sanitize it for use as an HTML class. */
	  	$new_meta_value = ( isset( $_POST['site-blog-url'] ) ? esc_attr( $_POST['site-blog-url'] ) : '' );

	  	$meta_key = 'blog_url';

	  	$meta_value = get_post_meta( $post_id, $meta_key, true );

	  	/* If a new meta value was added and there was no previous value, add it. */
	  	if ( $new_meta_value && '' == $meta_value )
	    	add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	  	/* If the new meta value does not match the old value, update it. */
	  	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		    update_post_meta( $post_id, $meta_key, $new_meta_value );

	}
	add_action( 'save_post', 'site_save_blog_url_meta', 10, 2 );
}
if( !function_exists( 'site_save_blog_url_meta' ) ) {
	function site_blog_url( $classes ) {

	  /* Get the current post ID. */
	  $post_id = get_the_ID();
	  if ( !empty( $post_id ) ) {

	    $post_class = get_post_meta( $post_id, 'blog_url', true );

	    /* If a post class was input, sanitize it and add it to the post class array. */
	    if ( !empty( $post_class ) )
	      $classes[] = esc_attr( $post_class );
	  }
	  return $classes;
	}
	add_filter( 'post_class', 'site_blog_url' );
}