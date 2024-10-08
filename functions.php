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
    wp_enqueue_script('script-01', get_template_directory_uri() . "/assets/js/script-01.js", [], true);
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
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_post_type('competences', [
        'labels' => [
            'name' => __('Competences'),
            'singular_name' => __('Competence'),
            'add_new' => __('Ajouter un nouveau'),
            'add_new_item' => __('Ajouter une nouvelle compétence'),
            'edit_item' => __('Modifier la compétence'),
            'new_item' => __('Nouveau compétence'),
            'view_item' => __('Voir la compétence'),
            'view_items' => __('Voir les compétences'),
            'search_items' => __('Rechercher des compétences'),
            'not_found' => __('Aucune compétence trouvée'),
            'not_found_in_trash' => __('Aucune compétence trouvée dans la corbeille'),
            'all_items' => __('Toutes les compétences'),
            'archives' => __('Archives des compétences'),
            'attributes' => __('Attributs des compétences'),
            'insert_into_item' => __('Insérer dans la compétence'),
            'uploaded_to_this_item' => __('Téléchargé dans ca compétence'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'competences'],
        'supports' => ['title', 'editor', 'thumbnail', 'order'],
        'show_in_rest' => true,
    ]);


    register_post_type('Activités', [
        'labels' => [
            'name' => __('Activités'),
            'singular_name' => __('Activité'),
            'add_new' => __('Ajouter un nouveau'),
            'add_new_item' => __('Ajouter une nouvelle activité'),
            'edit_item' => __('Modifier la activité'),
            'new_item' => __('Nouveau activité'),
            'view_item' => __('Voir la activité'),
            'view_items' => __('Voir les activités'),
            'search_items' => __('Rechercher des activités'),
            'not_found' => __('Aucune activité trouvée'),
            'not_found_in_trash' => __('Aucune activité trouvée dans la corbeille'),
            'all_items' => __('Toutes les activités'),
            'archives' => __('Archives des activités'),
            'attributes' => __('Attributs des activités'),
            'insert_into_item' => __('Insérer dans la activité'),
            'uploaded_to_this_item' => __('Téléchargé dans ca activité'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'Activites'],
        'supports' => ['title', 'editor', 'thumbnail', 'order'],
        'show_in_rest' => true,
    ]);
}


function perfect_portfolio_customize_register($wp_customize)
{
    $wp_customize->add_setting('user_name', [
        'default' => 'Herinjaka Tolotra',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_section('perfect_portfolio_section', [
        'title' => __('Informations du Portfolio', 'textdomain'),
        'priority' => 30,
    ]);

    $wp_customize->add_control('user_name_control', [
        'label' => __('Nom de l\'utilisateur', 'textdomain'),
        'section' => 'perfect_portfolio_section',
        'settings' => 'user_name',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('hero_image', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', [
        'label' => __('Image de la bannière', 'perfect_portfolio'),
        'section' => 'perfect_portfolio_section',
        'settings' => 'hero_image',
    ]));
}

add_action('after_setup_theme', 'magnific_portfolio_setup_theme');
add_action('wp_enqueue_scripts', 'magnific_portfolio_enqueue_scripts');
add_action('init', 'perfect_portfolio_custom_post_type');
add_action('customize_register', 'perfect_portfolio_customize_register');
