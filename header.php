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
        <div class="fixed top-0 left-0 h-1 w-full bg-gradient-to-tr from-slate-300 to-slate-700" id="progress-bar"></div>
        <div class="max-w-6xl mx-auto px-10">
            <h2><?php bloginfo('name'); ?></h2>
            <nav>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class' => 'max-w-6xl mx-auto px-10',
                    'container' => false, // Supprime le conteneur par défaut
                    'items_wrap' => '<ul class=" flex flex-row justify-between items-center">%3$s</ul>', // Applique les classes ici
                ]);
                ?>
            </nav>
        </div>
    </header>

    <main class="w-full">