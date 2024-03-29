<?php
/**
 * Admin
 */

/*** Admin menu ***/
function cs__custom_menu_order( $menu_ord ){
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        //'edit.php?post_type=product', // Products
        'edit.php', // Posts
        'upload.php', // Media
        'wpcf7', // Contact
        //'theme-settings', // ACF: Theme Settings
        'acf-options-general', // ACF: Theme Settings
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'edit.php?post_type=acf-field-group', // ACF
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'cs__custom_menu_order', 10, 1);
add_filter('menu_order', 'cs__custom_menu_order', 10, 1);


/*** Disable content editor for specific pages ***/
add_action('init', 'cs__hide_editor_for_pages');
function cs__hide_editor_for_pages(){
    if ( is_admin() ){
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        if ( !isset($post_id) ) return;
    
        $template_file = get_post_meta($post_id, '_wp_page_template', true);

        $templates_array = array(
            'templates/tmpl-contacts.php',
        );
        
        if ( in_array($template_file, $templates_array) || $post_id==get_option('page_on_front') ){
            remove_post_type_support('page', 'editor');
        }
    }
}


/*** TinyMCE: add style selector ***/
add_filter('mce_buttons_2', 'cs__mce_add_more_buttons');
function cs__mce_add_more_buttons( $buttons ){
	$buttons[] = 'styleselect';
	return $buttons;
}
 
add_filter('tiny_mce_before_init', 'cs__mce_before_init');
function cs__mce_before_init( $settings ){
    $textcolor_map = array(
        '000', 'Black',
        '595959', 'Dark gray',
        '919191', 'Medium gray',
        'F5F5F5', 'Light gray',
        'FFF', 'White',
    );
    // $style_formats = array(
    //     array(
    //         'title' => 'Buttons',
    //         'items' => array(
    //             [
    //                 'title' => 'Default button',
    //                 'selector' => 'a',
    //                 'classes' => 'button--fill'
    //             ],
    //             [
    //                 'title' => 'Outlined button',
    //                 'selector' => 'a',
    //                 'classes' => 'button--outline'
    //             ],
    //             [
    //                 'title' => 'White button',
    //                 'selector' => 'a',
    //                 'classes' => 'button--fill-white'
    //             ],
    //         )
    //     )
    // );
    $settings['textcolor_cols'] = 6;
    $settings['textcolor_map'] = json_encode($textcolor_map);
    // $settings['style_formats'] = json_encode($style_formats);
    return $settings;
}


/*** TinyMCE: remove the Color Picker plugin ***/
add_filter('tiny_mce_plugins', 'cs__mce_remove_custom_colors');
function cs__mce_remove_custom_colors( $plugins ){
    foreach ( $plugins as $key=>$plugin_name ){
        if ( $plugin_name==='colorpicker' ){
            unset($plugins[$key]);
            return $plugins;            
        }
    }
    return $plugins;
}