<?php
class services_widget extends WP_Widget {
    /**
     * Config widget: Create Name, base ID
     */
    function __construct() {
			parent::__construct (
	      'services_widget', // id of widget
	      '[Posh Web] Services Widget', // name of widget
	      array(
	          'description' => 'This is widget for Services Sidebar',
	          'customize_selective_refresh' => true,
	      )
	    );
    }

    /**
     * Create form option for widget
     */
    function form( $instance ) {
        $default = array(
			'type'    =>'',
			'icon'    => '',
			'title'   => '',
			'image'   => '',
			'content' => '',
			'url'     =>''
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $type = esc_attr($instance['type']);
        $icon = esc_attr($instance['icon']);
        $title = esc_attr($instance['title']);
        $image = esc_attr($instance['image']);
        $content = esc_attr($instance['content']);
        $url = esc_attr($instance['url']);

        $icon_id = get_image_id_from_image_url( $icon );
    	$get_attachment_icon_src = wp_get_attachment_image_src( $icon_id ,'full');

        $image_id = get_image_id_from_image_url( $image );
    	$get_attachment_image_src = wp_get_attachment_image_src( $image_id ,'full');

    	echo "<p>Service Type: <input type='text' class='widefat' name='".$this->get_field_name('type')."' value='".$type."'/></p>";
    	echo '<p>Icon:(40x40)<br>
             <img src="'.( $icon_id ? $get_attachment_icon_src[0] : get_template_directory_uri() . $icon).'" class="'.$this->get_field_id('icon').($icon == '' ? ' hidden' : '').'">
	    		<input type="hidden" name="'.$this->get_field_name('icon').'" class="'.$this->get_field_id('icon').'" value="'.( $icon_id ? $get_attachment_icon_src[0] : $icon).'"><br>
	    		<button class="admin_img_upload button button-primary" id="'.$this->get_field_id('icon').'">Upload</button></p>';
        echo "<p>Title: <input type='text' class='widefat' name='".$this->get_field_name('title')."' value='".$title."'/></p>";
        echo '<p>Thumbnail:(650x400)<br>
        		<img src="'.( $image_id ? $get_attachment_image_src[0] : get_template_directory_uri() . $image).'" class="'.$this->get_field_id('image').($image == '' ? ' hidden' : '').'">
	    		<input type="hidden" name="'.$this->get_field_name('image').'" class="'.$this->get_field_id('image').'" value="'.( $image_id ? $get_attachment_image_src[0] : $image).'"><br>
	    		<button class="admin_img_upload button button-primary" id="'.$this->get_field_id('image').'">Upload</button></p>';
        echo "<p>Content: <textarea type='text' class='widefat' name='".$this->get_field_name('content')."'>$content</textarea></p>";
        echo "<p>Link Url: <input type='text' class='widefat' name='".$this->get_field_name('url')."' value='".$url."'/></p>";
 		
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['type'] = strip_tags($new_instance['type']);
        $instance['icon'] = strip_tags($new_instance['icon']);
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image'] = strip_tags($new_instance['image']);
        $instance['content'] = strip_tags($new_instance['content']);
        $instance['url'] = strip_tags($new_instance['url']);
        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
	    extract($args);
	    $type = $instance['type'];
	    $title = $instance['title'];
	    $image = $instance['image'];
	    $content = $instance['content'];
	    $url = $instance['url'];
    	
	    $image_id = get_image_id_from_image_url( $image );
    	$get_attachment_image_src = wp_get_attachment_image_src( $image_id ,'full');
    	
    	echo $before_widget;
	    echo '<div class="post-img col-md-7">
                <div class="img-cover" style="background-image: url('.( $image_id ? $get_attachment_image_src[0] : get_template_directory_uri() . $image).');"></div>
        		</div>
                <div class="post-content col-md-5">
                    <h4 class="post-heading">'.$title.'</h4>
                    <p class="post-text">'.$content.'</p>
                    <a class="post-link" href="'.$url.'" target="_blank">Learn more
                    <svg class="cls-arrow" xmlns="http://www.w3.org/2000/svg" width="32.06" height="9.94" viewBox="0 0 32.06 9.94">
                      <metadata><?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?>
                    <x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        ">
                       <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                          <rdf:Description rdf:about=""/>
                       </rdf:RDF>
                    </x:xmpmeta><?xpacket end="w"?></metadata>
                      <path class="cls-1" d="M1081.77,1635.72l-5.13-4.96v3.99h-26.91v1.95h26.91v3.99Z" transform="translate(-1049.72 -1630.75)"/>
                    </svg></a>
                </div>';
        echo $after_widget;
	} 
}