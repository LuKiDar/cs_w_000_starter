<?php
/*** Gutenberg / Allow wide alignment ***/
add_theme_support('align-wide');

/*** Gutenberg / Change color pallete ***/
add_theme_support('disable-custom-colors');
add_theme_support('editor-gradient-presets', []);
add_theme_support('disable-custom-gradients');
$colors = [
    'Black' => '#000',
    'Dark gray' => '#595959',
    'Medium gray' => '#919191',
    'Light gray' => '#F5F5F5',
    'White' => '#FFF',
];
$editor_color_palette = [];
foreach ( $colors as $name=>$value ){
    $editor_color_palette[] = [
        'name'  => esc_html__($name, CSWP),
        'slug'  => str_replace(' ', '-', strtolower($name)),
        'color' => $value,
    ];
}
add_theme_support('editor-color-palette', $editor_color_palette);


/*** Gutenberg / Register custom blocks ***/

add_filter('block_categories_all', 'cs__register_block_categories', 10, 2);
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
        'category'			=> 'custom-blocks',
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
        'category'			=> 'custom-blocks',
        'icon'				=> 'excerpt-view',
        'keywords'			=> array('tabs', 'content'),
    ));
}