<?php get_header(); ?>

<div class="site-content">
    <main class="main-content" id="main" role="main">
        <h1 class="archive-title">
            <?php
            if ( is_category() ) {
                echo '[CAT] ';
                single_cat_title();
            } elseif ( is_tag() ) {
                echo '[TAG] ';
                single_tag_title();
            } elseif ( is_author() ) {
                echo '[AUTHOR] ' . esc_html( get_the_author() );
            } elseif ( is_year() ) {
                echo '[YEAR] ' . esc_html( get_the_date( 'Y' ) );
            } elseif ( is_month() ) {
                echo '[MONTH] ' . esc_html( get_the_date( 'F Y' ) );
            } else {
                esc_html_e( '[ARCHIVE]', 'norton-simple' );
            }
            ?>
        </h1>

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
