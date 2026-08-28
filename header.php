<?php
/**
 * Norton Simple — Header
 *
 * @package Norton_Simple
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'norton-simple' ); ?></a>

<header class="site-header">
    <?php
    // The site name is the document's h1 only on the front page; elsewhere the
    // entry title owns that level.
    $norton_title_tag = ( is_front_page() && is_home() ) ? 'h1' : 'p';
    printf(
        '<%1$s class="site-title"><a href="%2$s" rel="home">%3$s</a></%1$s>',
        esc_html( $norton_title_tag ),
        esc_url( home_url( '/' ) ),
        esc_html( get_bloginfo( 'name' ) )
    );
    ?>
    <?php $norton_description = get_bloginfo( 'description', 'display' ); ?>
    <?php if ( $norton_description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo esc_html( $norton_description ); ?></p>
    <?php endif; ?>
</header>

<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'norton-simple' ); ?>">
    <?php
    /*
     * Core's Walker_Nav_Menu already emits aria-current on the current item,
     * the menu item classes, and target/rel/title attributes, and it handles
     * submenus. The DOS menu-strip look comes from CSS, not from stripping
     * the list markup.
     */
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'nav-menu',
        'menu_id'        => 'primary-menu',
        'depth'          => 2,
        'fallback_cb'    => 'norton_simple_menu_fallback',
    ) );
    ?>
</nav>
