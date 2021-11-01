<?php /*** Content / Post ***/

$date_format = get_option('date_format');
$post_categories = wp_get_post_categories( get_the_ID(), array('fields'=>'ids') ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post '. $modifier); ?>>
    <?php if ( has_post_thumbnail() ){ ?>
        <figure class="post__media-wrap">
            <picture class="post__image">
                <source media="(max-width: 360px)" srcset="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>">
                <source media="(min-width: 361px)" srcset="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>">
                <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" alt="<?= get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true); ?>">
            </picture>

            <a class="post__media-link" href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>"></a>
        </figure>
    <?php } ?>

    <h5 class="post__title">
        <a class="builtin" href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>"><?php the_title(); ?></a>
    </h5>

    <ul class="post__meta">
        <li><?php the_time($date_format); ?></li>        
        <li>by <?= get_the_author(); ?></li>
    </ul>

    <div class="post__excerpt">
        <p><?php the_excerpt(); ?></p>
    </div>

    <?php if ( !empty($post_categories) ){ ?>
        <ul class="post__tags">
            <?php foreach ( $post_categories as $item ){ ?>
                <li>
                    <a href="<?= get_category_link($item); ?>" title=""><?= get_cat_name($item); ?></a>    
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <footer class="post__navigation">
        <a class="button" href="<?php the_permalink(); ?>" title="Read more: <?php the_title(); ?>">Read more</a>
    </footer>
</article>