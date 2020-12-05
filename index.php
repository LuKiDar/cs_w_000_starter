<?php get_header(); ?>

<section class="cs__default-page cs__container">
    <div class="cs__col">
        <h1><?php _e( 'Latest Posts', CSWP ); ?></h1>
    </div>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('cs__col'); ?>>
            <?php if ( has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail(array(120,120)); ?>
                </a>
            <?php endif; ?>
            <h2>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h2>
            <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
        </article>
    <?php endwhile; ?>

    <?php else: ?>
        <article class="cs__col">
            <h2><?php _e( 'Sorry, nothing to display.', CSWP ); ?></h2>
        </article>
    <?php endif; ?>


    <div class="cs__col">
        <?= get_the_posts_pagination(); ?>
    </div>
</section>

<?php get_footer(); ?>