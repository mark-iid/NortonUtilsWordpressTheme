<?php
/**
 * Norton Simple — Shortcodes
 *
 * [norton_box] — a raised-bevel content box.
 * [norton_alert type="info|success|error"] — status alert with prefix glyph.
 */

/**
 * [norton_box]...[/norton_box]
 * Wraps content in a Norton-styled raised box.
 */
function norton_shortcode_box( $atts, $content = null ) {
    return '<div class="norton-box">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'norton_box', 'norton_shortcode_box' );

/**
 * [norton_box_invert]...[/norton_box_invert]
 * Wraps content in a Norton-styled raised box.
 */
function norton_shortcode_box_invert( $atts, $content = null ) {
    return '<div class="norton-box-invert">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'norton_box_invert', 'norton_shortcode_box_invert' );

/**
 * [norton_alert type="info|success|error"]...[/norton_alert]
 * Renders an alert box; CSS ::before pseudo-element adds the prefix glyph.
 *
 * @param array  $atts    Shortcode attributes. 'type' defaults to 'info'.
 * @param string $content Inner content.
 */
function norton_shortcode_alert( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'type' => 'info',
    ), $atts, 'norton_alert' );

    $allowed_types = array( 'info', 'success', 'error' );
    $type          = in_array( $atts['type'], $allowed_types, true ) ? $atts['type'] : 'info';

    return '<div class="norton-alert ' . esc_attr( $type ) . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'norton_alert', 'norton_shortcode_alert' );
