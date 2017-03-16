<?php

// Create section
$wp_customize->add_section (
    'footer',
    array(
        'title' => 'Footer',
        'priority' => 50,
    )
); 

// Create setting Facebook Url
$wp_customize->add_setting (
    'footer_facebook_url',
    array(
        'default'   => 'https://www.facebook.com/junoteamdz/',
        'transport' => 'postMessage'
    )
);
// Create control Facebook Url
$wp_customize->add_control (
    'footer_facebook_url',
    array(
        'label' => 'Facebook Url',
        'section' => 'footer',
        'type' => 'text',
        'settings' => 'footer_facebook_url'
    )
);
// Create Edit Facebook Url
$wp_customize->selective_refresh->add_partial( 'footer_facebook_url', array(
    'selector'        => '#footer .footer-socials ul li:first-child()',
    'render_callback' => 'customize_footer_facebook_url'
) );

// Create setting Instagram
$wp_customize->add_setting (
    'footer_twitter_url',
    array(
        'default' => 'https://twitter.com/junoteamvn',
        'transport' => 'postMessage'
    )
);
// Create control instagram_url
$wp_customize->add_control (
    'footer_twitter_url',
    array(
        'label' => 'Twiiter Url',
        'section' => 'footer',
        'type' => 'text',
        'settings' => 'footer_twitter_url'
    )
);

// Create setting Youtube Url
$wp_customize->add_setting (
    'footer_youtube_url',
    array(
        'default' => 'https://www.youtube.com/channel/UCXC9x8ycJ0kG0KG0UatQj2w',
        'transport' => 'postMessage'
    )
);
// Create control Youtube Url
$wp_customize->add_control (
    'footer_youtube_url',
    array(
        'label' => 'Youtube Url',
        'section' => 'footer',
        'type' => 'text',
        'settings' => 'footer_youtube_url'
    )
);