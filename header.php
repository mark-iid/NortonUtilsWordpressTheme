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
        // Fallback nav — replace with your actual pages or set up a menu in WP Admin.
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'HOME', 'norton-simple' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'BLOG', 'norton-simple' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/resume/' ) ); ?>"><?php esc_html_e( 'RESUME', 'norton-simple' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/professional-history/' ) ); ?>"><?php esc_html_e( 'PROFESSIONAL HISTORY', 'norton-simple' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/music/' ) ); ?>"><?php esc_html_e( 'MUSIC', 'norton-simple' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/radio/' ) ); ?>"><?php esc_html_e( 'RADIO', 'norton-simple' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/programming/' ) ); ?>"><?php esc_html_e( 'PROGRAMMING', 'norton-simple' ); ?></a>
        <?php
    }
    ?>
</nav>
