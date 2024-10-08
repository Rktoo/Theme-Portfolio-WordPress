<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <!-- Inclusion des styles et script dans le head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="w-full border-b  bg-gradient-to-r from-blue-500 to-teal-500 text-white">
        <div class="fixed top-0 left-0 h-1 w-full bg-gradient-to-tr from-blue-500 to-teal-500" id="progress-bar"></div>
        <div class="max-w-6xl mx-auto px-2 md:px-10 parent_">
            <h2 id="logo"><?php bloginfo('name'); ?></h2>
            <nav>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',

                ]);
                ?>
            </nav>
        </div>
    </header>

    <main class="w-full">