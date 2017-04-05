<?php
class header_widget extends WP_Widget {
    /**
     * Config widget: Create Name, base ID
     */
    function __construct() {
			parent::__construct (
	      'header_widget', // id of widget
	      '[Posh Web] Header Widget', // name of widget
	      array(
	          'description' => 'This is widget for Header Sidebar',
	          'customize_selective_refresh' => true,
	      )
	    );
    }

    /**
     * Create form option for widget
     */
    function form( $instance ) {
        $default = array(
			'banner'       => '',
			'title'        => '',
			'number_title' => '',
			'description'  => '',
			'labelurl'     =>'',
			'url'          =>'',
			'video'        =>'',
        );
		$instance     = wp_parse_args( (array) $instance, $default );
		$banner       = esc_attr($instance['banner']);
		$title        = esc_attr($instance['title']);
		$number_title = esc_attr($instance['number_title']);
		$description  = esc_attr($instance['description']);
		$labelurl     = esc_attr($instance['labelurl']);
		$url          = esc_attr($instance['url']);
		$video        = esc_attr($instance['video']);

        $image_id = get_image_id_from_image_url( $banner );
    	$get_attachment_image_src = wp_get_attachment_image_src( $image_id ,'full');

        echo '<p>Banner Background: (1350x850)<br>
        		<img src="'.( $image_id ? $get_attachment_image_src[0] : get_template_directory_uri() . $banner).'" class="'.$this->get_field_id('banner').($banner == '' ? ' hidden' : '').'">
	    		<input type="hidden" name="'.$this->get_field_name('banner').'" class="'.$this->get_field_id('banner').'" value="'.( $image_id ? $get_attachment_image_src[0] : $banner).'"><br>
	    		<button class="admin_img_upload button button-primary" id="'.$this->get_field_id('banner').'">Upload</button></p>';
	    echo "<p>Title: <input type='text' class='widefat' name='".$this->get_field_name('title')."' value='".$title."'/></p>";
	    echo "<p>Position Title Highlight: (Space For Multiple) <input type='text' class='widefat highlight' name='".$this->get_field_name('number_title')."' value='".$number_title."' onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 32'/></p>";
        echo "<p>Description: <textarea type='text' class='widefat' name='".$this->get_field_name('description')."'>$description</textarea></p>";	
        echo "<p>Button Label: <input type='text' class='widefat' name='".$this->get_field_name('labelurl')."' value='".$labelurl."'/></p>";
        echo "<p>Link Url: <input type='text' class='widefat' name='".$this->get_field_name('url')."' value='".$url."'/></p>";
        echo "<p>Video Url: <input type='text' class='widefat' name='".$this->get_field_name('video')."' value='".$video."'/></p>";
 		
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['banner'] = strip_tags($new_instance['banner']);
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number_title'] = strip_tags($new_instance['number_title']);
        $instance['description'] = strip_tags($new_instance['description']);
        $instance['labelurl'] = strip_tags($new_instance['labelurl']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['video'] = strip_tags($new_instance['video']);
        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
	    extract($args);
	    $banner = $instance['banner'];
	    $title = $instance['title'];
	    $number_title = $instance['number_title'];
	    $description = $instance['description'];
	    $labelurl = $instance['labelurl'];
	    $url = $instance['url'];
	    $video = $instance['video'];

	    // Arg number
	    $nummber_arg = array_unique(explode(" ",$number_title));

	    // Arg string
	    $title_arg = explode(" ",$title);
	    foreach( $title_arg as $index => $val){
	    	foreach ( $nummber_arg as $num ){
	    		if ( $num - 1 == $index){
	    			$title_arg[$index] = '<span>'.$val.'</span>';
	    		}
	    	}
	    }
	    $title = implode(" ",$title_arg);

	    $image_id = get_image_id_from_image_url( $banner );
    	$get_attachment_image_src = wp_get_attachment_image_src( $image_id ,'full');

    	echo $before_widget;
	    echo '<div class="header_bg" style="background-image:url('.( $image_id ? $get_attachment_image_src[0] : get_template_directory_uri() . $banner).');"></div>
	            <div class="container">
	                <div class="item-common">
	                    <h1 class="heading-title wow fadeIn" data-wow-duration="1s">'.$title.'</h1>
	                    <p class="heading-content wow fadeInUp" data-wow-duration="1s">'.$description.'</p>
	                    <div class="header-button">';
	    if ( $labelurl ){
            echo '<a class="btn-left wow fadeIn" data-wow-duration="1s" href="'.$url.'" target="_blank">'.$labelurl.'</a>';
        }
        if ( $video ) {
            echo '<a class="btn-right icon-play wow fadeIn" data-wow-duration="1s" data-toggle="modal" data-target="#headerModal" href="'.$video.'"> Watch video</a>';
        }
        echo '</div></div></div>';
        echo $after_widget;
	} 
}