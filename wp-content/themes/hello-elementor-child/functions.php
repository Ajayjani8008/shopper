<?php


function my_child_theme_enqueue_styles() {
    // Enqueue parent theme's style.css
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
    // Enqueue child theme's style.css
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style' ), // Make sure the parent style is loaded first
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );

include get_stylesheet_directory() . '/woo-helpers/bbloomer-hooks-function.php';
