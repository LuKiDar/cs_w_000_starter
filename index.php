<?php get_header(); ?>

<div class="feed">
    <div class="container container--1">
        <div class="col">
            <h1 class="feed__title"><?php _e('Latest Posts', CSWP); ?></h1>
        </div>
    </div>

    <?php if ( have_posts() ): ?>
        <div class="container container--3 container--md-2 container--sm-1 container--xs-1">
            <?php while ( have_posts() ): the_post(); ?>
                <div class="feed__item col">
                    <?php get_template_part('parts/content/post'); ?>
                </div>
            <?php endwhile; ?>
        </div>

    <?php else: ?>
        <div class="container container--1">
            <article class="col">
                <h5><?php _e('Sorry, nothing to display.', CSWP); ?></h5>
            </article>
        </div>

    <?php endif; ?>

    <div class="container container--1">
        <div class="col">
            <?= get_the_posts_pagination(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>