<?php
// テーマのセットアップ
// テーマのセットアップ
function my_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'main-menu' => 'メインメニュー',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// スタイルとスクリプトの読み込み
function my_theme_assets() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('main-slider-js', get_template_directory_uri() . '/assets/js/main-slider.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_assets');

// スライダー用カスタム投稿タイプ
function create_slider_post_type() {
    register_post_type('main_slider', array(
        'labels' => array(
            'name' => 'スライダー',
            'singular_name' => 'スライダーアイテム'
        ),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-images-alt2',
    ));
}
add_action('init', 'create_slider_post_type');

// ポートフォリオ投稿タイプ
function create_portfolio_post_type() {
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'ポートフォリオ',
            'singular_name' => 'ポートフォリオ'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_portfolio_post_type');

// テーマ有効化時に固定ページを自動作成
function setup_home_and_blog_pages() {
    // ホームページ作成
    if (!get_page_by_title('ホーム')) {
        $home_page_id = wp_insert_post(array(
            'post_title'   => 'ホーム',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => 'ここにホームページの内容を記載します。'
        ));
        // ホームページにテンプレートを適用
        update_post_meta($home_page_id, '_wp_page_template', 'home-page.php');
        update_option('page_on_front', $home_page_id); // フロントページとして設定
    }

    // ブログページ作成
    if (!get_page_by_path('blog')) {
        $blog_page_id = wp_insert_post(array(
            'post_title'   => 'ブログ',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => ''
        ));
        // スラッグを `blog` に設定
        wp_update_post(array(
            'ID'        => $blog_page_id,
            'post_name' => 'blog'
        ));
        update_option('page_for_posts', $blog_page_id); // 投稿ページとして設定
    }

    // 固定ページ表示設定
    update_option('show_on_front', 'page'); // 固定ページをフロントページに設定
}
add_action('after_switch_theme', 'setup_home_and_blog_pages');
