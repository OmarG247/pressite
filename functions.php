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

    // Enqueue theme customized style
    wp_add_inline_style( 'style', pressite_get_customizer_css() );
}

add_action( 'after_setup_theme', 'pressite_after_setup_theme' );
function pressite_after_setup_theme() {
    
    // Add support for core-supported features
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-background', array( 'default-color' => '#ffffff' ) );
}

add_action( 'customize_register', 'pressite_customize_register' );
function pressite_customize_register( $wp_customize ) {
    
    // Text color
    $wp_customize->add_setting( 'text_color', array( 
        'default'           => '#212529',
        'sanitize_callback' => 'sanitize_hex_color' 
    ) );
  
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
        'section' => 'colors',
        'label'   => __( 'Text color', 'pressite' )
    ) ) );
 }
 
 function pressite_get_customizer_css() {
    ob_start();

    $text_color = get_theme_mod( 'text_color', '' );
    if ( ! empty( $text_color ) ) {
    ?>
body { color: <?php echo sanitize_hex_color($text_color); ?>; }<?php
    }

    $css = ob_get_clean();

    return $css;
  }