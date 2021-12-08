<?php 
get_header();
?>
    <main>
        <section>
            <div class="container">
                <?php  
                if (have_posts()) { 
                    while (have_posts()) : the_post();
                        $post_title = $post->post_title;
                        $post_date = date('M d Y', strtotime($post->post_date));
                        $post_excerpt = $post->post_excerpt;
                        $post_link = get_permalink( $post->ID );
                        $feature_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
                        $feature_img = aq_resize( $feature_img[0], 980, 653, true, true, true ); // resize 
                ?>
                        <div class="row">
                            <div class="col-lg-6 card">
                                <div class="card-body">
                                    <article>
                                        <?php if ($post_title) { ?>
                                            <h3><a href="" title=""><?php echo $post_title; ?></a></h3>
                                        <?php } ?>
                                        <?php if ($post_date) { ?>
                                            <div>Posted on <span> <?php echo $post_date; ?></span></div>
                                        <?php } ?>
                                    </article>
                                </div>
                            </div>
                            <?php if ($feature_img) { ?>
                                <div class="col-lg-6 card">
                                    <div class="card-body">
                                        <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                                            <img src="<?php echo WP_HOME.$feature_img; ?>" class="w-100" alt="<?php echo $post_title; ?>">
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php  endwhile; ?>

                    <div class="pagination-wrap">
                        <div aria-label="Page navigation example">
                            <ul class="pagination"><?php pagination_widget(); ?></ul>     
                        </div>
                    </div>
                <?php  
                    wp_reset_query();
                } 
                else { 
                ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php } ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>