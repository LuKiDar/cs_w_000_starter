<?php
/**
 * The Template name: Contacts
 */

get_header(); ?>

<?php if( have_rows('contact_section') ):
    while ( have_rows('contact_section') ): the_row();
        get_template_part( 'parts/section/contacts' );
    endwhile;
endif; ?>

<?php get_footer(); ?>