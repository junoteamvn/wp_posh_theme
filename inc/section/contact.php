<?php
// Tạo section
$wp_customize->add_section (
    'contact',
    array(
        'title' => 'Contact',
        'priority' => 4,
        'panel'  => 'section',
    )
);

// Tạo setting title
$wp_customize->add_setting (
    'contact_title',
    array(
        'default' => 'Contact Us',
        'transport' => 'postMessage'
    )
);

// Tạo control title
$wp_customize->add_control (
    'contact_title',
    array(
        'label' => 'Title Of Contact',
        'section' => 'contact',
        'type' => 'text',
        'settings' => 'contact_title',
    )
);
// Create Edit title
$wp_customize->selective_refresh->add_partial( 'contact_title', array(
    'selector' => '#contact h2',
    'render_callback' => 'customize_contact_title'
) );

// Tạo setting description
$wp_customize->add_setting (
    'contact_description',
    array(
        'default'   => "Give us a call and we'll chat through what you need",
        'transport' => 'postMessage'
    )
);

// Tạo control description
$wp_customize->add_control (
    'contact_description',
    array(
        'label' => 'Description',
        'section' => 'contact',
        'type' => 'textarea',
        'settings' => 'contact_description'
    )
);
// Create Edit description
$wp_customize->selective_refresh->add_partial( 'contact_description', array(
    'selector' => '#contact p.heading-content',
    'render_callback' => 'customize_contact_description'
) );

// Create setting Address
$wp_customize->add_setting (
    'contact_address',
    array(
        'default' => '27 Ba Trieu St. Hue city, Viet Nam',
        'transport' => 'postMessage'
    )
);
// Create control Address
$wp_customize->add_control (
    'contact_address',
    array(
        'label' => 'Address',
        'section' => 'contact',
        'type' => 'text',
        'settings' => 'contact_address'
    )
);
// Create Edit Address
$wp_customize->selective_refresh->add_partial( 'contact_address', array(
    'selector' => '#contact .content-address p.content-text a',
    'render_callback' => 'customize_contact_address'
) );

// Create setting Google Map
$wp_customize->add_setting (
    'contact_googlemap',
    array(
        'default' => 'https://goo.gl/maps/fgKghEaP2pp',
        'transport' => 'postMessage'
    )
);
// Create control Google Map
$wp_customize->add_control (
    'contact_googlemap',
    array(
        'label' => 'Google Map Link',
        'section' => 'contact',
        'type' => 'text',
        'settings' => 'contact_googlemap'
    )
);

// Create setting Phone
$wp_customize->add_setting (
    'contact_phone',
    array(
        'default' => '+84 90 658 2725',
        'transport' => 'postMessage'
    )
);
// Create control Phone
$wp_customize->add_control (
    'contact_phone',
    array(
        'label' => 'Phone Number',
        'section' => 'contact',
        'type' => 'text',
        'settings' => 'contact_phone'
    )
);
// Create Edit Phone
$wp_customize->selective_refresh->add_partial( 'contact_phone', array(
    'selector' => '#contact .content-phone p.content-text a',
    'render_callback' => 'customize_contact_phone'
) );

// Create setting Email
$wp_customize->add_setting (
    'contact_email',
    array(
        'default' => 'junoteamvn@gmail.com',
        'transport' => 'postMessage'
    )
);
// Create control Email
$wp_customize->add_control (
    'contact_email',
    array(
        'label' => 'Email',
        'section' => 'contact',
        'type' => 'text',
        'settings' => 'contact_email'
    )
);
// Create Edit Email
$wp_customize->selective_refresh->add_partial( 'contact_email', array(
    'selector' => '#contact .content-email p.content-text a',
    'render_callback' => 'customize_contact_email'
) );
