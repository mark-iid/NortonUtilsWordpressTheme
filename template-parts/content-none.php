<div class="norton-box">
    <?php if ( is_search() ) : ?>
        <h2>[SEARCH: NO RESULTS]</h2>
        <p>
            <?php
            printf(
                esc_html__( 'No results for &ldquo;%s&rdquo;. Try different keywords.', 'norton-simple' ),
                '<strong>' . esc_html( get_search_query() ) . '</strong>'
            );
            ?>
        </p>
    <?php else : ?>
        <h2>[NO CONTENT FOUND]</h2>
        <p><?php esc_html_e( 'Nothing to display here. Check back later.', 'norton-simple' ); ?></p>
    <?php endif; ?>
</div>
