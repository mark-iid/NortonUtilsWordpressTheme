<?php
/**
 * Norton Simple — Theme Setup
 *
 * Theme support declarations, script/style enqueue, sidebar registration and
 * the custom flat nav walker.
 *
 * Visual design lives in theme.json (colours, typography, spacing, layout)
 * and assets/css/. Nothing here should be injecting inline CSS.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme feature declarations and sidebar registration.
 */
function norton_simple_setup() {
	load_theme_textdomain( 'norton-simple', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
		'navigation-widgets',
	) );

	/*
	 * WordPress 7.0 stopped passing classic themes any post-editor styling,
	 * so the canvas is whatever we put in it. theme.json handles colour and
	 * type; these two files carry the component chrome and the editor-only
	 * adjustments.
	 */
	add_theme_support( 'editor-styles' );
	add_editor_style( array(
		'assets/css/norton-components.css',
		'assets/css/editor-style.css',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'norton-simple' ),
	) );
}
add_action( 'after_setup_theme', 'norton_simple_setup' );

/**
 * Sidebar registration.
 */
function norton_simple_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'norton-simple' ),
		'id'            => 'primary-sidebar',
		'description'   => __( 'Widgets in this area appear in the right sidebar.', 'norton-simple' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'norton_simple_widgets_init' );

/**
 * Enqueue front-end styles.
 *
 * style.css carries only the theme header. norton-components.css holds the
 * design tokens and the box/alert/table chrome shared with the editor;
 * norton.css layers the front-end-only layout on top and depends on it for
 * the custom properties.
 */
function norton_simple_scripts() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'norton-components',
		get_template_directory_uri() . '/assets/css/norton-components.css',
		array(),
		$version
	);

	wp_enqueue_style(
		'norton-style',
		get_template_directory_uri() . '/assets/css/norton.css',
		array( 'norton-components' ),
		$version
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
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
