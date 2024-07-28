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
Timber::$dirname = [ 'templates', 'views' ];

new StarterSite();

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'medewerker',
        array(
            'labels' => array(
                'name' => __( 'Medewerker' ),
                'singular_name' => __( 'Medewerkers' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies' => array('category', 'post_tag')
        )
    );
}

