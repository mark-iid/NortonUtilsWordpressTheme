<?php
/**
 * Norton Simple — Theme Setup
 *
 * Theme support declarations, script/style enqueue, sidebar registration,
 * the custom flat nav walker, and the nuclear CSS injection that ensures
 * our styles win the specificity war against the block editor.
 */

/**
 * Theme feature declarations and sidebar registration.
 */
function norton_simple_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_theme_support( 'wp-block-styles' );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'norton-simple' ),
    ) );

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'norton-simple' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Widgets in this area appear in the right sidebar.', 'norton-simple' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'after_setup_theme', 'norton_simple_setup' );

/**
 * Enqueue the main stylesheet.
 * style.css contains only the theme header; actual styles live in assets/css/norton.css.
 */
function norton_simple_scripts() {
    wp_enqueue_style(
        'norton-style',
        get_template_directory_uri() . '/assets/css/norton.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'norton_simple_scripts' );

/**
 * Custom nav walker — outputs flat <a> tags with no <ul>/<li> wrappers.
 * Keeps the nav bar looking like a real DOS menu strip.
 */
class Norton_Simple_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
    }
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {}
    public function start_lvl( &$output, $depth = 0, $args = array() ) {}
    public function end_lvl( &$output, $depth = 0, $args = array() ) {}
}

/**
 * Nuclear CSS injection — fires at wp_head priority 999 (after everything else).
 *
 * WordPress and the block editor inject high-specificity styles late in the
 * page load. This inline block is the last word. It intentionally duplicates
 * the key rules from assets/css/norton.css so they survive any load-order race.
 */
function norton_nuclear_css() {
    ?>
    <style id="norton-nuclear-override">
    /* === NORTON NUCLEAR OVERRIDE — loads last, wins everything === */

    html body,
    html body.wordpress,
    html body.page,
    html body.single,
    html body.home {
        font-family: 'Courier New', monospace !important;
        background: #000080 !important;
        color: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        position: relative !important;
    }

    html body::before,
    html body::after {
        content: '' !important;
        position: fixed !important;
        top: 0 !important;
        bottom: 0 !important;
        width: 5vw !important;
        pointer-events: none !important;
        z-index: 1000 !important;
    }

    html body::before {
        left: 0 !important;
        background: linear-gradient(to right, #000000 0%, #000000 60%, transparent 100%) !important;
    }

    html body::after {
        right: 0 !important;
        background: linear-gradient(to left, #000000 0%, #000000 60%, transparent 100%) !important;
    }

    html body .main-content,
    html body .site-main,
    html body main,
    html body .entry-content {
        background: #000080 !important;
        color: #ffffff !important;
        padding: 20px !important;
        margin: 0 !important;
        border-top: 2px solid #5555ff !important;
        border-left: 2px solid #5555ff !important;
        border-bottom: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
        border-radius: 0 !important;
        box-shadow: none !important;
    }

    html body .main-content *,
    html body .site-main *,
    html body article *,
    html body .entry-content *,
    html body .wp-block-paragraph,
    html body .wp-block-heading,
    html body p,
    html body h1, html body h2, html body h3 {
        color: #ffffff !important;
        background: transparent !important;
        font-family: 'Courier New', monospace !important;
    }

    html body .main-content a,
    html body .site-main a,
    html body article a,
    html body .entry-content a {
        color: #00ffff !important;
        text-decoration: underline !important;
    }

    html body .main-content h1,
    html body .main-content h2,
    html body .main-content h3,
    html body .entry-content h1,
    html body .entry-content h2,
    html body .entry-content h3,
    html body .wp-block-heading {
        color: #00ffff !important;
        text-transform: uppercase !important;
        border-bottom: 1px solid #00ffff !important;
        padding-bottom: 5px !important;
        margin: 15px 0 !important;
        background: transparent !important;
    }

    html body .main-navigation,
    html body nav {
        background: #000080 !important;
        padding: 10px !important;
        text-align: center !important;
        margin: 0 auto 20px auto !important;
        width: 90% !important;
        border-top: 2px solid #5555ff !important;
        border-left: 2px solid #5555ff !important;
        border-bottom: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
    }

    html body .main-navigation a,
    html body nav a {
        color: #ffffff !important;
        text-decoration: none !important;
        padding: 8px 15px !important;
        margin: 0 5px !important;
        display: inline-block !important;
        text-transform: uppercase !important;
        background: #000080 !important;
        border-top: 2px solid #5555ff !important;
        border-left: 2px solid #5555ff !important;
        border-bottom: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
    }

    html body .main-navigation a:hover,
    html body nav a:hover {
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-bottom: 2px solid #5555ff !important;
        border-right: 2px solid #5555ff !important;
    }

    html body .sidebar {
        background: #000080 !important;
        padding: 15px !important;
        border-top: 2px solid #5555ff !important;
        border-left: 2px solid #5555ff !important;
        border-bottom: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
    }

    html body .widget {
        margin-bottom: 20px !important;
        padding: 15px !important;
        background: #000080 !important;
        color: #ffffff !important;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-bottom: 2px solid #5555ff !important;
        border-right: 2px solid #5555ff !important;
    }

    html body .widget-title {
        color: #00ffff !important;
        font-size: 16px !important;
        margin-bottom: 10px !important;
        text-transform: uppercase !important;
        background: transparent !important;
    }

    html body .widget a {
        color: #ffffff !important;
        text-decoration: none !important;
    }

    html body .norton-box {
        background: #000080 !important;
        padding: 20px !important;
        margin: 20px 0 !important;
        color: #ffffff !important;
        border-top: 2px solid #5555ff !important;
        border-left: 2px solid #5555ff !important;
        border-bottom: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
    }

    html body .norton-box-invert {
        background: #000080 !important;
        padding: 20px !important;
        margin: 20px 0 !important;
        color: #ffffff !important;
        border-top: 2px solid #000000 !important;
        border-left: 2px solid #000000 !important;
        border-bottom: 2px solid #5555ff !important;
        border-right: 2px solid #5555ff !important;
    }

    html body .norton-alert {
        background: #000080 !important;
        padding: 15px !important;
        margin: 15px 0 !important;
        color: #ffffff !important;
        border-top: 2px solid #5555ff !important;
        border-left: 2px solid #5555ff !important;
        border-bottom: 2px solid #000000 !important;
        border-right: 2px solid #000000 !important;
    }

    html body footer,
    html body .site-footer {
        text-align: center !important;
        padding: 2px 0 !important;
        line-height: 1 !important;
        margin-top: 20px !important;
        background: #00ffff !important;
        color: #000000 !important;
        font-family: 'Courier New', monospace !important;
        font-weight: bold !important;
        position: relative !important;
        z-index: 10 !important;
    }

    html body footer *,
    html body .site-footer * {
        color: #000000 !important;
        background: transparent !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    html body .site-content {
        display: grid !important;
        grid-template-columns: 1fr 300px !important;
        gap: 20px !important;
        max-width: 1300px !important;
        margin: 0 auto !important;
        padding: 20px !important;
        background: transparent !important;
    }

    @media (max-width: 768px) {
        html body .site-content {
            grid-template-columns: 1fr !important;
        }
        html body .main-navigation,
        html body nav {
            width: 95% !important;
        }
        html body::before,
        html body::after {
            display: none !important;
        }
    }
    </style>
    <?php
}
add_action( 'wp_head', 'norton_nuclear_css', 999 );
