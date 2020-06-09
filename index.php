<?php get_header(); ?>

<section class="default-page container">
    <div class="row">
        <div class="col-12">
            <h1 class="title--underlined"><?php _e( 'Latest Posts', CSWP ); ?></h1>
        </div>

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('col-12'); ?>>
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
            <article class="col-12">
                <h2><?php _e( 'Sorry, nothing to display.', CSWP ); ?></h2>
            </article>
        <?php endif; ?>


        <div class="col-12">
            <?= get_the_posts_pagination(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>