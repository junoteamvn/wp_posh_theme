<?php
    // Initial
    $site_logo           = get_theme_mod( 'header_logo' , get_template_directory_uri().'/assets/images/logo.svg' );
    $site_logo_resp      = get_theme_mod( 'header_logo' , get_template_directory_uri().'/assets/images/logo-black.svg' );
    
    $header_phone        = get_theme_mod( 'header_phone' , '+84 90 658 2725');
    $header_phone_link   = str_replace(' ', '', $header_phone);
    $header_address      = get_theme_mod( 'header_address' , '27 Ba Trieu St. Hue city, Viet Nam');
    $header_googlemap    =  get_theme_mod('header_googlemap', 'https://goo.gl/maps/fgKghEaP2pp');
    
    $header_facebook_url = get_theme_mod( 'header_facebook_url' , 'https://www.facebook.com/junoteamdz/');
    $header_twitter_url  = get_theme_mod( 'header_twitter_url' , 'https://twitter.com/junoteamvn');
    $header_youtube_url  = get_theme_mod( 'header_youtube_url' , 'https://www.youtube.com/channel/UCXC9x8ycJ0kG0KG0UatQj2w' );
    $header_flickr_url   = get_theme_mod( 'header_flickr_url' ,'https://www.flickr.com/photos/86144247@N08/');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri().'/assets/images/favicon.png'?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>
<body data-spy="scroll" data-target=".menu-wrap" <?php body_class(); ?>>
<div class="navigation">
    <div class="top-nav">
        <div class="container">
            <div class="nav-contact">
                <?php 
                if ( $header_phone ){
                    echo '<a class="icon-phone" href="tel:'.$header_phone_link.'" target="_blank">'.$header_phone.'</a>';
                }
                if ( $header_address ){
                   echo '<a class="icon-location" href="'.$header_googlemap.'" target="_blank">'.$header_address.'</a>';
                }
                ?>
            </div>
            <div class="nav-socials">
                <ul class="nav nav-pills">     
                    <?php
                    if ( $header_facebook_url ) echo '<li><a class="icon-facebook" href="'.$header_facebook_url.'" target="_blank"></a></li>'; 
                    if ( $header_twitter_url ) echo '<li><a class="icon-twitter" href="'.$header_twitter_url.'" target="_blank"></a></li>';
                    if ( $header_youtube_url ) echo '<li><a class="icon-youtube-play" href="'.$header_youtube_url.'" target="_blank"></a></li>';
                    if ( $header_flickr_url ) echo '<li><a class="icon-flickr" href="'.$header_flickr_url.'" target="_blank"></a></li>';
                    ?>  
                </ul>
            </div>    
        </div>
    </div>
    <input type="checkbox" id="menu-toggle" style="display:none;" value="">
    <div class="bot-nav">
        <div class="container">
            <?php 
                if ( $site_logo ) {
                    echo '<a class="logo" href="#header">
                            <img src="'.$site_logo.'">
                        </a>';
                }
            ?>
            <label for="menu-toggle" id="hamburger">
                <div class="hamburger hamburger--squeeze">
                      <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                      </div>
                </div>
            </label>
            <nav class="nav-menu">
                <?php 
                    if ( $site_logo_resp ) {
                        echo '<a class="logo" href="#header">
                                <img src="'.$site_logo_resp.'">
                            </a>';
                    }
                    if (has_nav_menu('main_menu')) {
                        wp_nav_menu(array(
                            'container' => 'ul',
                            'theme_location' => 'main_menu',
                            'menu_class' => 'nav-primary nav nav-pills',
                        ));
                    }
                ?>
                <ul class="nav-socials nav nav-pills"> 
                    <?php
                    if ( $header_facebook_url ) echo ' <li><a class="icon-facebook" href="'.$header_facebook_url.'" target="_blank"></a></li>';
                    if ( $header_twitter_url ) echo '<li><a class="icon-twitter" href="'.$header_twitter_url.'" target="_blank"></a></li>';
                    if ( $header_youtube_url ) echo '<li><a class="icon-youtube-play" href="'.$header_youtube_url.'" target="_blank"></a></li>';
                    if ( $header_flickr_url ) echo '<li><a class="icon-flickr" href="'.$header_flickr_url.'" target="_blank"></a></li>';
                    ?>   
                </ul>
            </nav>
        </div>
    </div>
</div>
<header id="header">
    <div class="owl-carousel owl-theme">
        <?php 
            if ( is_active_sidebar('header_widget') ) {
                dynamic_sidebar('header_widget');
            } else {
                echo '<div class="item" style="background-image:url('.get_template_directory_uri().'/assets/images/header_background_1.jpg'.');"></div>';
            }
        ?>
    </div>
    <div id="headerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <iframe class="if-video" width="100%" height="500px" src=""></iframe>
            </div>
        </div>
    </div>
</header><!-- /header -->
