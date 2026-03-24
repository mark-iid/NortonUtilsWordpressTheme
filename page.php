<?php get_header(); ?>

<div class="site-content">
    <main class="main-content" id="main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'page' );
        endwhile;
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
