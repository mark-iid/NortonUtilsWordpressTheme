<?php get_header(); ?>

<div class="site-content">
    <main class="main-content" id="main" role="main">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>

        <?php
        the_posts_pagination( array(
            'mid_size'           => 2,
            'prev_text'          => esc_html__( '[&larr; PREV]', 'norton-simple' ),
            'next_text'          => esc_html__( '[NEXT &rarr;]', 'norton-simple' ),
            'screen_reader_text' => esc_html__( 'Posts navigation', 'norton-simple' ),
        ) );
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
