<?php
/**
 * Norton Simple — Theme Functions
 *
 * This file is intentionally thin. All logic lives in the modular inc/ files.
 * Do not add functional code here directly.
 *
 * Load order:
 *   1. setup.php      — theme support, enqueue, sidebar, nav walker, nuclear CSS
 *   2. customizer.php — Customizer controls
 *   3. shortcodes.php — [norton_box] and [norton_alert]
 *   4. blocks.php     — Custom WordPress blocks for norton elements
 */

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/blocks.php';
