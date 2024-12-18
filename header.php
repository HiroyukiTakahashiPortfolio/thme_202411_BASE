<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="header_inner">
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets\img\common\logo1.png" alt="ロゴ">
                
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
                <li><a href="<?php echo home_url('/about'); ?>">クラス紹介</a></li>
                <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">ブログ</a></li>
                <li><a href="<?php echo home_url('/news'); ?>">お知らせ</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>">お問い合わせ</a></li>
            </ul>

            <?php
            // wp_nav_menu(array(
            //     'theme_location' => 'main-menu',
            //     'container'      => false,
            //     'items_wrap'     => '<ul>%3$s</ul>',
            // ));
            ?>
            
        </nav>
    </div>
</header>
