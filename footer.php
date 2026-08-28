<?php
/**
 * Norton Simple — Footer
 *
 * @package Norton_Simple
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="site-footer">
    &copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?> | <?php echo esc_html( get_theme_mod( 'norton_footer_text', '[SYS] OPERATIONAL' ) ); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
