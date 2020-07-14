<?php
define('CSWP', 'cswp', true);

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if ( function_exists('add_theme_support') ){
    // Add Menu support
    add_theme_support('menus');
    add_theme_support('title-tag');

    // Add Thumbnail Theme support
    add_theme_support('post-thumbnails');
    //add_image_size('3200xAUTO', 3200, '', false);
    //add_image_size('2560xAUTO', 2560, '', false);
    //add_image_size('1920xAUTO', 1920, '', false);
    //add_image_size('1024xAUTO', 1024, '', false);
    
    //add_image_size('1600xAUTO', 1600, '', false);
    //add_image_size('1280xAUTO', 1280, '', false);
    //add_image_size('960xAUTO',  960,  '', false);
    //add_image_size('512xAUTO',  512,  '', false);

    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    // Add Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => '200',
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add WooCommerce support
    //add_theme_support( 'woocommerce' );
}

add_filter('upload_mimes', 'cs__mime_types');
function cs__mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

// Register Navigation
register_nav_menus(array(
    'main-menu' => __('Main Menu', CSWP)
));


/*** Disable emoji ***/
add_action( 'init', 'cs__disable_wp_emojicons' );
function cs__disable_wp_emojicons() {
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'cs__disable_emojicons_tinymce' );
}

function cs__disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
/*** END Disable emoji ***/


/*** Disable comments ***/
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});
/*** END Disable comments ***/



/*------------------------------------*\
	Functions
\*------------------------------------*/

/*** Wordpress get image (post thumbnauil) URL by id
   * $cur_id -- post id (gets its thumbnail id) or image id
   * $post_check -- set true, if it's post id
   * $size -- size of image to get
 ***/
function cs__get_image_url($cur_id, $post_check, $size) {
    if($post_check == true) { $cur_id = get_post_thumbnail_id($cur_id); }    
    $image_url = wp_get_attachment_image_src($cur_id, $size);
    return $image_url;
}


/*** Custom srcset for background image ***/
function cs__get_bg_srcset($image, $post_check, $viewWidth='full') {
    $result_image = 'bg-srcset="';
    if ( is_array($image)==true && $post_check==false ){
        
        if ( $viewWidth=='full' ){
            $result_image.= $image['url'] .' '. $image['width'] .'w, '. $image['sizes']['3200xAUTO'] .' 3200w, '. $image['sizes']['2560xAUTO'] .' 2560w, '. $image['sizes']['1920xAUTO'] .' 1920w, '. $image['sizes']['1024xAUTO'] .' 1024w';
        }else if ( $viewWidth=='half' ){
            $result_image.= $image['url'] .' '. $image['width']*2 .'w, '. $image['sizes']['1600xAUTO'] .' 3200w, '. $image['sizes']['1280xAUTO'] .' 2560w, '. $image['sizes']['960xAUTO'] .' 1920w, '. $image['sizes']['512xAUTO'] .' 1024w';
        }
        
    }else if ( is_numeric($image)==true && $post_check==true ){
        
        $cur_id = get_post_thumbnail_id($image);
        $full_image = wp_get_attachment_image_src($cur_id, 'full');
        
        if ( $viewWidth=='full' ){
            $result_image.= $full_image[0] .' '. $full_image[1] .'w, '. wp_get_attachment_image_src($cur_id, '3200xAUTO')[0] .' 3200w, '. wp_get_attachment_image_src($cur_id, '2560xAUTO')[0] .' 2560w, '. wp_get_attachment_image_src($cur_id, '1920xAUTO')[0] .' 1920w, '. wp_get_attachment_image_src($cur_id, '1024xAUTO')[0] .' 1024w';
        }else if ( $viewWidth=='half' ){
            $result_image.= $full_image[0] .' '. $full_image[1] .'w, '. wp_get_attachment_image_src($cur_id, '1600xAUTO')[0] .' 3200w, '. wp_get_attachment_image_src($cur_id, '1280xAUTO')[0] .' 2560w, '. wp_get_attachment_image_src($cur_id, '960xAUTO')[0] .' 1920w, '. wp_get_attachment_image_src($cur_id, '512xAUTO')[0] .' 1024w';
        }
        
    }
    
    $result_image .= '"';
    
    return $result_image;
}



/*------------------------------------*\
	Actions + Filters
\*------------------------------------*/

/*** Add Actions ***/

/*** Remove Actions ***/
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/*** Add Filters ***/
// add_filter('acf/settings/show_admin', '__return_false');//  Hide ACF field group menu item
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_length', function(){ return 30; }); // Change Excerpt length
add_filter('excerpt_more', function($more){ return '...'; }); // Change Excerpt "read more" string
add_filter('get_custom_logo', function( $html ){ // Change custom logo class
	return str_replace('custom-logo-link', 'cs__branding', $html );
});

/*** Remove Filters ***/
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether




// Enqueue assets
include 'inc/enqueue.php';

// Create custom post types and taxonomies
include_once 'inc/post-types.php';

// ACF Settings
include_once 'inc/acf-config.php';

// Admin
include_once 'inc/admin.php';