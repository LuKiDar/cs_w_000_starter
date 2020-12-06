<?php get_header(); ?>

<section class="cs__default-page cs__container">
    <div class="cs__col cs__col--12">
        <h1><?php _e( 'Latest Posts', CSWP ); ?></h1>
    </div>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <div class="cs__col">
            <?php get_template_part( 'parts/content/post' ); ?>
        </div>
    <?php endwhile; ?>

    <?php else: ?>
        <div class="cs__col">
            <h2><?php _e( 'Sorry, nothing to display.', CSWP ); ?></h2>
        </div>
    <?php endif; ?>


    <div class="cs__col cs__col--12">
        <?= get_the_posts_pagination(); ?>
    </div>
</section>

<?php get_footer(); ?>