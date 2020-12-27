<?php get_header(); ?>

<div class="cs__default-page">
    <div class="cs__container cs__container--1">
        <div class="cs__col">
            <h1 class="cs__default-page__title"><?= get_the_title(); ?></h1>
        </div>
    </div>

    <div class="cs__container cs__container--1">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="cs__col">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>