<?php
    // Testimonials
    $channel_title =  get_theme_mod('channel_title', 'Video Channel');
    $channel_description =  get_theme_mod('channel_description' , 'Please take a look at our company activities & working environment of recent year');
    $channel_video =  get_theme_mod('channel_video', 'https://www.youtube.com/watch?v=tV2VSAX7KX8&t=81s');
    $channel_video_thumb =  get_theme_mod('channel_video_thumb', get_template_directory_uri().'/assets/images/channel_img.jpg');
    $channel_button_label =  get_theme_mod('channel_button_label', 'More Video');
    $channel_button_url =  get_theme_mod('channel_button_url', 'https://www.youtube.com/channel/UCXC9x8ycJ0kG0KG0UatQj2w');

    $video_id = explode("?v=", $channel_video);
    if (empty($video_id[1])){
        $video_id = explode("/v/", $channel_video);
    }
    $video_id = explode("&", $video_id[1]); 
    $video_id = $video_id[0];

    if ( empty($channel_video_thumb) ) {
        $channel_video_thumb = 'http://img.youtube.com/vi/'.$video_id.'/hqdefault.jpg';
    }
?>
<section id="channel" class="channel">
    <div class="container">
        <?php 
            if ( $channel_title ) {
                echo '<h2 class="heading-title wow fadeIn" data-wow-duration="0.5s" >'.$channel_title.'</h2>';
            }
            if ( $channel_description ) {
                echo '<p class="heading-content wow fadeInUp" data-wow-duration="0.5s" >'.$channel_description.'</p>';
            }
            if ( $channel_video ) {
                echo '<div class="video wow fadeIn" data-wow-duration="0.5s">
                        <a class="img-video" data-toggle="modal" data-target="#channelModal" href="'.$channel_video.'">
                            <div class="img-cover" style="background-image: url('.$channel_video_thumb.');"><i class="icon-play"></i></div>
                        </a>
                    </div>';
            }
            if ( $channel_button_label ) {
                echo '<a class="button-video wow fadeIn" href="'.$channel_button_url.'" target="_blank">'.$channel_button_label.'</a>';
            }
        ?>
    </div>
    <div id="channelModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <iframe class="if-video" width="100%" height="500px" src=""></iframe>
            </div>
        </div>
    </div>
</section>