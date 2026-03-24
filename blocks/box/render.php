<?php
/**
 * Render callback for Norton Box block
 * 
 * Wraps the inner content in a norton-box div.
 */
?>
<div class="norton-box">
	<?php echo wp_kses_post( $content ); ?>
</div>
