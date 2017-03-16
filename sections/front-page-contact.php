<?php
    $contact_title       =  get_theme_mod('contact_title', 'Contact Us');
    $contact_description =  get_theme_mod('contact_description' , "Give us a call and we'll chat through what you need");
    $contact_address     =  get_theme_mod('contact_address', '27 Ba Trieu St. Hue city, Viet Nam');
    $contact_googlemap   =  get_theme_mod('contact_googlemap', 'https://goo.gl/maps/fgKghEaP2pp');
    $contact_phone       =  get_theme_mod('contact_phone', '+84 90 658 2725');
    $contact_phone_link  =  str_replace(' ', '', $contact_phone);
    $contact_email       =  get_theme_mod('contact_email', 'junoteamvn@gmail.com');
?>
<section id="contact" class="contact">
    <div class="container">
        <?php 
            if ( $contact_title ){
                echo '<h2 class="heading-title wow fadeIn" data-wow-duration="0.5s">'.$contact_title.'</h2>';
            }
            if ( $contact_description ){
                echo '<p class="heading-content wow fadeInUp" data-wow-duration="0.5s">'.$contact_description.'</p>';
            }
        ?>
        <div class="contact-content">
            <?php 
                if ( $contact_address ) :
            ?>
            <div class="col-md-4 col-sm-12 content-address wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="content-common">
                    <img class="content-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact_address_img.svg" alt="">
                    <p class="content-title">Address</p>
                    <p class="content-text"><a href="<?php echo $contact_googlemap; ?>" target="_blank"><?php echo $contact_address; ?></a></p>
                </div>  
            </div>
            <?php 
                endif;
                if ( $contact_phone ) :
            ?>
            <div class="col-md-4 col-sm-12 content-phone wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="content-common">
                    <img class="content-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact_phone_img.svg" alt="">
                    <p class="content-title">Phone numbers</p>
                    <p class="content-text"><a href="tel:<?php echo $contact_phone_link; ?>"><?php echo $contact_phone; ?></a></p>
                </div>
            </div>
            <?php 
                endif;
                if ( $contact_email ) :
            ?>
            <div class="col-md-4 col-sm-12 content-email wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.2s">
                <div class="content-common">
                    <img class="content-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact_mail_img.svg" alt="">
                    <p class="content-title">Email contact</p>
                    <p class="content-text"><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></p>
                </div>
            </div> 
            <?php endif; ?>
        </div>
    </div>
</section>