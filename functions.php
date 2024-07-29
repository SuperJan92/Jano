<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = ['templates', 'views'];

new StarterSite();

//Medewerkers post type
add_action('init', function () {
    register_post_type('medewerker', [
        'label' => __('Medewerkers', 'txtdomain'),
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessman',
        'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'medewerker'],
        'taxonomies' => ['functie'],
        'labels' => [
            'singular_name' => __('Book', 'txtdomain'),
            'add_new_item' => __('Add new book', 'txtdomain'),
            'new_item' => __('New book', 'txtdomain'),
            'view_item' => __('View book', 'txtdomain'),
            'not_found' => __('No books found', 'txtdomain'),
            'not_found_in_trash' => __('No books found in trash', 'txtdomain'),
            'all_items' => __('All books', 'txtdomain'),
            'insert_into_item' => __('Insert into book', 'txtdomain')
        ],
    ]);

    register_taxonomy('functie', ['medewerker'], [
        'label' => __('Functie', 'txtdomain'),
        'hierarchical' => true,
        'rewrite' => ['slug' => 'medewerker-functie'],
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => [
            'singular_name' => __('Functie', 'txtdomain'),
            'all_items' => __('Alle functies', 'txtdomain'),
            'edit_item' => __('Functie aanpassen', 'txtdomain'),
            'view_item' => __('Functie bekijken', 'txtdomain'),
            'update_item' => __('Update functie', 'txtdomain'),
            'add_new_item' => __('Functie toevoegen', 'txtdomain'),
            'new_item_name' => __('Nieuwe functie naam', 'txtdomain'),
            'search_items' => __('Functies zoeken', 'txtdomain'),
            'parent_item' => __('Parent functie', 'txtdomain'),
            'parent_item_colon' => __('Parent functie:', 'txtdomain'),
            'not_found' => __('Geen functies gevonden', 'txtdomain'),
        ]
    ]);
    register_taxonomy_for_object_type('functie', 'medewerker');
});