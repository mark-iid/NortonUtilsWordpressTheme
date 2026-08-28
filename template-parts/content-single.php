<?php
/**
 * Norton Simple — Full content for a single post
 *
 * @package Norton_Simple
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %1$s: post title, for screen readers. */
                    __( '[CONTINUED &rarr;<span class="screen-reader-text"> "%1$s"</span>]', 'norton-simple' ),
                    array( 'span' => array( 'class' => array() ) )
                ),
                get_the_title()
            )
        );
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( '[PAGES]', 'norton-simple' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>

    <?php
    // Only loads comments.php when the post actually accepts or has comments.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
    ?>
</article>
