<?php
function site_scripts() {
    global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_stylesheet_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), get_stylesheet_directory_uri() . '/assets/scripts/js', true );

    wp_localize_script('site-js', 'BENJOCPT_OPTIONS', array(
      'controlNav'=> get_stylesheet_directory_uri()
    ));     
    wp_enqueue_script( 'vendros-owlcarousel-js', get_stylesheet_directory_uri() . '/assets/scripts/vendors/owl.carousel.min.js', array('jquery'), "1.0.0 ", true);
    wp_enqueue_script( 'vendros-bootstrap-js', get_stylesheet_directory_uri() . '/assets/scripts/vendors/bootstrap.js', array('jquery'), "1.0.0 ", true);

    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/assets/styles/style.css');
    wp_enqueue_style( 'vendor-bootstrap-css', get_stylesheet_directory_uri() . '/assets/styles/vendors/bootstrap.css');
    wp_enqueue_style( 'vendor-main-owl-carousel-css', get_stylesheet_directory_uri() . '/assets/styles/vendors/owl.carousel.min.css');
    wp_enqueue_style( 'vendor-owl-carousel-css', get_stylesheet_directory_uri() . '/assets/styles/vendors/owl.theme.default.min.css');
    wp_enqueue_style( 'vendor-font-awesome-css', get_stylesheet_directory_uri() . '/assets/styles/vendors/font-awesome.min.css');
    wp_enqueue_style( 'vendor-responsive-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css');

}
add_action('wp_enqueue_scripts', 'site_scripts', 999);