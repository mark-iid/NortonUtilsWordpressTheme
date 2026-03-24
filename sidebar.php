<aside class="sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Primary Sidebar', 'norton-simple' ); ?>">
    <?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'primary-sidebar' ); ?>
    <?php else : ?>
        <div class="widget">
            <h3 class="widget-title">[SIDEBAR]</h3>
            <p><?php esc_html_e( 'Add widgets via Appearance &rarr; Widgets.', 'norton-simple' ); ?></p>
        </div>
    <?php endif; ?>
</aside>
