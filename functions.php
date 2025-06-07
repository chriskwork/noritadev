<?php
// 기본 워드프레스 기능 활성화
function theme_setup() {
    // 타이틀 태그 지원
    add_theme_support('title-tag');
    
    // 포스트 썸네일 지원
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

// 스타일시트 로드
function theme_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_styles');
?>