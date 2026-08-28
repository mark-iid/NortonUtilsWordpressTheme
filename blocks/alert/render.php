<?php
/**
 * Render callback for the Norton Alert block.
 *
 * Renders the alert with the specified type (info, success, error). The
 * leading glyph is supplied by CSS via a ::before pseudo-element.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Rendered inner blocks.
 * @var WP_Block $block      Block instance.
 */

defined( 'ABSPATH' ) || exit;

$norton_allowed_types = array( 'info', 'success', 'error' );
$norton_type          = isset( $attributes['type'] ) ? (string) $attributes['type'] : 'info';
$norton_type          = in_array( $norton_type, $norton_allowed_types, true ) ? $norton_type : 'info';

$norton_wrapper = get_block_wrapper_attributes( array( 'class' => 'norton-alert is-type-' . $norton_type ) );
?>
<div <?php echo $norton_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner blocks are already rendered and sanitized by core. ?>
</div>
