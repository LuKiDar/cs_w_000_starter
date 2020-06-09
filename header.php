<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
	
	<!-- Load Fonts -->
	<!--<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700&display=swap" rel="stylesheet">-->
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Page -->
    <div id="page" class="cs__site">
		<header id="header-wrapper" class="cs__header" role="banner">
            <div class="row">
                <div class="column">
                    <button class="cs__header__navbar-toggle" type="button">
                        <i></i>
                        <i></i>
                        <i></i>
                    </button>
                </div>
                <div class="column">
                    <a class="cs__header__branding" href="<?php echo get_home_url(); ?>">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="" />
                    </a>
                </div>
                <div class="column">
                    <?php wp_nav_menu(array(
                        'container' => false,
                        'menu_class' => 'cs__main-menu',
                        'theme_location' => 'main-menu'
                    )); ?>
                </div>
            </div>
        </header>

		<!-- Container -->
		<main id="main" class="cs__page-wrap" role="main">