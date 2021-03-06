<?php

function enqueue_scripts() {

    // Register Modernizr
    wp_register_script(
        'Modernizr', 
        get_stylesheet_directory_uri().'/assets/js/plugins/modernizr.js',
        array(),
        filemtime(get_stylesheet_directory() .'/assets/js/plugins/modernizr.js'),
        false
    );

	// Register Custom Javascript Files For Site
    wp_register_script(
        'Theme-script',
        get_stylesheet_directory_uri().'/assets/js/dist/scripts.min.js',
        array(),
        filemtime(get_stylesheet_directory() .'/assets/js/dist/scripts.min.js'),
        true
    );

    // Register Custom CSS For Site
    wp_register_style(
        'Theme-stylesheet',
        get_stylesheet_directory_uri().'/style.css',
        array(),
        filemtime(get_stylesheet_directory() .'/style.css'),
        'all'
    );

    // Call all JS and CSS Files For Site 
    wp_enqueue_script('Modernizr');
    wp_enqueue_script('Theme-script');
    wp_enqueue_style('Theme-stylesheet');
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );