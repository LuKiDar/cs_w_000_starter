<?php get_header(); ?>

<div class="default-page container">
    <div class="row">
        <div class="col-12">
            <h1 class="title--underlined"><?= get_the_title(); ?></h1>
        </div>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-12">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>