<?php
//Add Panel
$wp_customize->add_panel( 'header_theme', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Header',
    'description'    => 'Header Of Theme'
) );
// Move Site-Identity to Header
$wp_customize->get_section('title_tagline')->panel= 'header_theme';
$wp_customize->get_section('title_tagline')->priority= 1;

/* Color Picker */
$wp_customize->add_setting(
    'header_color',
        array(
            'default' => '#d6a862',
        )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'header_color',
        array(
            'label' => 'Primary Color',
            'section' => 'title_tagline',
            'settings' => 'header_color',
        )
    )
);

/* Logo Header Image */
$wp_customize->add_setting( 
    'header_logo',
    array(
        'default'         => get_template_directory_uri().'/assets/images/logo.svg',
        'transport'       => 'postMessage',
    )
 );
 
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'header_logo',
        array(
            'label' => 'Logo (140x50)',
            'section' => 'title_tagline',
            'settings' => 'header_logo',
        )
    )
);
// Create Edit Logo
$wp_customize->selective_refresh->add_partial( 'header_logo', array(
    'selector' => '.navigation .bot-nav a.logo',
    'render_callback' => 'customize_header_logo'
) );

/* Logo Header Image Tablet/Phone */
$wp_customize->add_setting( 
    'header_logo_resp',
    array(
        'default'         => get_template_directory_uri().'/assets/images/logo-black.svg',
        'transport'       => 'postMessage',
    )
 );
 
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'header_logo_resp',
        array(
            'label' => 'Logo For Tablet/Phone (140x50)',
            'section' => 'title_tagline',
            'settings' => 'header_logo_resp',
        )
    )
);

// Create setting Phone
$wp_customize->add_setting (
    'header_phone',
    array(
        'default'   => '+84 90 658 2725',
        'transport' => 'postMessage',
    )
);
// Create control Phone
$wp_customize->add_control (
    'header_phone',
    array(
        'label' => 'Phone Number',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_phone'
    )
);
// Create Edit Phone
$wp_customize->selective_refresh->add_partial( 'header_phone', array(
    'selector' => '.navigation .top-nav .nav-contact a.icon-phone',
    'render_callback' => 'customize_header_phone'
) );

// Create setting Address
$wp_customize->add_setting (
    'header_address',
    array(
        'default'         => '27 Ba Trieu St. Hue city, Viet Nam',
        'transport'       => 'postMessage',
    )
);

// Create control Address
$wp_customize->add_control (
    'header_address',
    array(
        'label' => 'Address',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_address'
    )
);
// Create Edit Address
$wp_customize->selective_refresh->add_partial( 'header_address', array(
    'selector' => '.navigation .top-nav .nav-contact a.icon-location',
    'render_callback' => 'customize_header_address'
) );

// Create setting Google Map
$wp_customize->add_setting (
    'header_googlemap',
    array(
        'default'         => 'https://goo.gl/maps/fgKghEaP2pp',
        'transport'       => 'postMessage',
    )
);
// Create control Google Map
$wp_customize->add_control (
    'header_googlemap',
    array(
        'label' => 'Google Map Link',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_googlemap'
    )
);

// Create setting Social Facebook
$wp_customize->add_setting (
    'header_facebook_url',
    array(
        'default'         => 'https://www.facebook.com/junoteamdz',
        'transport'       => 'postMessage',
    )
);

// Create control Social Facebook
$wp_customize->add_control (
    'header_facebook_url',
    array(
        'label' => 'Facebook Url',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_facebook_url'
    )
);

// Create setting Social twitter
$wp_customize->add_setting (
    'header_twitter_url',
    array(
        'default'         => 'https://twitter.com/junoteamvn',
        'transport'       => 'postMessage',
    )
);

// Create control Social twitter
$wp_customize->add_control (
    'header_twitter_url',
    array(
        'label' => 'Twitter Url',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_twitter_url'
    )
);

// Create setting Youtube Link
$wp_customize->add_setting (
    'header_youtube_url',
    array(
        'default'         => 'https://www.youtube.com/channel/UCXC9x8ycJ0kG0KG0UatQj2w',
        'transport'       => 'postMessage',
    )
);

// Create control Youtube Link
$wp_customize->add_control (
    'header_youtube_url',
    array(
        'label' => 'Youtube Url',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_youtube_url'
    )
);

// Create setting Social pinterest
$wp_customize->add_setting (
    'header_flickr_url',
    array(
        'default'         => 'https://www.flickr.com/photos/86144247@N08/',
        'transport'       => 'postMessage',
    )
);

// Create control Social pinterest
$wp_customize->add_control (
    'header_flickr_url',
    array(
        'label' => 'Flickr Url',
        'section' => 'title_tagline',
        'type' => 'text',
        'settings' => 'header_flickr_url'
    )
);
// Create Edit Social
$wp_customize->selective_refresh->add_partial( 'header_facebook_url', array(
    'selector' => '.navigation .top-nav .nav-socials ul li:first-child()',
    'render_callback' => 'customize_header_facebook_url'
) );

// Move Widget To Section
$header_section = $wp_customize->get_section('sidebar-widgets-header_widget');
if(!empty($header_section)) {
    $header_section->panel                                      = 'header_theme';
    $header_section->title                                      = 'Banner';
    $header_section->priority                                   = 2;
}