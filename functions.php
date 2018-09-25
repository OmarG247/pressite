<?php 

add_action( 'wp_enqueue_scripts', 'pressite_wp_enqueue_scripts' );
function pressite_wp_enqueue_scripts() {

    // Enqueue stylesheets
    wp_enqueue_style( 'bs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri(), array ( 'bs' ) );

    // Enqueue scripts
    // TODO: Add integrity and crossorgin. Wordpress can not handle attributes on enqueued scripts.
    wp_enqueue_script( 'jq', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), null, true );
    wp_enqueue_script( 'pp', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array (), null, true);
    wp_enqueue_script( 'bs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array ( 'jq', 'pp' ), null, true);
}
