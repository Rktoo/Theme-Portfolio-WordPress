<?php

// ===== Setup du thème
function magnific_portfolio_setup_theme()
{
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
    add_theme_support('menus');
    register_nav_menus([
        'menu' => 'principal'
    ]);
}

// ===== Ajout des scripts
function magnific_portfolio_enqueue_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . "/assets/css/output.css");
    wp_enqueue_style('otherstyle', get_template_directory_uri() . "/assets/css/other.css");
    wp_enqueue_script('script-01', get_template_directory_uri() . "/assets/js/script-01.js", [], true);
}

// ===== Création des customs post type CPT
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
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);


    register_post_type('activites', [
        'labels' => [
            'name' => __('Activités'),
            'singular_name' => __('Activité'),
            'add_new' => __('Ajouter une activité'),
            'add_new_item' => __('Ajouter une nouvelle activité'),
            'edit_item' => __('Modifier l\'activité'),
            'new_item' => __('Nouvelle activité'),
            'view_item' => __('Voir l\'activité'),
            'view_items' => __('Voir les activités'),
            'search_items' => __('Rechercher des activités'),
            'not_found' => __('Aucune activité trouvée'),
            'not_found_in_trash' => __('Aucune activité trouvée dans la corbeille'),
            'all_items' => __('Toutes les activités'),
            'archives' => __('Archives des activités'),
            'attributes' => __('Attributs de l\'activité'),
            'insert_into_item' => __('Insérer dans l\'activité'),
            'uploaded_to_this_item' => __('Téléchargé dans cette activité'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'activites'],
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-clipboard',
    ]);


    register_post_type('liens_externes', [
        'labels' => [
            'name' => __('Liens externes'),
            'singular_name' => __('Lien externe'),
            'add_new' => __('Ajouter un lien externe'),
            'add_new_item' => __('Ajouter un nouveau lien externe'),
            'edit_item' => __('Modifier le lien externe'),
            'new_item' => __('Nouveau lien externe'),
            'view_item' => __('Voir le lien externe'),
            'view_items' => __('Voir les liens externes'),
            'search_items' => __('Rechercher des liens externes'),
            'not_found' => __('Aucun lien externe trouvé'),
            'not_found_in_trash' => __('Aucun lien externe trouvé dans la corbeille'),
            'all_items' => __('Tous les liens externes'),
            'archives' => __('Archives des liens externes'),
            'attributes' => __('Attributs des liens externes'),
            'insert_into_item' => __('Insérer dans le lien externe'),
            'uploaded_to_this_item' => __('Téléchargé dans ce lien externe'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'liens-externes'],
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-links',
    ]);
}

// ===== Création des customizers "Editable depuis l'onglet Apparence -> personnaliser -> Informations du portfolio"
function perfect_portfolio_customize_register($wp_customize)
{

    // ===== Enregistrer le customizer
    $wp_customize->add_section('magnific_portfolio_section', [
        'title' => __('Informations du Portfolio', 'textdomain'),
        'priority' => 30,
    ]);

    // ===== Ajout de l'option user_name dans le customizer
    $wp_customize->add_setting('user_name', [
        'default' => 'Herinjaka Tolotra',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('user_name_control', [
        'label' => __('Nom de l\'utilisateur', 'textdomain'),
        'section' => 'magnific_portfolio_section',
        'settings' => 'user_name',
        'type' => 'text',
    ]);

    // ===== Ajout de l'option user_description dans le customizer
    $wp_customize->add_setting('user_description', [
        'default' => 'Développeur Web Full-Stack passionné par la création d\'expériences numériques modernes et élégantes.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(
        'user_description_control',
        [
            'label' => __('Description du poste de l\'utilisateur'),
            'section' => 'magnific_portfolio_section',
            'settings' => 'user_description',
            'type' => 'text'
        ]
    );

    // ===== Ajout de l'option user_email dans le customizer
    $wp_customize->add_setting('user_email', [
        'default' => 'john@doe.com',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('user_email_control', [
        'label' => __('Adresse email de l\'utilisateur'),
        'section' => 'magnific_portfolio_section',
        'settings' => 'user_email',
        'type' => 'email'
    ]);

    // ===== Ajout de l'option hero_image dans le customizer
    $wp_customize->add_setting('hero_image', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', [
        'label' => __('Image de la bannière', 'perfect_portfolio'),
        'section' => 'magnific_portfolio_section',
        'settings' => 'hero_image',
    ]));
}

// ===== Appel des fonctions
add_action('after_setup_theme', 'magnific_portfolio_setup_theme');
add_action('wp_enqueue_scripts', 'magnific_portfolio_enqueue_scripts');
add_action('init', 'perfect_portfolio_custom_post_type');
add_action('customize_register', 'perfect_portfolio_customize_register');
