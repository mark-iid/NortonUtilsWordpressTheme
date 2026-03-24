<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __( '[CONTINUED &rarr; <span class="screen-reader-text">"%1$s"</span>]', 'norton-simple' ),
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
