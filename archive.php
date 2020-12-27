<?php get_header(); ?>

<div class="cs__feed">
    <div class="cs__container cs__container--1">
        <div class="cs__col">
            <h1 class="cs__feed__title"><?= get_the_archive_title(); ?></h1>
        </div>
    </div>

    <?php if (have_posts()): ?>
        
        <div class="cs__container cs__container--3 cs__container--md-2 cs__container--sm-1 cs__container--xs-1">
            <?php while (have_posts()) : the_post(); ?>
                <div class="cs__feed__item cs__col">
                    <?php get_template_part( 'parts/content/post' ); ?>
                </div>
            <?php endwhile; ?>
        </div>

    <?php else: ?>

        <div class="cs__container cs__container--1">
            <article class="cs__col">
                <h5><?php _e( 'Sorry, nothing to display.', CSWP ); ?></h5>
            </article>
        </div>

    <?php endif; ?>

    <div class="cs__container cs__container--1">
        <div class="cs__col">
            <?= get_the_posts_pagination(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>