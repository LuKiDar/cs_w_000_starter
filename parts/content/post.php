<?php /*** Content / Post ***/

$date_format = get_option('date_format');
$post_categories = wp_get_post_categories( get_the_ID(), array('fields'=>'ids') ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cs__post '.$modifier); ?>>
    <?php if ( has_post_thumbnail() ):
        $post_image = cs__get_image_url($post, true, 'large'); ?>

        <picture class="cs__post__image">
            <a href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>" style="background-image: url(<?= $post_image[0]; ?>);"></a>
        </picture>
    <?php endif; ?>

    <h5 class="cs__post__title">
        <a class="cs__builtin" href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>"><?php the_title(); ?></a>
    </h5>

    <ul class="cs__post__meta">
        <li><?php the_time($date_format); ?></li>        
        <li>by <?= get_the_author(); ?></li>
    </ul>

    <div class="cs__post__excerpt">
        <p><?php the_excerpt(); ?></p>
    </div>

    <?php if ( !empty($post_categories) ){ ?>
        <ul class="cs__post__tags">
            <?php foreach ( $post_categories as $item ){ ?>
                <li>
                    <a href="<?= get_category_link($item); ?>" title=""><?= get_cat_name($item); ?></a>    
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <div class="cs__post__navigation">
        <a class="button" href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>">Read more</a>
    </div>
</article>