<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( '[PAGES]', 'norton-simple' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>
</article>
