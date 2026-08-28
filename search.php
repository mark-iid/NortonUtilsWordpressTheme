<?php
/**
 * Norton Simple — Search Results
 *
 * Without this template search results fall through to index.php, which has
 * no heading, so a visitor gets a bare list with no confirmation of what was
 * searched for.
 *
 * @package Norton_Simple
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="site-content">
    <main class="main-content" id="main">
        <h1 class="archive-title">
            <?php
            printf(
                /* translators: %s: search query. */
                esc_html__( '[SEARCH] %s', 'norton-simple' ),
                esc_html( get_search_query() )
            );
            ?>
        </h1>

        <?php get_search_form(); ?>

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;

        the_posts_pagination( array(
            'mid_size'           => 2,
            'prev_text'          => esc_html__( '[&larr; PREV]', 'norton-simple' ),
            'next_text'          => esc_html__( '[NEXT &rarr;]', 'norton-simple' ),
            'screen_reader_text' => esc_html__( 'Search results navigation', 'norton-simple' ),
        ) );
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
