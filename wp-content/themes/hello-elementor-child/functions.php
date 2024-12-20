<?php 

function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style('hello-elementor-theme-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'hello-elementor-theme-style' ) );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles' );


?>