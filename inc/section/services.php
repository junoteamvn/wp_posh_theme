<?php
// Add section
$wp_customize->add_section (
    'services',
    array(
        'panel'  => 'section',
    )
);

// Add setting title
$wp_customize->add_setting (
    'services_title',
    array(
        'default'   => 'Our Services',
        'transport' => 'postMessage',
    )
);

// Add control title
$wp_customize->add_control (
    'services_title',
    array(
        'label' => 'Title Of Services',
        'section' => 'services',
        'type' => 'text',
        'settings' => 'services_title',
        'priority'    => -2,
    )
);
// Create Edit title
$wp_customize->selective_refresh->add_partial( 'services_title', array(
    'selector' => '#service h2',
    'render_callback' => 'customize_services_title'
) );

// Add setting description
$wp_customize->add_setting (
    'services_description',
    array(
        'default'   => 'Super easy to use, just install demo content and start playing with our theme options',
        'transport' => 'postMessage',
    )
);

// Add control description
$wp_customize->add_control (
    'services_description',
    array(
        'label' => 'Description',
        'section' => 'services',
        'type' => 'textarea',
        'settings' => 'services_description',
        'priority'    => -1,
    )
);
// Create Edit description
$wp_customize->selective_refresh->add_partial( 'services_description', array(
    'selector' => '#service .heading-content ',
    'render_callback' => 'customize_services_description'
) );

// Move Widget To Section
$services_section = $wp_customize->get_section('sidebar-widgets-services_widget');
if(!empty($services_section)) {
    $services_section->panel                                      = 'section';
    $services_section->title                                      = 'Services';
    $services_section->priority                                   = 1;
    $wp_customize->get_control( 'services_title' )->section       = 'sidebar-widgets-services_widget';
    $wp_customize->get_control( 'services_description' )->section = 'sidebar-widgets-services_widget';
}
