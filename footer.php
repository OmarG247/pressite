    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-left">
                <?php if ( is_active_sidebar( 'pressite_footer_bottom' ) ) : ?>
                        <div id="pressite-footer-bottom-sidebar" class="pressite-footer-bottom-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'pressite_footer_bottom' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>