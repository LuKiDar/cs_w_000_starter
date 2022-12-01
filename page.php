<?php get_header(); ?>

<div class="default-page">
    <div class="container">
        <header class="default-page__header col col--12">
            <h1 class="default-page__title"><?= get_the_title(); ?></h1>
        </header>
        
        <?php while ( have_posts() ): the_post(); ?>
            <div class="col col--12">
                <div class="custom-select custom-select--links">
                    <span class="custom-select__title">Sort By: Newest</span>

                    <ul class="custom-select__list">
                        <li class="custom-select__item">
                            <a href="#">Sort By: Newest</a>
                        </li>
                        <li class="custom-select__item">
                            <a href="#">Sort By: Oldest</a>
                        </li>
                    </ul>
                </div>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>