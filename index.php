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
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
