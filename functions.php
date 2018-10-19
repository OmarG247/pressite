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

    // Link colors
    $wp_customize->add_setting( 'link_color', array(
        'default'   => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'section' => 'colors',
    'label'   => __( 'Link color', 'pressite' ),
    ) ) );

    $wp_customize->add_setting( 'link_hover_color', array(
    'default'   => '#0056b3',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
    'section' => 'colors',
    'label'   => __( 'Link hover color', 'pressite' ),
    'description' => esc_html__( __('* This color will also apply to active and focused links.') )
    ) ) );

      // Footer colors
    $wp_customize->add_setting( 'footer_bg_color', array( 
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color' 
    ) );
  
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
        'section' => 'colors',
        'label'   => __( 'Footer background color', 'pressite' )
    ) ) );

    $wp_customize->add_setting( 'footer_text_color', array( 
        'default'           => '#212529',
        'sanitize_callback' => 'sanitize_hex_color' 
    ) );
  
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
        'section' => 'colors',
        'label'   => __( 'Footer text color', 'pressite' )
    ) ) );
 }
 
 function pressite_get_customizer_css() {
    ob_start();

    $text_color = get_theme_mod( 'text_color', '' );
    if ( ! empty( $text_color ) ) { ?>
body { color: <?php echo sanitize_hex_color($text_color); ?>; }<?php
    }

    $link_color = get_theme_mod( 'link_color', '' );
    if ( ! empty( $link_color ) ) { ?>
a { color: <?php echo sanitize_hex_color($link_color); ?>;}<?php
    }

    $link_hover_color = get_theme_mod( 'link_hover_color', '' );
    if ( ! empty( $link_hover_color ) ) { ?>
a:hover, a:active, a:focus { color: <?php echo sanitize_hex_color($link_hover_color); ?>;}<?php
    }

    $footer_bg_color = get_theme_mod( 'footer_bg_color', '' );
    if ( ! empty( $footer_bg_color ) ) { ?>
footer { background-color: <?php echo sanitize_hex_color($footer_bg_color); ?>; }<?php
    }

    $footer_text_color = get_theme_mod( 'footer_text_color', '' );
    if ( ! empty( $footer_text_color ) ) { ?>
footer { color: <?php echo sanitize_hex_color($footer_text_color); ?>; }<?php
    }

    $css = ob_get_clean();

    return $css;
  }

  add_action( 'widgets_init', 'pressite_widgets_init' );
  function pressite_widgets_init() {

    // Register sidebars
    register_sidebar( array(
      'name'          => __('Landing hero content', 'pressite'),
      'id'            => 'pressite_landing_hero_content',
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
      ) );

      register_sidebar( array(
      'name'          => __('Footer bottom', 'pressite'),
      'id'            => 'pressite_footer_bottom',
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
      'before_title'  => '<h6>',
      'after_title'   => '</h6>',
    ) );
}
