<?php

// Load scripts
add_action('wp_enqueue_scripts', 'cswp_header_scripts'); // Add Custom Scripts
function cswp_header_scripts(){
    if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ){
        wp_register_script('themescripts', get_template_directory_uri() . '/assets/js/build/main.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/build/main.js'), true); // Custom scripts
        wp_enqueue_script('themescripts');
    }
}


// Load styles
add_action('wp_enqueue_scripts', 'cswp_styles'); // Add Theme Stylesheet
function cswp_styles(){
    wp_register_style('themestyle', get_template_directory_uri() . '/assets/css/build/main.css', array(), filemtime(get_template_directory() . '/assets/css/build/main.css'), 'all');
    wp_enqueue_style('themestyle');
}


// Load extra Admin styling
add_action('admin_enqueue_scripts', 'cswp_admin_styles');
function cswp_admin_styles(){
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}