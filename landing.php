<?php 
    /* Template Name: Landing page */

    get_header();
?>
<header class="h-100">
    <div class="jumbotron jumbotron-fluid h-100 ps-bg-transparent">
        <div class="container h-100 d-flex align-items-center">
            <div>
                <h1 class="display-4"><?php echo get_bloginfo( 'name'); ?></h1>
                <p class="lead"><?php echo get_bloginfo( 'description'); ?></p>
                <hr class="my-4">
                <?php if ( is_active_sidebar( 'pressite_landing_hero_content' ) ) : ?>
                    <div id="pressite-landing-hero-content-sidebar" class="pressite-landing-hero-content-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'pressite_landing_hero_content' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<?php
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile; endif;

    get_footer();