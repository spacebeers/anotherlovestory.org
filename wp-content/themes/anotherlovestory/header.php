<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css?bust=0.0.15">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="grid grid--container">
        <header class="site-header" id="header">
            <div class="logo">
                <div class="text--xs-center">
                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home' class="site-logo">
                        <img src='<?php echo esc_url( get_theme_mod( 'anotherlovestory_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                        <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>
                    </a>
                </div>
            </div>
            <div class="top-menu">
                <div class="grid">
                    <div class="row">
                        <div class="col">
                            <div id="mobile-menu">
                                <ul>
                                    <?php
                                        wp_nav_menu( array(
                                            'menu'              => 'main_menu',
                                            'theme_location'    => 'main_menu',
                                            'depth'             => 2,
                                            'container'         => false,
                                            'items_wrap' => '%3$s')
                                        );
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="content">
            <main id="main" class="site-main" role="main">