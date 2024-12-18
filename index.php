<?php get_header(); ?>


    <section class="sec">
        <div class="container">
            <header class="sec_header">
                <h2 class="title">最新の投稿<span>NEWS</span></h2>
            </header>
            <div class="wrap1">
                <div class="row">
                    <div class="content-area">
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="col-md-4">
                                    <article class="news">
                                        <div class="news_pic">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail( 'medium' ); // 投稿に設定されたサムネイル画像を表示 ?>
                                                <?php else: ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/news_img-1.jpg" alt="デフォルト画像">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="news_meta">
                                            <ul class="post-categories">
                                                <li><?php the_category(', '); // カテゴリを表示 ?></li>
                                            </ul>
                                            <time class="news_time" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                                <?php echo get_the_date('Y年m月d日'); ?>
                                            </time>
                                        </div>
                                        <h2 class="news_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <div class="news_desc">
                                            <?php if ( is_singular() ) : ?>
                                                <p><?php the_content(); // 個別ページでは全文を表示 ?></p>
                                            <?php else : ?>
                                                <p><?php the_excerpt(); // 一覧ページでは抜粋を表示 ?></p>
                                                <p><a href="<?php the_permalink(); ?>">[続きを読む]</a></p>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>投稿が見つかりませんでした。</p>
                        <?php endif; ?>
                    </div>    
                    <div class="sidebar">
                        <?php get_sidebar(); ?>
                    </div>        
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>