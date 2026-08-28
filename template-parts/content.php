<?php
/**
 * Norton Simple — Post summary for lists and archives
 *
 * @package Norton_Simple
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="entry-title">
        <?php if ( is_singular() ) : ?>
            <?php the_title(); ?>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php endif; ?>
    </h2>

    <div class="entry-summary">
        <?php
        // get_the_excerpt() strips any non-core blocks (including our norton/*
        // blocks) before trimming, so a post whose intro lives inside a Norton
        // Box yields an empty excerpt. Fall back to rendering the full content
        // and trimming that so those posts still get a snippet.
        $norton_excerpt = trim( get_the_excerpt() );
        if ( '' === $norton_excerpt ) {
            $norton_excerpt = wp_trim_words(
                wp_strip_all_tags( strip_shortcodes( do_blocks( get_the_content() ) ) ),
                55,
                '&hellip;'
            );
        }
        if ( '' !== trim( $norton_excerpt ) ) :
            ?>
            <p><?php echo esc_html( $norton_excerpt ); ?></p>
            <?php
        endif;
        ?>
        <p class="read-more">
            <a href="<?php the_permalink(); ?>">
                <?php
                printf(
                    wp_kses(
                        /* translators: %1$s: post title, for screen readers. */
                        __( '[READ MORE<span class="screen-reader-text"> "%1$s"</span>]', 'norton-simple' ),
                        array( 'span' => array( 'class' => array() ) )
                    ),
                    esc_html( get_the_title() )
                );
                ?>
            </a>
        </p>
    </div>
</article>
