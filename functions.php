<?php

function magnific_portfolio_setup_theme()
{
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
    add_theme_support('menus');
    register_nav_menus([
        'menu' => 'principal'
    ]);
}
function magnific_portfolio_enqueue_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . "/assets/css/output.css");
    wp_enqueue_style('otherstyle', get_template_directory_uri() . "/assets/css/other.css");
}


function perfect_portfolio_custom_post_type()
{
    register_post_type('projets', [
        'labels' => [
            'name' => __('Projets'),
            'singular_name' => __('Projet'),
            'add_new' => __('Ajouter un nouveau'),
            'add_new_item' => __('Ajouter un nouveau projet'),
            'edit_item' => __('Modifier le projet'),
            'new_item' => __('Nouveau projet'),
            'view_item' => __('Voir le projet'),
            'view_items' => __('Voir les projets'),
            'search_items' => __('Rechercher des projets'),
            'not_found' => __('Aucun projet trouvé'),
            'not_found_in_trash' => __('Aucun projet trouvé dans la corbeille'),
            'all_items' => __('Tous les projets'),
            'archives' => __('Archives des projets'),
            'attributes' => __('Attributs des projets'),
            'insert_into_item' => __('Insérer dans le projet'),
            'uploaded_to_this_item' => __('Téléchargé dans ce projet'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'projets'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}

function magnific_portfolio_add_menu_classes($classes, $item, $args)
{
    // Ajoute une classe spécifique à chaque élément du menu
    $classes[] = 'px-4 py-2'; // Exemples de classes Tailwind CSS
    return $classes;
}


add_action('after_setup_theme', 'magnific_portfolio_setup_theme');
add_action('wp_enqueue_scripts', 'magnific_portfolio_enqueue_scripts');
add_action('init', 'perfect_portfolio_custom_post_type');
add_filter('nav_menu_css_class', 'magnific_portfolio_add_menu_classes', 10, 3);
