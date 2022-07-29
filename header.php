<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Page -->
    <div id="page" class="site">
        <a href="#menu-main-menu" class="screen-reader-shortcut" aria-label="Skip to main menu">Skip to main menu</a>
        <a href="#main" class="screen-reader-shortcut" aria-label="Skip to main content">Skip to main content</a>
        <a href="#footer" class="screen-reader-shortcut" aria-label="Skip to footer content">Skip to footer content</a>

		<header id="header" class="header">
            <div class="header__container container">
                <div class="header__toggle col">
                    <button id="toggle" class="toggle" type="button">
                        <i class="toggle__stick" role="none"></i>
                        .
                    </button>
                </div>

                <div class="header__logo col">
                    <?php if ( !has_custom_logo() ){ ?>
                        <a class="logo" href="<?= get_home_url(); ?>" title="Go to Home page">
                            <img class="logo__image" src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>, logo" />
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
                        // 'walker' => new cs__header_menu_walker()
                    )); ?>
                </div>
            </div>
        </header>

		<!-- Container -->
		<main id="main" class="main">