<?php 
/**
 * Template Name: About
 */
get_header(); 

if(have_rows('about')): while(have_rows('about')): the_row();

if(have_rows('sections')): while(have_rows('sections')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Full Height'){

if(have_rows('full_height')): while(have_rows('full_height')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');
    $columnStyle = get_sub_field('column_style');
    $columnClass = get_sub_field('column_class');
    $content = get_sub_field('content');

if($bgImg){
echo '<section class="position-relative bg-attachment text-white d-flex align-items-center justify-content-center full-height  ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;background-attachment:fixed;height:100vh;padding:50px;' . $style . '">';
// echo '</section>';
echo '<div class="position-absolute w-100 h-100 bg-black" style="opacity:0.45;top:0;left:0;"></div>';
} else {
echo '<section class="position-relative bg-attachment d-flex align-items-center justify-content-center ' . $classes . '" style="padding:250px 0;' . $style . '">';
}

echo '<div class="container">';
echo '<div class="row row-content align-items-center justify-content-between">';
echo '<div class="col-md-6 ' . $columnClass . '" style="' . $columnStyle . '">';
    echo $content;
echo '</div>';


echo '</div>';
echo '</div>';

echo '</section>';
endwhile; endif;

} elseif($layout == 'Content + Image') {

    if(have_rows('content_image')): while(have_rows('content_image')): the_row();
    $image = get_sub_field('image');
    $content = get_sub_field('content');
    $imageSide = get_sub_field('image_side');

    echo '<section class="position-relative bg-attachment d-flex align-items-center justify-content-center content-image" style="padding:50px 0;">';
    echo '<div class="container">';
    if($imageSide == 'Left'){
        echo '<div class="row row-content align-items-center justify-content-center">';
        // echo '</div>';
    } else {
        echo '<div class="row row-content align-items-center justify-content-center flex-md-row-reverse">';
    }

    echo '<div class="col-md-4" style="">';
    echo $content;
    echo '</div>';
    echo '<div class="col-md-1"></div>';

    echo '<div class="col-md-6" style="">';
    echo '<div class="position-relative">';
    
    echo wp_get_attachment_image($image,'full','',['class'=>'w-100 h-100 position-relative z-1']);

    if($imageSide == 'Left'){
    echo '<div class="position-absolute bg-accent-secondary" style="height:90%;width:90%;bottom:0px;left:-15px;"></div>';
    } else {
        echo '<div class="position-absolute bg-accent-secondary" style="height:90%;width:90%;bottom:0px;right:-15px;"></div>';
    }
    echo '</div>';
    echo '</div>';
    
    echo '</div>';
    echo '</div>';
    echo '</section>';
    endwhile; endif;

}




endwhile; endif;

endwhile; endif;

get_footer(); 
?>