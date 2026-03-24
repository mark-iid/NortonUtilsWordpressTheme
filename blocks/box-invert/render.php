<?php
/**
 * Render callback for Norton Box Invert block
 * 
 * Wraps the inner content in a norton-box-invert div.
 */
?>
<div class="norton-box-invert">
	<?php echo wp_kses_post( $content ); ?>
</div>
