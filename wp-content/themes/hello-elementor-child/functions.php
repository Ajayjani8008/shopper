<?php

function my_child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Enqueue child theme styles
    wp_enqueue_style( 'child-style', 
        get_stylesheet_directory_uri() . '/style.css', 
        array( 'parent-style' ), // Set parent-style as a dependency
        wp_get_theme()->get('Version') // Use the child theme version for cache-busting
    );
}
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );
