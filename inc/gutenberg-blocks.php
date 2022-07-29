<?php
/**
 * Gutenberg blocks
 */

add_filter('block_categories', 'cs__register_block_categories', 10, 2);
function cs__register_block_categories( $categories, $post ){
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
    // Block / Hero
    acf_register_block_type(array(
        'name'				=> 'block-hero',
        'title'				=> __('Hero'),
        'description'		=> __('A custom Hero block'),
        'render_template'	=> 'parts/block/hero.php',
        'category'			=> 'dh-blocks',
        'icon'				=> 'cover-image',
        'keywords'			=> array('hero', 'content'),
        'mode'              => 'auto',
        'supports'          => array(
            'multiple' => false,
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'image' => array(
                        'alt' => '',
                        'sizes' => array(
                            'large' => 'https://s.w.org/images/core/5.3/MtBlanc1.jpg',
                            '1536x1536' => 'https://s.w.org/images/core/5.3/MtBlanc1.jpg',
                            '2048x2048' => 'https://s.w.org/images/core/5.3/MtBlanc1.jpg',
                        )
                    ),
                    'title' => 'Lorem ipsum dolor sit amet',
                )
            )
        )
    ));
    
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