<?php
// Add section
$wp_customize->add_section (
    'channel',
    array(
        'title' => 'Channel',
        'priority' => 2,
        'panel'  => 'section',
    )
);
// Add setting title
$wp_customize->add_setting (
    'channel_title',
    array(
        'default'   => 'Video Channel',
        'transport' => 'postMessage',
    )
);
// Add control title
$wp_customize->add_control (
    'channel_title',
    array(
        'label' => 'Title Of Channel',
        'section' => 'channel',
        'type' => 'text',
        'settings' => 'channel_title',
    )
);
// Create Edit title
$wp_customize->selective_refresh->add_partial( 'channel_title', array(
    'selector'        => '#channel h2',
    'render_callback' => 'customize_channel_title'
) );

// Add setting description
$wp_customize->add_setting (
    'channel_description',
    array(
        'default'   => 'Please take a look at our company activities & working environment of recent year',
        'transport' => 'postMessage',
    )
);

// Add control description
$wp_customize->add_control (
    'channel_description',
    array(
        'label' => 'Description',
        'section' => 'channel',
        'type' => 'textarea',
        'settings' => 'channel_description'
    )
);
// Create Edit Description
$wp_customize->selective_refresh->add_partial( 'channel_description', array(
    'selector'        => '#channel p',
    'render_callback' => 'customize_channel_description'
) );

// Add setting Video Url
$wp_customize->add_setting (
    'channel_video',
    array(
        'default' => 'https://www.youtube.com/watch?v=tV2VSAX7KX8&t=81s',
        'transport' => 'postMessage',
    )
);
// Add control Video Url
$wp_customize->add_control (
    'channel_video',
    array(
        'label' => 'Video Url',
        'section' => 'channel',
        'type' => 'text',
        'settings' => 'channel_video',
    )
);

// Add setting Image
$wp_customize->add_setting( 
    'channel_video_thumb',
    array(
        'default' => get_template_directory_uri().'/assets/images/channel_img.jpg'
    )
)->transport = 'postMessage';

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'channel_video_thumb',
        array(
            'label' => 'Video Thumb (640x360)',
            'section' => 'channel',
            'settings' => 'channel_video_thumb',
        )
    )
);
// Create Edit Video
$wp_customize->selective_refresh->add_partial( 'channel_video_thumb', array(
    'selector'        => '#channel .img-cover',
    'render_callback' => 'customize_channel_video_thumb'
) );

// Add setting Button Label
$wp_customize->add_setting (
    'channel_button_label',
    array(
        'default' => 'More Video',
        'transport' => 'postMessage',
    )
);
// Add control Button Label
$wp_customize->add_control (
    'channel_button_label',
    array(
        'label' => 'Button Label',
        'section' => 'channel',
        'type' => 'text',
        'settings' => 'channel_button_label',
    )
);
// Create Edit Button Label
$wp_customize->selective_refresh->add_partial( 'channel_button_label', array(
    'selector'        => '#channel .button-video',
    'render_callback' => 'customize_channel_button_label'
) );

// Add setting Button Url
$wp_customize->add_setting (
    'channel_button_url',
    array(
        'default' => 'https://www.youtube.com/channel/UCXC9x8ycJ0kG0KG0UatQj2w',
        'transport' => 'postMessage',
    )
);
// Add control Button Url
$wp_customize->add_control (
    'channel_button_url',
    array(
        'label' => 'Button Url',
        'section' => 'channel',
        'type' => 'text',
        'settings' => 'channel_button_url',
    )
);