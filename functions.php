<?php 

add_action( 'wp_enqueue_scripts', 'pressite_wp_enqueue_scripts' );
function pressite_wp_enqueue_scripts() {

    // Enqueue main stylesheet
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
