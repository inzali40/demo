<?php // Template Name: About Page ?>
<?php get_header(); ?>
<?php
    $id = $post->ID;
    $thumb = get_post_thumbnail_id($id);
    $about_image = wp_get_attachment_image_src($thumb, 'full');
    $about_field = get_fields($id);
    $about_title = $about_field['about_title'];
    $about_image = $about_field['about_image'];
    $about_content = $about_field['about_content'];
?>

<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <img class="about-img" src="<?php echo $about_image; ?>" alt="<?php echo $post->post_title; ?>">
            </div>
            <div class="col-xs-12">
            <h3><?php echo $about_title; ?></h3>
            <p><?php echo $about_content ;?></p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>