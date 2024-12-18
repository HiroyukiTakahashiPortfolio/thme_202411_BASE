<section class="section" style="background-color: #f8f8f8;">
    <h2>ブログ</h2>
    <?php
    // 投稿を取得するためのWP_Query
    $blog_posts = new WP_Query(array(
        'post_type'      => 'post',   // WordPressデフォルトの投稿タイプ
        'posts_per_page' => 3,        // 表示する投稿数
        'orderby'        => 'date',   // 並び順を投稿日に基づく
        'order'          => 'DESC',   // 新しい投稿を上に表示
    ));

    // 投稿がある場合の表示
    if ($blog_posts->have_posts()) :
        while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
            <article class="blog-post">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p> <!-- 抜粋（20単語） -->
                <p>投稿日: <?php echo get_the_date(); ?></p> <!-- 投稿日を表示 -->
            </article>
        <?php endwhile;
        wp_reset_postdata(); // クエリをリセット
    else : ?>
        <p>記事が見つかりませんでした。</p>
    <?php endif; ?>
</section>
