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
            </div>
        </div>
    </div>
</header>
<?php
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile; endif;

    get_footer();