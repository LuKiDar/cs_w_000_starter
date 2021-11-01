<?php
/**
 * Gutenberg blocks
 */

add_filter( 'block_categories', 'cs__register_block_categories', 10, 2);
function cs__register_block_categories($categories, $post){
	return array_merge(
		array(
			array(
				'slug' => 'custom-blocks',
				'title' => __('Custom blocks'),
			),
		),
		$categories
	);
}

if ( function_exists('acf_register_block_type') ){
    add_action('acf/init', 'cs__register_acf_block_types');
}

function cs__register_acf_block_types(){
    // Block / Tabs
    acf_register_block_type(array(
        'name'				=> 'block-tabs',
        'title'				=> __('Tabs'),
        'description'		=> __('A custom block for Tabs'),
        'render_template'	=> 'parts/block/tabs.php',
        'category'			=> 'vista-blocks',
        'icon'				=> 'excerpt-view',
        'keywords'			=> array('tabs', 'content'),
    ));
}