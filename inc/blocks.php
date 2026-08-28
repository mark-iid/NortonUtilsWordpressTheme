<?php
/**
 * Norton Simple — Custom Blocks
 *
 * Registers Norton Box, Norton Box Invert and Norton Alert from their
 * blocks/<name>/block.json metadata. Each block is dynamic: the editor saves
 * only the inner blocks, and the matching render.php emits the wrapper at
 * render time so markup changes ship without re-saving every post.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Block directory names under blocks/, relative to the theme root.
 */
function norton_simple_block_dirs() {
	return array( 'box', 'box-invert', 'alert' );
}

/**
 * Register the shared editor script referenced by each block.json's
 * "editorScript" handle. One bundle registers all three blocks, so they share
 * a single handle rather than one file per block.
 */
function norton_simple_register_block_assets() {
	wp_register_script(
		'norton-simple-blocks',
		get_template_directory_uri() . '/assets/js/blocks.js',
		array( 'wp-blocks', 'wp-block-editor', 'wp-element', 'wp-components', 'wp-i18n' ),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_set_script_translations( 'norton-simple-blocks', 'norton-simple', get_template_directory() . '/languages' );
}
add_action( 'init', 'norton_simple_register_block_assets', 5 );

/**
 * Register each block from its block.json metadata.
 */
function norton_simple_register_blocks() {
	foreach ( norton_simple_block_dirs() as $block_dir ) {
		register_block_type( get_template_directory() . '/blocks/' . $block_dir );
	}
}
add_action( 'init', 'norton_simple_register_blocks' );
