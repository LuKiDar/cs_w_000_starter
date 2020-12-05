<?php get_header(); ?>

<div class="cs__default-page cs__container">
    <div class="cs__col">
        <h1><?= get_the_title(); ?></h1>
    </div>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="cs__col">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>