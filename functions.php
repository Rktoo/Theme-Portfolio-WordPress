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
    wp_enqueue_script('script-01', get_template_directory_uri() . "/assets/js/script-01.js", [], true);
}

// ===== Création des customs post type CPT
function perfect_portfolio_custom_post_type()
{
    // Enregistrer les Custom Post Types
    register_custom_post_type('projets', [
        'name' => __('Projets'),
        'singular_name' => __('Projet'),
        'menu_icon' => 'dashicons-portfolio', // Icône 
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite_slug' => 'projets',
        'show_in_menu' => 'magnific-portfolio', // Regrouper sous le menu parent
    ]);

    register_custom_post_type('competences', [
        'name' => __('Compétences'),
        'singular_name' => __('Compétence'),
        'menu_icon' => 'dashicons-admin-tools', // Icône par défaut
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite_slug' => 'competences',
        'show_in_menu' => 'magnific-portfolio',
    ]);

    register_custom_post_type('activites', [
        'name' => __('Activités'),
        'singular_name' => __('Activité'),
        'menu_icon' => 'dashicons-clipboard',
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'rewrite_slug' => 'activites',
        'show_in_menu' => 'magnific-portfolio',
    ]);

    register_custom_post_type('liens_externes', [
        'name' => __('Liens externes'),
        'singular_name' => __('Lien externe'),
        'menu_icon' => 'dashicons-admin-links',
        'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
        'rewrite_slug' => 'liens-externes',
        'show_in_menu' => 'magnific-portfolio',
    ]);
}

// ===== Fonction pour enregistrer un Custom Post Type
function register_custom_post_type($post_type, $labels)
{
    $default_labels = [
        'add_new' => __('Ajouter un nouveau'),
        'add_new_item' => __('Ajouter un nouveau ' . strtolower($labels['singular_name'])),
        'edit_item' => __('Modifier ' . strtolower($labels['singular_name'])),
        'new_item' => __('Nouveau ' . strtolower($labels['singular_name'])),
        'view_item' => __('Voir ' . strtolower($labels['singular_name'])),
        'view_items' => __('Voir ' . strtolower($labels['name'])),
        'search_items' => __('Rechercher ' . strtolower($labels['name'])),
        'not_found' => __('Aucun ' . strtolower($labels['name']) . ' trouvé'),
        'not_found_in_trash' => __('Aucun ' . strtolower($labels['name']) . ' trouvé dans la corbeille'),
        'all_items' => __('Tous les ' . strtolower($labels['name'])),
        'archives' => __('Archives des ' . strtolower($labels['name'])),
        'attributes' => __('Attributs des ' . strtolower($labels['name'])),
        'insert_into_item' => __('Insérer dans ' . strtolower($labels['singular_name'])),
        'uploaded_to_this_item' => __('Téléchargé dans ' . strtolower($labels['singular_name'])),
    ];

    // Fusionner les labels par défaut avec les labels personnalisés
    $final_labels = array_merge($default_labels, $labels);

    register_post_type($post_type, [
        'labels' => $final_labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => $labels['rewrite_slug']],
        'supports' => $labels['supports'],
        'show_in_rest' => true,
        'menu_icon' => isset($labels['menu_icon']) ? $labels['menu_icon'] : 'dashicons-post',
        'show_in_menu' => isset($labels['show_in_menu']) ? $labels['show_in_menu'] : true,
    ]);
}

// ===== Création du menu parent pour grouper les CPT du thème
function add_magnific_portfolio_menu()
{
    add_menu_page(
        __('Magnific Portfolio'),
        __('Magnific Portfolio'),
        'manage_options',
        'magnific-portfolio',
        '',
        'dashicons-admin-customizer',
        10
    );
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
add_action('admin_menu', 'add_magnific_portfolio_menu');
add_action('init', 'perfect_portfolio_custom_post_type');
add_action('after_setup_theme', 'magnific_portfolio_setup_theme');
add_action('wp_enqueue_scripts', 'magnific_portfolio_enqueue_scripts');
add_action('customize_register', 'perfect_portfolio_customize_register');
