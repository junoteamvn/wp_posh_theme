<?php
// Tạo section
$wp_customize->add_section (
    'blog',
    array(
        'title' => 'Blog',
        'priority' => 3,
        'panel'  => 'section',
    )
);

// Tạo setting title
$wp_customize->add_setting (
    'blog_title',
    array(
        'default'   => 'Lastest Blog',
        'transport' => 'postMessage',
    )
);

// Tạo control title
$wp_customize->add_control (
    'blog_title',
    array(
        'label' => 'Title Of Blog',
        'section' => 'blog',
        'type' => 'text',
        'settings' => 'blog_title',
    )
);
// Create Edit title
$wp_customize->selective_refresh->add_partial( 'blog_title', array(
    'selector' => '#blog h2',
    'render_callback' => 'customize_blog_title'
) );

// Tạo setting Button Label
$wp_customize->add_setting (
    'blog_button_label',
    array(
        'default'   => 'See More',
        'transport' => 'postMessage',
    )
);

// Tạo control Button Label
$wp_customize->add_control (
    'blog_button_label',
    array(
        'label' => 'Button Label',
        'section' => 'blog',
        'type' => 'text',
        'settings' => 'blog_button_label',
    )
);
// Create Edit Button Label
$wp_customize->selective_refresh->add_partial( 'blog_button_label', array(
    'selector' => '#blog .btn-see-more',
    'render_callback' => 'customize_blog_button_label'
) );

// Tạo setting Button Url
$wp_customize->add_setting (
    'blog_button_url',
    array(
        'default'   => 'http://junoteam.com/blog/',
        'transport' => 'postMessage'
    )
);

// Tạo control Button Url
$wp_customize->add_control (
    'blog_button_url',
    array(
        'label' => 'Button Url',
        'section' => 'blog',
        'type' => 'text',
        'settings' => 'blog_button_url',
    )
);