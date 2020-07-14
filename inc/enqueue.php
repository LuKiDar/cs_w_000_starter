<?php

// Load scripts
add_action('wp_enqueue_scripts', 'cs__header_scripts'); // Add Custom Scripts
function cs__header_scripts(){
    if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ){
        wp_register_script('themescripts', get_template_directory_uri() . '/assets/js/build/main.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/build/main.js'), true); // Custom scripts
        wp_enqueue_script('themescripts');
    }
}


// Load styles
add_action('wp_enqueue_scripts', 'cs__styles'); // Add Theme Stylesheet
function cs__styles(){
    wp_register_style('themestyle', get_template_directory_uri() . '/assets/css/build/main.css', array(), filemtime(get_template_directory() . '/assets/css/build/main.css'), 'all');
    wp_enqueue_style('themestyle');
}


// Load extra Admin styling
add_action('admin_enqueue_scripts', 'cs__admin_styles');
function cs__admin_styles(){
    wp_register_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css', array(), filemtime(get_template_directory() . '/assets/css/admin.css'), 'all');
    wp_enqueue_style('admin-styles');
}


// Disable default WooCommerce stylesheets
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );