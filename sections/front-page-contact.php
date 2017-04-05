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
                    <svg class="content-img" xmlns="http://www.w3.org/2000/svg" width="60" height="60.03" viewBox="0 0 60 60.03">
                        <defs>
                        </defs>
                        <path id="black" class="cls-2" d="M314,5133.2a22,22,0,1,1-32.526-19.33l0.921,1.78a20,20,0,1,0,19.21,0l0.921-1.78A22.013,22.013,0,0,1,314,5133.2Zm-13.362-22.98L292,5127.2l-8.638-16.98A10,10,0,1,1,300.638,5110.22Zm-1.528-1.37h0.015L292,5123.2l-7.125-14.35h0.015A8,8,0,1,1,299.11,5108.85Zm-36.381,30.4,58.024-15.02a1,1,0,1,1,.518,1.93l-58.024,15.02a1.007,1.007,0,0,1-1.225-.71A1,1,0,0,1,262.729,5139.25Z" transform="translate(-262 -5095.19)"/>
                        <path id="blue" class="cls-1" d="M292,5101.19a4,4,0,1,1-4,4A4,4,0,0,1,292,5101.19Zm0,2a2,2,0,1,1-2,2A2,2,0,0,1,292,5103.19Zm3.5,34.14a0.948,0.948,0,0,1,.366,1.32l-6,10.08a1.011,1.011,0,0,1-1.366.36,0.959,0.959,0,0,1-.366-1.33l6-10.08A1.017,1.017,0,0,1,295.5,5137.33Zm-0.5-.13h11a1.005,1.005,0,0,1,0,2.01H295A1.005,1.005,0,0,1,295,5137.2Z" transform="translate(-262 -5095.19)"/>
                    </svg>
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
                    <svg class="content-img" xmlns="http://www.w3.org/2000/svg" width="38" height="60.03" viewBox="0 0 38 60.03">
                        <path id="black" class="cls-2" d="M700,5095.19h30a4,4,0,0,1,4,4v52.02a4,4,0,0,1-4,4H700a4,4,0,0,1-4-4v-52.02A4,4,0,0,1,700,5095.19Zm0,2h30a2,2,0,0,1,2,2v52.02a2,2,0,0,1-2,2H700a2,2,0,0,1-2-2v-52.02A2,2,0,0,1,700,5097.19Zm-3,46.02h30a1,1,0,0,1,0,2H697A1,1,0,0,1,697,5143.21Zm6-38.02h30a1,1,0,0,1,0,2H703A1,1,0,0,1,703,5105.19Z" transform="translate(-696 -5095.19)"/>
                        <path id="blue" class="cls-1" d="M715,5147.21a2,2,0,1,1-2,2A2,2,0,0,1,715,5147.21Zm-3-47.02h6a1,1,0,0,1,0,2h-6A1,1,0,0,1,712,5100.19Zm-9.715,15.36,4.073-4.07a0.95,0.95,0,0,1,1.357,0,0.963,0.963,0,0,1,0,1.36l-4.073,4.07a0.95,0.95,0,0,1-1.357,0A0.963,0.963,0,0,1,702.285,5115.55Zm0,6.01,10.073-10.08a0.95,0.95,0,0,1,1.357,0,0.963,0.963,0,0,1,0,1.36l-10.073,10.07A0.957,0.957,0,1,1,702.285,5121.56Z" transform="translate(-696 -5095.19)"/>
                    </svg>
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
                    <svg class="content-img" xmlns="http://www.w3.org/2000/svg" width="60" height="46.03" viewBox="0 0 60 46.03">
                        <path id="black" class="cls-2" d="M1108,5148.21h-52a4,4,0,0,1-4-4v-35.02a1,1,0,0,1,2,0v35.02a2.006,2.006,0,0,0,2,2h52a2.006,2.006,0,0,0,2-2v-38.02a2.006,2.006,0,0,0-2-2h-55a1,1,0,0,1,0-2h55a4,4,0,0,1,4,4v38.02A4,4,0,0,1,1108,5148.21Z" transform="translate(-1052 -5102.19)"/>
                        <path id="blue" class="cls-1" d="M1105.69,5108.47a1.008,1.008,0,0,1,0,1.42l-23,23a0.978,0.978,0,0,1-1.41,0,1,1,0,0,1,0-1.41l23-23.01A1,1,0,0,1,1105.69,5108.47Zm-47.38,0a1.008,1.008,0,0,0,0,1.42l23,23a0.978,0.978,0,0,0,1.41,0,1,1,0,0,0,0-1.41l-23-23.01A1,1,0,0,0,1058.31,5108.47Z" transform="translate(-1052 -5102.19)"/>
                    </svg>
                    <p class="content-title">Email contact</p>
                    <p class="content-text"><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></p>
                </div>
            </div> 
            <?php endif; ?>
        </div>
    </div>
</section>