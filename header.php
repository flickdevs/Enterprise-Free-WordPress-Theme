<!DOCTYPE html>
<html>

<head>
    <title>Enterprise - Technology</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layout/plugins/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layout/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layout/js/plugins.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/layout/js/main.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class('theme_pink'); ?>>
<div class="wrapper">
    <!-- HEADER BEGIN -->
    <header>
        <div id="header">
            <section class="top">
                <div class="inner">
                    <div class="block_top_menu">
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => 'nav')); ?>
                    </div>

                    <?php get_search_form(); ?>

                    <div class="block_top_social">
                        <ul class="general_social_1">
                            <li><a href="#" class="social_1">Twitter</a></li>
                            <li><a href="#" class="social_2">Facebook</a></li>
                            <li><a href="#" class="social_3">Vimeo</a></li>
                            <li><a href="#" class="social_4">Pinterest</a></li>
                            <li><a href="#" class="social_5">Instagram</a></li>
                        </ul>
                    </div>

                    <div class="clearboth"></div>
                </div>
            </section>

            <section class="middle">
                <div class="inner">
                    <div id="logo_top"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_top.png" alt="Enterprise"
                                                                 title="Enterprise"></a></div>
                </div>
            </section>

            <section class="bottom">
                <div class="inner">
                    <div class="block_secondary_menu">
                        <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'container' => 'nav')); ?>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- CONTENT BEGIN -->
    <div id="content" class="sidebar_right">