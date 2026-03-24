<?php
/**
 * Norton Simple — Custom Blocks
 *
 * Register Norton Box and Norton Alert as native WordPress blocks
 * Available in the visual editor block inserter.
 */

/**
 * Register Norton Box block
 */
function norton_register_box_block() {
    register_block_type(
        'norton/box',
        array(
            'title'           => 'Norton Box',
            'description'     => 'A raised-style box with beveled borders',
            'category'        => 'design',
            'icon'            => 'admin-page',
            'render_callback' => 'norton_render_box_block',
            'attributes'      => array(
                'content' => array(
                    'type' => 'string',
                    'default' => 'Box content goes here',
                ),
            ),
        )
    );
}
add_action( 'init', 'norton_register_box_block' );

/**
 * Render Norton Box block
 */
function norton_render_box_block( $attributes, $content ) {
    return '<div class="norton-box">' . wp_kses_post( $content ) . '</div>';
}

/**
 * Register Norton Box Invert block
 */
function norton_register_box_invert_block() {
    register_block_type(
        'norton/box-invert',
        array(
            'title'           => 'Norton Box Invert',
            'description'     => 'An inset-style box with inverted beveled borders',
            'category'        => 'design',
            'icon'            => 'admin-page',
            'render_callback' => 'norton_render_box_invert_block',
            'attributes'      => array(
                'content' => array(
                    'type' => 'string',
                    'default' => 'Invert box content goes here',
                ),
            ),
        )
    );
}
add_action( 'init', 'norton_register_box_invert_block' );

/**
 * Render Norton Box Invert block
 */
function norton_render_box_invert_block( $attributes, $content ) {
    return '<div class="norton-box-invert">' . wp_kses_post( $content ) . '</div>';
}

/**
 * Register Norton Alert block
 */
function norton_register_alert_block() {
    register_block_type(
        'norton/alert',
        array(
            'title'           => 'Norton Alert',
            'description'     => 'An alert box with configurable type (info, success, error)',
            'category'        => 'design',
            'icon'            => 'info',
            'render_callback' => 'norton_render_alert_block',
            'attributes'      => array(
                'content' => array(
                    'type' => 'string',
                    'default' => 'Alert message',
                ),
                'type' => array(
                    'type'    => 'string',
                    'default' => 'info',
                    'enum'    => array( 'info', 'success', 'error' ),
                ),
            ),
        )
    );
}
add_action( 'init', 'norton_register_alert_block' );

/**
 * Render Norton Alert block
 */
function norton_render_alert_block( $attributes, $content ) {
    $type = isset( $attributes['type'] ) ? sanitize_text_field( $attributes['type'] ) : 'info';
    $allowed_types = array( 'info', 'success', 'error' );
    $type = in_array( $type, $allowed_types, true ) ? $type : 'info';
    
    return '<div class="norton-alert ' . esc_attr( $type ) . '">' . wp_kses_post( $content ) . '</div>';
}
