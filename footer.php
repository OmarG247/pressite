    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-md-left text-sm-right">
                    <?php if ( is_active_sidebar( 'pressite_footer_left' ) ) : ?>
                        <div id="pressite-footer-left-sidebar" class="pressite-footer-left-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'pressite_footer_left' ); ?>
                        </div>
                    <?php endif; ?>    
                </div>
                <div class="col-md-6 col-sm-12 text-md-right text-sm-left">
                    <?php if ( is_active_sidebar( 'pressite_footer_right' ) ) : ?>
                        <div id="pressite-footer-right-sidebar" class="pressite-footer-right-sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'pressite_footer_right' ); ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
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