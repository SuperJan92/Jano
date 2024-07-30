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

/**
 * WP AJAX Call Frontend
 */

//Load jQuery
wp_enqueue_script('jquery');


//The Javascript
function add_this_script_footer(){ ?>
    <script>
        jQuery(document).ready(function($) {
            // This is the variable we are passing via AJAX
            var fruit = 'Banana';
            // This does the ajax request (The Call).

            $( ".banana" ).click(function() {
                $.ajax({
                    url: 'https://jano.local/wp-admin/admin-ajax.php', // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
                    data: {
                        'action':'example_ajax_request', // This is our PHP function below
                        'fruit' : fruit // This is the variable we are sending via AJAX
                    },
                    success:function(data) {
                        // This outputs the result of the ajax request (The Callback)
                        $(".banana").text(data);
                    },
                    error: function(errorThrown){
                        window.alert(errorThrown);
                    }
                });
            });
        });
    </script>
<?php }
add_action('wp_footer', 'add_this_script_footer');

//The PHP
function example_ajax_request() {
    // The $_REQUEST contains all the data sent via AJAX from the Javascript call
    if ( isset($_REQUEST) ) {
        $fruit = $_REQUEST['fruit'];
        // This bit is going to process our fruit variable into an Apple
        if ( $fruit == 'Banana' ) {
            $fruit = 'JAJAJAJA';
        }
        // Now let's return the result to the Javascript function (The Callback)
        echo $fruit;
    }
    // Always die in functions echoing AJAX content
    die();
}
// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );
