<?php
/**
 * Render callback for Norton Alert block
 * 
 * Renders the alert with the specified type (info, success, error).
 */
$type = isset( $attributes['type'] ) ? sanitize_text_field( $attributes['type'] ) : 'info';
$allowed_types = array( 'info', 'success', 'error' );
$type = in_array( $type, $allowed_types, true ) ? $type : 'info';
?>
<div class="norton-alert <?php echo esc_attr( $type ); ?>">
	<?php echo wp_kses_post( $content ); ?>
</div>
