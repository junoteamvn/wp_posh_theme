<?php
    $site_logo           = get_theme_mod( 'header_logo' , get_template_directory_uri().'/assets/images/logo.svg' );
    
    $footer_facebook_url =  get_theme_mod('footer_facebook_url','https://www.facebook.com/junoteamdz/');
    $footer_twitter_url  =  get_theme_mod('footer_twitter_url','https://twitter.com/junoteamvn');
    $footer_youtube_url  =  get_theme_mod('footer_youtube_url','https://www.youtube.com/channel/UCXC9x8ycJ0kG0KG0UatQj2w'); 
?>
<footer id ="footer" class="footer">
    <div class="container">
        <nav class="footer-menu">
            <?php  
            if (has_nav_menu('main_menu')) :
                wp_nav_menu(array(
                    'container' => 'ul',
                    'theme_location' => 'main_menu',
                    'menu_class' => 'nav nav-pills',
                ));
            endif;
            ?>
        </nav>
        <?php 
            if ( $site_logo ) {
                echo '<a class="footer-logo" href="#header">
                        <img src="'.$site_logo.'">
                    </a>';
            }
        ?>
        <nav class="footer-socials">
            <ul class="nav nav-pills">
                <?php 
                if ( $footer_facebook_url ) {
                   echo '<li><a href="'.$footer_facebook_url.'" title="" target="_blank">facebook</a></li>';
                }
                if ( $footer_twitter_url ) {
                    echo '<li><a href="'.$footer_twitter_url.'" title="" target="_blank">twitter</a></li>';
                }
                if ( $footer_youtube_url ) {
                    echo '<li><a href="'.$footer_youtube_url.'" title="" target="_blank">youtube</a></li>';
                }
                ?>
            </ul>
        </nav>
        <a class="back-top" href="#header">Go to top
            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="17" viewBox="0 0 5 17">
                <path  d="M1397.5,5506l-2.51,2.72h2.02v14.29h0.98v-14.29H1400Z" transform="translate(-1395 -5506)"/>
            </svg>
        </a>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>