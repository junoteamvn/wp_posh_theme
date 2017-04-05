<?php
/**
* @see Render Partial Callback Live Preview
*/
if ( ! function_exists( 'customize_header_logo' ) ) {
	function customize_services_title() {
	    return get_theme_mod( 'services_title' );
	}
}
if ( ! function_exists( 'customize_header_logo' ) ) {
	function customize_header_logo() {
	    return '<img src="'.get_theme_mod( 'header_logo' ).'">';
	}
}
if ( ! function_exists( 'customize_header_phone' ) ) {
	function customize_header_phone() {
	    return get_theme_mod( 'header_phone' );
	}
}
if ( ! function_exists( 'customize_header_address' ) ) {
	function customize_header_address() {
	    return get_theme_mod( 'header_address' );
	}
}
if ( ! function_exists( 'customize_header_facebook_url' ) ) {
	function customize_header_facebook_url() {
	    return '<a class="icon-facebook" href="'.get_theme_mod( 'header_facebook_url' ).'" target="_blank"></a>';
	}
}
if ( ! function_exists( 'customize_services_description' ) ) {
	function customize_services_description() {
	    return get_theme_mod( 'services_description' );
	}
}
if ( ! function_exists( 'customize_channel_title' ) ) {
	function customize_channel_title() {
	    return get_theme_mod( 'channel_title' );
	}
}
if ( ! function_exists( 'customize_channel_description' ) ) {
	function customize_channel_description() {
	    return get_theme_mod( 'channel_description' );
	}
}
if ( ! function_exists( 'customize_channel_video_thumb' ) ) {
	function customize_channel_video_thumb() {
	    return '<div class="img-cover" style="background-image: url('.get_theme_mod( 'channel_video_thumb' ).');"><i class="icon-play"></i></div>';
	}
}
if ( ! function_exists( 'customize_channel_button_label' ) ) {
	function customize_channel_button_label() {
	    return get_theme_mod( 'channel_button_label' );
	}
}
if ( ! function_exists( 'customize_blog_title' ) ) {
	function customize_blog_title() {
	    return get_theme_mod( 'blog_title' );
	}
}
if ( ! function_exists( 'customize_blog_button_label' ) ) {
	function customize_blog_button_label() {
	    return get_theme_mod( 'blog_button_label' );
	}
}
if ( ! function_exists( 'customize_contact_title' ) ) {
	function customize_contact_title() {
	    return get_theme_mod( 'contact_title' );
	}
}
if ( ! function_exists( 'customize_contact_description' ) ) {
	function customize_contact_description() {
	    return get_theme_mod( 'contact_description' );
	}
}
if ( ! function_exists( 'customize_contact_address' ) ) {
	function customize_contact_address() {
	    return get_theme_mod( 'contact_address' );
	}
}
if ( ! function_exists( 'customize_contact_phone' ) ) {
	function customize_contact_phone() {
	    return get_theme_mod( 'contact_phone' );
	}
}
if ( ! function_exists( 'customize_contact_email' ) ) {
	function customize_contact_email() {
	    return get_theme_mod( 'contact_email' );
	}
}
if ( ! function_exists( 'customize_footer_facebook_url' ) ) {
	function customize_footer_facebook_url() {
	    return '<a href="'.get_theme_mod( 'footer_facebook_url' ).'" title="" target="_blank">facebook</a>';
	}
}