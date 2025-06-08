<?php
// 기본 워드프레스 기능 활성화
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

// Load styles
function theme_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_styles');


function noritadev_enqueue_scripts() {
    wp_enqueue_script('jquery');
    
    // Custon script
    wp_enqueue_script(
        'noritadev-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '1.0.0',
        true // footer(true) vs header(false)
    );
    
    // Dark mode script
    wp_enqueue_script(
        'noritadev-darkmode',
        get_template_directory_uri() . '/assets/js/darkmode.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'noritadev_enqueue_scripts');


?>