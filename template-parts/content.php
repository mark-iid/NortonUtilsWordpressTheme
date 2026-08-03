<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="entry-title">
        <?php if ( is_singular() ) : ?>
            <?php the_title(); ?>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php endif; ?>
    </h2>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
        <p class="read-more">
            <a href="<?php the_permalink(); ?>">
                <?php
                printf(
                    wp_kses(
                        __( '[READ MORE <span class="screen-reader-text">"%1$s"</span>]', 'norton-simple' ),
                        array( 'span' => array( 'class' => array() ) )
                    ),
                    esc_html( get_the_title() )
                );
                ?>
            </a>
        </p>
    </div>
</article>
