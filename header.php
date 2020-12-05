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
    <!-- REMOVE AFTER DEVELOPING -->
    <style type="text/css">
        #tmp_view {
            background: #eee;
            border: 1px solid #ddd;
            color: #ccc;
            margin: 0 auto;
            padding: 5px;
            text-align: center;
            max-width: 1198px;
            min-width: 930px;
            width: 100%;
        }
    </style>
    <div id="tmp_view"><?php global $template; print_r($template); ?></div>
    <!-- /REMOVE AFTER DEVELOPING -->
	
	<!-- Page -->
    <div id="page" class="cs__site">
		<header id="header" class="cs__header" role="banner">
            <div class="cs__header__container cs__container">
                <div class="cs__header__toggle cs__col">
                    <button id="toggle" class="cs__toggle" type="button">
                        <i class="cs__toggle__stick"></i>
                    </button>
                </div>

                <div class="cs__header__logo cs__col">
                    <?php if ( !has_custom_logo() ) { ?>
                        <a class="cs__logo" href="<?php echo get_home_url(); ?>">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="" />
                        </a>
                    <?php } else { ?>
                        <?php the_custom_logo(); ?>
                    <?php } ?>
                </div>
                
                <div class="cs__header__menu cs__col">
                    <?php wp_nav_menu(array(
                        'container' => false,
                        'menu_class' => 'cs__main-menu',
                        'theme_location' => 'main-menu'
                    )); ?>
                </div>
            </div>
        </header>

		<!-- Container -->
		<main id="main" class="cs__main" role="main">