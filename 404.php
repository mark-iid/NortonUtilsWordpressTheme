<?php get_header(); ?>

<div class="site-content">
    <main class="main-content" id="main" role="main">
        <div class="norton-box">
            <h1>[ERROR 404] FILE NOT FOUND</h1>
            <p><?php esc_html_e( 'The page you requested does not exist or has been moved.', 'norton-simple' ); ?></p>
            <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '[RETURN TO HOME]', 'norton-simple' ); ?></a></p>
        </div>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
