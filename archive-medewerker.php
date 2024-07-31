<?php

$templates = array( 'medewerker.twig', 'post-filter.twig' );

$context = Timber::context();

$functie_terms = [
    'post_type' => 'medewerker',
];

$args = [
    'post_type' => 'medewerker',
];

$context['posts'] = Timber::get_posts($args);
$context['functies'] = Timber::get_posts($functie_terms);

Timber::render( $templates, $context );