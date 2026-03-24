<?php
/**
 * Norton Simple — Theme Customizer
 *
 * Adds a Footer section to the WordPress Customizer so the footer status
 * line text can be edited without touching code.
 */

function norton_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'norton_footer', array(
        'title'    => __( 'Footer', 'norton-simple' ),
        'priority' => 120,
    ) );

    $wp_customize->add_setting( 'norton_footer_text', array(
        'default'           => '[SYS] OPERATIONAL',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'norton_footer_text', array(
        'label'       => __( 'Footer Status Text', 'norton-simple' ),
        'description' => __( 'Text displayed in the footer bar after the copyright line.', 'norton-simple' ),
        'section'     => 'norton_footer',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'norton_customize_register' );
