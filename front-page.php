<?php get_header(); ?>

<!-- メインビジュアルスライダー -->
<section class="main-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            // カスタム投稿タイプ 'main_slider' からスライダー用の投稿を取得
            $slider_query = new WP_Query(array(
                'post_type' => 'main_slider',
                'posts_per_page' => -1, // 全てのスライダー投稿を表示
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($slider_query->have_posts()) :
                while ($slider_query->have_posts()) : $slider_query->the_post();
            ?>
                <div class="swiper-slide">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg" alt="デフォルト画像">
                    <?php endif; ?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p>スライダー用のコンテンツがありません。</p>
            <?php endif; ?>
        </div>
        <!-- ナビゲーションボタン -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- ポートフォリオ作品一覧 -->
<section class="portfolio-grid">
    <div class="container">
        <header class="section-header">
            <h2>ポートフォリオ作品一覧</h2>
        </header>

        <?php 
        // ポートフォリオ投稿タイプを取得: 6件まで表示
        $portfolio_query = new WP_Query(array(
            'post_type' => 'portfolio', // カスタム投稿タイプ 'portfolio' を指定
            'posts_per_page' => 6,      // 表示件数
            'orderby' => 'date',        // 並び順: 投稿日時
            'order' => 'DESC'           // 降順表示
        ));
        ?>

        <?php if ($portfolio_query->have_posts()) : ?>
            <div class="grid-container">
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                    <div class="grid-item">
                        <div class="portfolio-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg" alt="デフォルト画像">
                                <?php endif; ?>
                            </a>
                            <h3 class="portfolio-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="portfolio-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>ポートフォリオが見つかりませんでした。</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>
