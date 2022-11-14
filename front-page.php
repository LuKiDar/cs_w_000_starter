<?php get_header(); ?>

<div class="default-page">
    <div class="container">
        <?php while ( have_posts() ): the_post(); ?>
            <div class="col col--12">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>