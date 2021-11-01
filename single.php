<?php get_header(); ?>

<div class="default-page">
    <div class="container container--1">
        <div class="col">
            <h1 class="default-page__title"><?= get_the_title(); ?></h1>
        </div>
    </div>

    <div class="container container--1">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>