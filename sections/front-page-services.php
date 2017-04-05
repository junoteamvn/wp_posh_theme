<?php
    $services_title =  get_theme_mod('services_title' , 'Our Services');
    $services_description =  get_theme_mod('services_description' , 'Super easy to use, just install demo content and start playing with our theme options');
?>
<section id="service" class="service">
    <div class="bg-service" style="background-image: url(<?php echo get_template_directory_uri().'/assets/images/services_background.png'; ?>);"></div>
    <div class="container">
        <?php if ( $services_title ){
            echo '<h2 class="heading-title wow fadeIn" data-wow-duration="0.5s" >'.$services_title.'</h2>';
        }
        if ( $services_description ) {
            echo '<p class="heading-content wow fadeInUp" data-wow-duration="0.5s" >'.$services_description.'</p>';
        }
        ?>
        <div class="service-category wow fadeIn" data-wow-duration="0.5s">
            <ul class="nav nav-pills owl-carousel owl-theme">
                <?php 
                    $sidebar_id = 'services_widget';
                    $sidebars_widgets = wp_get_sidebars_widgets();
                    $widget_ids = $sidebars_widgets[$sidebar_id]; 
                    $active = 'active';
                    foreach( $widget_ids as $id ) {
                        $wdgtvar = 'widget_'._get_widget_id_base( $id );
                        $idvar = _get_widget_id_base( $id );
                        $instance = get_option( $wdgtvar );
                        $idbs = str_replace( $idvar.'-', '', $id );

                        $icon = $instance[$idbs]['icon'];
                        $type = $instance[$idbs]['type'];
                        $image_id = get_image_id_from_image_url( $icon );
                        $get_attachment_image_src = wp_get_attachment_image_src( $image_id ,'full');

                        if ( $type ) {
                            echo '<li class="item '.$active.'"><a data-toggle="pill" href="#'.$id.'"><img src="'.( $image_id ? $get_attachment_image_src[0] : get_template_directory_uri() . $icon).'"><span>'.$type.'</span></a></li>';
                        }
                        $active = '';
                    }
                ?>
            </ul>
        </div>
        <div class="tab-content owl-carousel owl-theme wow fadeIn" data-wow-duration="0.5s">
             <?php if ( is_active_sidebar('services_widget') ) dynamic_sidebar('services_widget'); ?>
        </div>
    </div>
</section>