<?php // Template Name: Blog Page ?>
<?php get_header(); ?>
<section class="blog">
<div class="container">
<?php $categories = get_terms( 'category'); ?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <?php foreach ($categories as $ckey => $category) { ?>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if ( $ckey == 0 ){ echo 'active'; } ?>" id="pills-<?php echo $category->slug ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $category->slug ?>" type="button" role="tab" aria-controls="pills-<?php echo $category->slug ?>" aria-selected="true"><?php echo $category->name; ?></button>
        </li>
    <?php $ckey++; } ?>
</ul>
<div class="tab-content" id="pills-tabContent">
<?php foreach ($categories as $ckey => $cat) { ?>
<?php
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $cat->term_id,
        ),
    ),
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
?>

    <?php 
    while ( $query->have_posts() ) { $query->the_post(); ?>
        <div class="tab-pane fade show <?php if ($ckey==0){ echo 'active'; } ?>" id="pills-<?php echo $cat->slug; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $cat->slug; ?>-tab"><?php echo $post->post_title. '<br>'.$post->post_content; ?> </div>
    <?php } ?>

<?php } ?>
<?php } ?>
</div>
</div>
</section>


<?php get_footer(); ?>