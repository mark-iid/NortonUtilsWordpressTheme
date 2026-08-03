<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <h1 class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
    </h1>
    <?php $description = get_bloginfo( 'description' ); if ( $description ) : ?>
        <p class="site-description"><?php echo esc_html( $description ); ?></p>
    <?php endif; ?>
</header>

<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'norton-simple' ); ?>">
    <?php
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Norton_Simple_Walker_Nav_Menu(),
        ) );
    } else {
        // No menu is assigned to the "primary" location. Switching themes drops
        // that assignment — the menu itself still exists under Appearance → Menus.
        // Until one is assigned, fall back to HOME plus every top-level page.
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'HOME', 'norton-simple' ); ?></a>
        <?php
        $norton_fallback_pages = get_pages( array(
            'parent'      => 0,
            'sort_column' => 'menu_order,post_title',
        ) );
        foreach ( $norton_fallback_pages as $norton_fallback_page ) {
            printf(
                '<a href="%1$s">%2$s</a>',
                esc_url( get_permalink( $norton_fallback_page->ID ) ),
                esc_html( get_the_title( $norton_fallback_page->ID ) )
            );
        }
    }
    ?>
</nav>
