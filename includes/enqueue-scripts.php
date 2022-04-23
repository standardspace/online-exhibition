<?php

function enqueue_scripts() {

    // Register Modernizr
    wp_register_script('Modernizr', get_stylesheet_directory_uri().'/assets/js/plugins/modernizr.js', array(), "", false);

	// Register Custom Javascript Files For Site
    wp_register_script('Theme-script', get_stylesheet_directory_uri().'/assets/js/dist/scripts.min.js', array(), "", true);

    // Register Custom CSS For Site
    wp_register_style('Theme-stylesheet', 'bob'.'/style.css');

    // Call all JS and CSS Files For Site 
    wp_enqueue_script('Modernizr');
    wp_enqueue_script('Theme-script');
    wp_enqueue_style('Theme-stylesheet');
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );