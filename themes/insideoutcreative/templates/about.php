<?php 
/**
 * Template Name: About
 */
get_header(); 

if(have_rows('about')): while(have_rows('about')): the_row();

if(have_rows('sections')): while(have_rows('sections')): the_row();
$layout = get_sub_field('layout');




endwhile; endif;

endwhile; endif;

get_footer(); 
?>