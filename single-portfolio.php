<?php get_header(); ?>

<article class="portfolio-single">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="portfolio-title"><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
                <div class="portfolio-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="portfolio-content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; else : ?>
            <p>投稿が見つかりませんでした。</p>
        <?php endif; ?>
    </div>
</article>

<?php get_footer(); ?>
