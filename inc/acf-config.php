<?php
/*** ACF: hide menu item ***/
//add_filter('acf/settings/show_admin', '__return_false');


/*** ACF: Options page ***/
if( function_exists('acf_add_options_page') ) :
    acf_add_options_page(
        array(
            'page_title'    => __('Theme Settings', CSWP),
            'menu_title'    => __('Theme Settings', CSWP),
            'menu_slug'     => 'theme-settings',
            'capability'    => 'edit_posts',
            'redirect'      => true,
            'position'      => '59',
        )
    );
endif;
