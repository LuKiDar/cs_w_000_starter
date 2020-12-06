<?php /*** Content / Post ***/  ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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