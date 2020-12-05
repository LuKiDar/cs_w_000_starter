<?php
/**
 * Admin
 */

/*** Admin menu ***/
function cs__custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        //'edit.php?post_type=product', // Products
        'edit.php', // Posts
        'upload.php', // Media
        'theme-settings', // ACF: Theme Settings
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
add_filter( 'custom_menu_order', 'cs__custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'cs__custom_menu_order', 10, 1 );



/*** Disable content editor for specific pages ***/
add_action( 'init', 'cs__hide_editor_for_pages' );
function cs__hide_editor_for_pages() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;
 
    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    $templates_array = array(
        'templates/tmpl-contacts.php',
    );
    
    // To disable for all pages: get_post_type($post_id)==='page'
    if ( in_array($template_file, $templates_array) || $post_id==get_option('page_on_front') ){
        remove_post_type_support('page', 'editor');
    }
}