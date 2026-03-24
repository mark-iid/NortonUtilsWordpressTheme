<?php
/**
 * Norton Simple — Custom Blocks
 *
 * Register Norton Box and Norton Alert as native WordPress blocks.
 * Uses client-side rendering with InnerBlocks for content editing.
 */

/**
 * Register Norton blocks
 */
function norton_register_blocks() {
    // Norton Box
    register_block_type( 'norton/box', array(
        'title'           => 'Norton Box',
        'description'     => 'A raised-style box with beveled borders',
        'category'        => 'design',
        'icon'            => 'admin-page',
        'supports'        => array(
            'className'    => true,
            'align'        => true,
        ),
    ) );
    error_log( 'Registered norton/box' );
    
    // Norton Box Invert
    register_block_type( 'norton/box-invert', array(
        'title'           => 'Norton Box Invert',
        'description'     => 'An inset-style box with inverted beveled borders',
        'category'        => 'design',
        'icon'            => 'admin-page',
        'supports'        => array(
            'className'    => true,
            'align'        => true,
        ),
    ) );
    error_log( 'Registered norton/box-invert' );
    
    // Norton Alert
    register_block_type( 'norton/alert', array(
        'title'           => 'Norton Alert',
        'description'     => 'An alert box with configurable type',
        'category'        => 'design',
        'icon'            => 'info',
        'attributes'      => array(
            'type' => array(
                'type'    => 'string',
                'default' => 'info',
            ),
        ),
        'supports'        => array(
            'className'    => true,
            'align'        => true,
        ),
    ) );
    error_log( 'Registered norton/alert' );
}

add_action( 'init', 'norton_register_blocks', 10 );
