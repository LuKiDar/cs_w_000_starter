<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
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
    <div id="page" class="site">
		<header id="header" class="header">
            <div class="header__container container">
                <div class="header__toggle col">
                    <button id="toggle" class="toggle" type="button">
                        <i class="toggle__stick"></i>
                    </button>
                </div>

                <div class="header__logo col">
                    <?php if ( !has_custom_logo() ) { ?>
                        <a class="logo" href="<?= get_home_url(); ?>">
                            <img class="logo__image" src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="" />
                        </a>
                    <?php } else { ?>
                        <?php the_custom_logo(); ?>
                    <?php } ?>
                </div>
                
                <div class="header__menu col">
                    <?php wp_nav_menu(array(
                        'container' => false,
                        'menu_class' => 'main-menu',
                        'theme_location' => 'main-menu'
                    )); ?>
                </div>
            </div>
        </header>

		<!-- Container -->
		<main id="main" class="main">