<?php get_header(); ?>
<?php
$home_field = get_fields();
$news = $home_field['news'];
$services = $home_field['service'];
$about_content=$home_field['about_content'];
$about_image=$home_field['about_image'];
$about_title=$home_field['about_title'];
?>
<section class="news">
  <div class="container">
     <?php if ($news){ ?>
     <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-4 g-4">
        <?php foreach($news as $skey => $new){ 
                                   
          $id = $new->ID;
          $images = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );  
          $news_image = aq_resize($images[0], 360, 180, true, true, true);
          $news_titles = $new->post_title;
          $news_title = wp_trim_words($news_titles, 3, '....');
          $news_contents = $new->post_excerpt;
          $news_content = wp_trim_words($news_contents, 27, '....');
          $news_link = get_permalink($id);
          ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?php echo $news_image; ?>" alt="<?php echo $news_title ?>">
              <div class="card-body">
                <h5 class="card-title"><a href="<?php echo $news_link; ?>" title="<?php echo $news_title; ?>"><?php echo $news_title ?></a></h5>
                <p class="card-text"><?php echo $news_content ?></p>
              </div>
          </div>
        </div>
  <?php } ?>
  </div>
<?php } ?>
</div>
</section>

<section class="service">
  <div class="container">
     <?php if ($services){ ?>
     <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-4 g-4">
        <?php foreach($services as $skey => $service){                    
            $services_title = $service['title'];
            $services_content = $service['content'];
            $services_link = $service['link'];
            $services_image = $service['image'];
          ?>
      <div class="col">
          <div class="card h-100">
          <h5 class="card-title"><a href="<?php echo $services_link; ?>" title="<?php echo $services_title; ?>"><?php echo $services_title; ?></a></h5>
              <div class="card-body">
                <img src="<?php echo $services_image['url']; ?>" alt="<?php echo $services_title; ?>">
                <p class="card-text"><?php echo $services_content; ?></p>
              </div>
          </div>
        </div>
  <?php } ?>
  </div>
<?php } ?>
</div>
</section>

<section class="about-us">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <img src="<?php echo $about_image; ?>" class="img-fluid rounded-start" alt="<?php echo $about_title; ?>">
      </div>
      <div class="col-md-6 col-xs-12">
          <h5 class="card-title"><?php echo $about_title; ?></h5>
           <p class="card-text"><?php echo $about_content; ?></p>
      </div>
      
    </div>
  </div>
</div>
</section>


<section class="slider">
  <div class="container">
  <!-- Swiper -->
  <?php if ($news) { ?>
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ( $news as $new ) { 
            $id = $new->ID;
            $images = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );  
            $news_image = aq_resize($images[0], 360, 180, true, true, true);
            $news_titles = $new->post_title;
            $news_title = wp_trim_words($news_titles, 3, '....');
            $news_contents = $new->post_excerpt;
            $news_content = wp_trim_words($news_contents, 27, '....');
            $news_link = get_permalink($id);
        ?>
          <div class="swiper-slide">
            <div class="card h-100">
              <img src="<?php echo $news_image; ?>" alt="<?php echo $news_title ?>">
                <div class="card-body">
                  <h5 class="card-title"><a href="<?php echo $news_link; ?>" title="<?php echo $news_title; ?>"><?php echo $news_title ?></a></h5>
                  <p class="card-text"><?php echo $news_content ?></p>
                </div>
            </div>
          </div>
        <?php } ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <?php } ?>
  </div>
</section>




<section class="sidebar">
  <div class="container">
      <?php 
          $args = array(
              'post_type'   => 'post',
              'posts_per_page' => 4,
              'orderby' => 'DESC'
          );
          
          $sidebars = get_posts( $args );
          if ($sidebars) {
      ?>
          <ul>
              <?php foreach ($sidebars as $sidebar) { 
                  $sidebar_id = $sidebar->ID;
                  $sidebar_images = wp_get_attachment_image_src( get_post_thumbnail_id( $sidebar_id ), 'full' );   
                  $sidebar_image = aq_resize($sidebar_images[0], 100, 70, true, true);
                  $sidebar_title = $sidebar->post_title;
                  $sidebar_contents = $sidebar->post_excerpt;
                  $sidebar_content = wp_trim_words($sidebar_contents, 5, '...');   
              ?>
                  <li>
                      <div class="media d-flex mb-3">
                          <div class="flex-shrink-0">
                              <a href="<?php echo get_permalink($sidebar_id); ?>"><img src="<?php echo $sidebar_image; ?>" alt="<?php echo $sidebar_title; ?>"></a>
                          </div>
                          <div class="flex-grow-1 ms-3">
                              <a href="<?php echo get_permalink($sidebar_id); ?>"><h4 class="sidebar-title"><?php echo $sidebar_title; ?></h4></a>
                              <p><?php echo $sidebarr_content; ?></p>
                          </div>
                      </div>
                  </li>
              <?php } ?>
          </ul>
      <?php
          }
  ?>
  </div>
 </section>

<section class="tab">
  <div class="container">
  <?php $categories = get_terms( 'category'); ?>
  <div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

  <?php foreach ($categories as $ckey => $category) { ?>
    <button class="nav-link <?php if ( $ckey == 0 ){ echo 'active'; } ?>" id="v-pills-<?php echo $category->name; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $category->name; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $category->name; ?>" aria-selected="true"><?php echo $category->name; ?></button>
    <?php $ckey++; } ?>
  </div>
  <div class="tab-content" id="v-pills-tabContent">

    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words</div>

    
  </div>
</div>
  </div>
</section>
  
<?php get_footer(); ?>