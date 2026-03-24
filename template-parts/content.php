<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="entry-title">
        <?php if ( is_singular() ) : ?>
            <?php the_title(); ?>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php endif; ?>
    </h2>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __( '[READ MORE <span class="screen-reader-text">"%1$s"</span>]', 'norton-simple' ),
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
</article>
