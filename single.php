<?php get_header(); ?>

<div class="site-content">
    <main class="main-content" id="main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'single' );
        endwhile;

        the_post_navigation( array(
            'prev_text' => esc_html__( '[&larr; %title]', 'norton-simple' ),
            'next_text' => esc_html__( '[%title &rarr;]', 'norton-simple' ),
        ) );
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
