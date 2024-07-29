<?php

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = ['templates', 'views'];

new StarterSite();

//Medewerkers CPT
add_action('init', function () {
    register_post_type('medewerker', [
        'label' => __('Medewerkers'),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessman',
        'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'medewerkers'],
        'taxonomies' => ['functie'],
        'has_archive' => true,
        'labels' => [
            'name' => __( 'Medewerkers' ),
            'singular_name' => __( 'Medewerkers' ),
            'add_new_item' => __( 'Medewerker toevoegen' ),
            'add_new' => __( 'Medewerker toevoegen' ),
            'edit_item' => __( 'Medewerker aanpassen' ),
            'featured_image' => __( 'Foto' ),
            'set_featured_image' => __( 'Upload foto' ),
            'remove_featured_image' => __( 'Foto verwijderen' ),
            'menu_name' => __( 'Medewerkers' ),
        ],
    ]);
    //Functie taxonomy
    register_taxonomy('functie', ['medewerker'], [
        'label' => __('Functie'),
        'hierarchical' => true,
        'rewrite' => ['slug' => 'medewerker-functie'],
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => [
            'singular_name' => __('Functie'),
            'all_items' => __('Alle functies'),
            'edit_item' => __('Functie aanpassen'),
            'view_item' => __('Functie bekijken'),
            'update_item' => __('Update functie'),
            'add_new_item' => __('Functie toevoegen'),
            'new_item_name' => __('Nieuwe functie naam'),
            'search_items' => __('Functies zoeken'),
            'parent_item' => __('Parent functie'),
            'parent_item_colon' => __('Parent functie:'),
            'not_found' => __('Geen functies gevonden'),
        ]
    ]);
    register_taxonomy_for_object_type('functie', 'medewerker');
});