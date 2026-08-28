<?php
/**
 * Render callback for the Norton Box block.
 *
 * Wraps the block's inner content in a raised-bevel container.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Rendered inner blocks.
 * @var WP_Block $block      Block instance.
 */

defined( 'ABSPATH' ) || exit;

$norton_wrapper = get_block_wrapper_attributes( array( 'class' => 'norton-box' ) );
?>
<div <?php echo $norton_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner blocks are already rendered and sanitized by core. ?>
</div>
