<?php 
/**
* Template Name: Page: Home
**/
get_header(); 

  $title = get_field('title_hb');
  $capsuleImage = get_field('capsule_image_hb');
  $capsuleBtnImage = get_field('capsule_btn_image_hb');

  $word_1 = get_field('sub_title_2');
  $word_2 = get_field('sub_title_1');
  $description = get_field('description_hb');
  $button = get_field('button_hb');

?>

<main>
      <section class="hero_banner">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-content">
                <?php if($title || $capsuleImage ){ ?>
                <div class="top" data-aos="fade-right">
                  <?php if($title){ ?>
                    <h1><?php echo $title; ?></h1>
                  <?php } ?>
                  <?php if($capsuleImage){ ?>
                    <div class="badge_pill">
                      <img
                        src="<?php echo $capsuleImage['url'];?>" 
                        alt="<?php echo $capsuleImage['alt'];?>"
                        height="<?php echo $capsuleImage['height'];?>"
                        width="<?php echo $capsuleImage['width'];?>"
                        class="desktop"
                        loading="lazy"
                      />
                    </div>
                  <?php } ?>
                </div>
                <?php } ?>
                <div class="middle" data-aos="fade-left" data-aos-delay="500">
                  <?php if($capsuleImage){ ?>
                    <div class="badge_pill">
                      <img
                        src="<?php echo $capsuleImage['url'];?>" 
                        alt="<?php echo $capsuleImage['alt'];?>"
                        height="<?php echo $capsuleImage['height'];?>"
                        width="<?php echo $capsuleImage['width'];?>"
                        class="mob"
                        loading="lazy"
                      />
                    </div>
                  <?php } ?>
                   <?php if($word_2){ ?>
                      <h2><?php  echo $word_2; ?></h2>
                    <?php } ?>
                     <?php if($description){ ?>
                      <p><?php  echo $description; ?></p>
                    <?php } ?>
                </div>
                <div class="bottom" data-aos="fade-up" data-aos-delay="1000">
                  <div class="video_pill" style="background: url(<?php echo $capsuleBtnImage['url']; ?>) no-repeat center / contain;">
                    <img
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play-icon.svg"
                      height="45"
                      width="45"
                      alt="play-icon"
                      loading="lazy"
                    />
                  </div>
                   <?php if($word_1){ ?>
                      <h3><?php  echo $word_1; ?></h3>
                    <?php } ?>
                  
                </div>
              </div>
               <?php if($description){ ?>
                  <div class="mob_text">
                    <p><?php  echo $description; ?></p>
                  </div>
                <?php } 
                
                    $bannerButton = get_field('button_hb');
                       if($bannerButton){ 
                          $bannerButton_url = $bannerButton['url'];
                          $bannerButton_title = $bannerButton['title'];
                          $bannerButton_target = $bannerButton['target'] ? $bannerButton['target'] : '_self';
                      ?>
                        <div
                          class="banner_btn text-center"
                          data-aos="fade-up"
                          data-aos-delay="1500"
                        >
                          <a href="<?php echo $bannerButton_url; ?>" class="primary_btn"><?php echo $bannerButton_title; ?></a>
                        </div>
                  <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <?php 
      
      
      $serving = get_field('serving_hic');
      $Number_1 = get_field('number_1_hic');
      $happyClients = get_field('happy_clients_hic');

      $Number_2 = get_field('number_2_hic');
      $projects = get_field('projects_hic');
      $Number_3 = get_field('number_3_hic');
      $yearExp = get_field('year_of_exp_hic');
      
      ?>
      <section class="happy_clients">
        <div class="container">
          <div class="count_wrapper">
             <?php if($serving || $Number_1 || $happyClients){ ?>
            <div class="inner_wrapper">
              <p>
                <?php echo $serving; ?>
                <?php if($Number_1){ ?>
                  <span class="count plus" data-target="<?php echo $Number_1; ?>"><?php echo $Number_1; ?></span>
                <?php } ?>
                <?php if($happyClients){ ?>
                 <?php echo $happyClients; ?>
                <?php } ?>
              </p>
            </div>
            <?php } ?>
            <?php if($Number_2 || $projects){ ?>
            <div class="inner_wrapper">
              <p>
                <?php if($Number_1){ ?>
                  <span class="count plus" data-target="<?php echo $Number_2; ?>"><?php echo $Number_2; ?></span>
                <?php } ?>
                 <?php echo $projects; ?>
              </p>
            </div>
            <?php } ?>
            <?php if($Number_3 || $yearExp){ ?>
            <div class="inner_wrapper">
              <p>
                <?php if($Number_3){ ?>
                  <span class="count" data-target="<?php echo $Number_3; ?>"><?php echo $Number_3; ?></span>
                <?php } ?>
                 <?php echo $yearExp; ?>
              </p>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>

      <?php 
        $title = get_field('title_ht');
        $description = get_field('description_ht');
        

        $teamTitle = get_field('team_title_ht');
        $team = get_field('team_ht');

      ?>

      <section class="who_we_are">
        <div class="container">
          <div class="row">
            <?php if($title || $button_cta){ ?>
                <div class="col-xxl col-lg-3 col-md-5" data-aos="fade-right">

                  <div class="left_wrapper">
                    <?php if($title){ ?>
                      <h2 class="sec_hdng"> <?php echo $title; ?></h2>
                    <?php }
                    
                    $button_cta = get_field('button_cta_ht');
                          if($button_cta){ 
                              $button_cta_url = $button_cta['url'];
                              $button_cta_title = $button_cta['title'];
                              $button_cta_target = $button_cta['target'] ? $button_cta['target'] : '_self';
                          ?>

                    <a href="<?php echo $button_cta_url; ?>" class="primary_btn"><?php echo $button_cta_title; ?></a>
                    <?php } ?>
                  </div>
                </div>
            <?php } ?>
            <?php if($description){ ?>
            <div class="col-xxl col-lg-6 col-md-7" data-aos="fade-up">
              <div class="middle_wrapper">
                <?php echo $description; ?>
              </div>
            </div>
            <?php } ?>
            <?php if($team){ ?>

            <div class="col-xxl col-lg-3 col-md-12" data-aos="fade-left">
              <div class="right_wrapper">
                <?php if($teamTitle){ ?>
                <h3 class="sec_hdng">
                 <?php echo  $teamTitle; ?>
                </h3>
                <?php } ?>
                <div class="teams_wrapper">
                  <?php foreach( $team as $image ): ?>
                  <div class="team">
                    <img
                      src="<?php echo esc_url($image['url']); ?>"
                      alt="<?php echo esc_attr($image['alt']); ?>"
                      height="<?php echo $image['height'];?>"
                      width="<?php echo $image['width'];?>"
                      loading="lazy"
                    />
                  </div>
                <?php endforeach; ?>
                  <a class="add_team" type="button" title="Add-team">
                    <img
                      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/plus-icon-white.svg"
                      alt="plus-icon-white"
                      loading="lazy"
                    />
                  </a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>

      <?php 

          $title = get_field('title_ha');
          $description = get_field('description_ha');
         // $button = get_field('button_ha');

          $storyImage = get_field('our_story_image_ha');
          $storyIcon = get_field('our_story_icon_ha');
          $story = get_field('our_story_ha');
          $storyTitle = get_field('our_story_title_ha');

          $visionIcon = get_field('our_vison_icon_ha');
          $vision = get_field('our_vision_ha');
          $visionTitle = get_field('our_vision_ha_title');

          $missionIcon = get_field('our_mission_icon');
          $mission = get_field('our_mission_ha');
          $missionTitle = get_field('our_mission_title_ha');

        ?>


      <section class="about_us">
        <div class="container">
          <div class="head">
            <div class="row align-items-center gx-0 gy-3">

              <div class="col-md-7" data-aos="fade-right">
                <?php if($title){ ?>
                  <h2 class="sec_hdng line_bottom">
                  <?php echo $title; ?>
                  </h2>
                <?php }  ?>
                <?php if($title){ ?>
                  <p><?php echo $description; ?></p>
                <?php } ?>
              </div>

              <?php 
               $button_cta = get_field('button_ha');
                          if($button_cta){ 
                              $button_cta_url = $button_cta['url'];
                              $button_cta_title = $button_cta['title'];
                              $button_cta_target = $button_cta['target'] ? $button_cta['target'] : '_self';
                          ?>

                    <div class="col-md-5" data-aos="fade-left">
                      <div class="btn_wrapper text-md-end">
                        <a href="<?php echo $button_cta_url; ?>" class="primary_btn"><?php echo $button_cta_title; ?></a>
                      </div>
                    </div>
              <?php } ?>
            </div>
          </div>
          <div class="row gy-4 align-items-center">
            <div class="col-lg-7">
              <div class="img_wrapper left-to-right-animate">
                <?php if($storyImage){ ?>
                  <img
                    src="<?php echo $storyImage['url'];?>"
                    alt="<?php echo $storyImage['alt'];?>"
                    height="<?php echo $storyImage['height'];?>"
                    width="<?php echo $storyImage['width'];?>"
                    loading="lazy"
                  />
                <?php } ?>
                <?php if($story){ ?>
                  <div class="icon_box">
                    <?php if($storyIcon){ ?>
                      <img
                        src="<?php echo $storyIcon['url'];?>"
                        alt="<?php echo $storyIcon['alt'];?>"
                        height="<?php echo $storyIcon['height'];?>"
                        width="<?php echo $storyIcon['width'];?>"
                        loading="lazy"
                      />
                    <?php } ?>
                     <?php if($storyTitle) { ?>
                        <h3 class="title"><?php echo $storyTitle; ?></h3>
                      <?php } ?>
                   
                      <?php if($story) { ?>
                        <p><?php echo $story; ?></p>
                      <?php } ?>
                  </div>
                  <?php } ?>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="text_wrapper bottom-to-top-animate">
                <?php if($vision){ ?>
                  <div class="icon_box">
                      <?php if($visionIcon){ ?>
                      <img
                        src="<?php echo $visionIcon['url'];?>"
                        alt="<?php echo $visionIcon['alt'];?>"
                        height="<?php echo $visionIcon['height'];?>"
                        width="<?php echo $visionIcon['width'];?>"
                        loading="lazy"
                      />
                    <?php } ?>
                    <?php if($visionTitle){ ?>
                      <h3 class="title"><?php echo $visionTitle; ?></h3>
                    <?php } ?>
                    <p>
                     <?php echo $vision; ?>
                    </p>
                  </div>
                <?php } ?>
                <?php if($mission){ ?>
                  <div class="icon_box">
                     <?php if($missionIcon){ ?>
                      <img
                        src="<?php echo $missionIcon['url'];?>"
                        alt="<?php echo $missionIcon['alt'];?>"
                        height="<?php echo $missionIcon['height'];?>"
                        width="<?php echo $missionIcon['width'];?>"
                        loading="lazy"
                      />
                    <?php } ?>
                     <?php if($missionTitle){ ?>
                      <h3 class="title"><?php echo $missionTitle; ?></h3>
                    <?php } ?>
                    <p>
                      <?php echo $mission; ?>
                    </p>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>

        <?php 
          $title = get_field('title_hsa');
          $description = get_field('description_hsa');
        ?>

     <?php if(have_rows('strategy_hsa')) {?>

        <section class="effective_strategic">
          <div class="container">
            <div class="head text-center" data-aos="fade-up">
              <?php if($title){ ?>
                <h2 class="sec_hdng line_bottom center">
                   <?php echo $title; ?>
                </h2>
              <?php } ?>
               <?php if($description){ ?>
              <p>
                <?php echo $description; ?>
              </p>
              <?php } ?>
            </div>
            <div class="services_wrap">
              <div class="row gy-sm-5 gy-4">
              
                  <?php $i=1; while(have_rows('strategy_hsa')) {
                    the_row();

                     switch ($i) {
                        case 1:
                            
                            $data_aos = 'data-aos-delay="500"';
                            $data_delay = '';
                            break;
                        case 2:
                            $data_aos = 'data-aos="zoom-in"';
                            $data_delay = 'data-aos-delay="300"';
                            break;
                        case 3:
                            $data_aos = 'data-aos="fade-left"';
                            $data_delay = 'data-aos-delay="500"';
                            break;
                        default:
                        $data_aos = '';
                        $data_delay = '';
                  }
                  ?>
                <div class="col-lg-4" <?php echo $data_aos ." ".$data_delay;?> > 
                  <div class="inner_wrapper">
                    <h3 class="num_val"><?php echo $i; ?></h3>
                    <div class="breif">
                      <?php if(get_sub_field('title_sin')){?>
                        <h4 class="title"><?php echo get_sub_field('title_sin'); ?></h4>
                      <?php } ?>

                      <?php if(get_sub_field('description_sin')){?>
                        <p><?php echo get_sub_field('description_sin'); ?></p>
                      <?php } ?>
                      
                    </div>
                  </div>
                </div>
               <?php $i++; } ?> 
              </div>
            </div>
          </div>
        </section>
      <?php } ?>



    <?php 

      $postPerPage = 10;
      $tax_args   = array( 'relation' => 'AND' );
      $meta_args  = array('relation' => 'AND');

        $args = array(
        
            'posts_per_page'   => $postPerPage,
            'post_type' => 'service',
            'post_status' => 'publish',
            'meta_query' => $meta_args,
            'tax_query' => $tax_args,
            'order'   => 'DESC',
          );

      $services = new WP_Query( $args );

      
  

      if($services->have_posts()){ 
        
        
          $title = get_field('title_hs');
          $description = get_field('description_hs');
          $cta = get_field('button_hs');
          $secImg = get_field('section_image_hs');
      
        ?>
        

          <section class="our_service">
            <div class="row gy-3">
              <div class="col-lg-5">
                <?php if($secImg){ ?>
                    <div class="img_wrap">
                      <img
                        src="<?php echo $secImg['url']; ?>"
                        alt="<?php echo $secImg['alt']; ?>"
                        height="<?php echo $secImg['height'];?>"
                        width="<?php echo $secImg['width'];?>"
                        loading="lazy"
                      />
                    </div>
                <?php } ?>
              </div>
              <div class="col-lg-7">
                <div class="text_wrapper">
                  <div class="head" data-aos="fade-up">
                    <?php if($title){ ?>
                      <h2 class="sec_hdng line_bottom">
                       <?php echo $title; ?>
                      </h2>
                    <?php } ?>
                    <?php if($description){ ?>
                    <p>
                      <?php echo $description; ?>
                    </p>
                    <?php } ?>
                  </div>
                  <div class="slider_wrapper">
                    <!-- Swiper -->
                    <div class="swiper service_swiper">
                      <div class="swiper-wrapper">

                      <?php while ($services->have_posts()){ 
                        $services->the_post(); 

                          $icon = get_field('service_icon');
          
                        ?>


                        <div class="swiper-slide">
                          <?php if(has_post_thumbnail()){?>
                          <div class="slider_img_wrap">
                            <?php the_post_thumbnail(); ?>

                            <?php if($icon){ ?>
                              <div class="icon_wrap">
                                  <img
                                      src="<?php echo $icon['url']; ?>"
                                      alt="<?php echo $icon['alt']; ?>"
                                      height="<?php echo $icon['height'];?>"
                                      width="<?php echo $icon['width'];?>"
                                      loading="lazy"
                                    />
                              </div>
                            <?php }?>
                          </div>
                          <?php } ?>
                          <div class="content_wrap">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="arrow_btn">Learn More</a>
                          </div>
                        </div>

                      <?php } ?>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

       <?php wp_reset_postdata();
       } 
       
      
          $title = get_field('title_hp');
          $description = get_field('description_hp');
          $galleryRightImage = get_field('gallery_right_hp');
          $galleryLeftImage = get_field('gallery_left_hp');
          $cta = get_field('button_hp');
       
       ?>   




      <section class="what_makes_us">
        <div id="tsparticles"></div>
        <div class="container">
          <div class="inner_wrapper" data-aos="zoom-in">
            <?php if($title){ ?>
              <h2 class="sec_hdng line_bottom center">
                <?php echo $title; ?>
              </h2>
            <?php } ?>
             <?php if($description){ ?>
            <p>
              <?php echo $description; ?>
            </p>
            <?php } ?>
            <?php ?>
                  <?php 

               $button_cta = $cta;
                  if($button_cta){ 
                      $button_cta_url = $button_cta['url'];
                      $button_cta_title = $button_cta['title'];
                      $button_cta_target = $button_cta['target'] ? $button_cta['target'] : '_self';
                  ?>
            <div class="btn_wrapper">
              <a href="<?php echo $button_cta_url; ?>" class="primary_btn" target="<?php echo $button_cta_target; ?>">
                <?php echo $button_cta_title; ?>
              </a>
            </div>
            <?php } ?>

            <?php $i=1; foreach($galleryRightImage as $image){ ?>
           
            <img
              src="<?php echo $image['url']; ?>"
              alt="<?php echo $image['alt']; ?>"
              height="<?php echo $image['height'];?>"
              width="<?php echo $image['width'];?>"
              class="right-<?php echo $i; ?>"
              loading="lazy"
            />
            <?php $i++; } ?>

            <?php $i=1; foreach($galleryLeftImage as $image){ ?>
           
            <img
              src="<?php echo $image['url']; ?>"
              alt="<?php echo $image['alt']; ?>"
              height="<?php echo $image['height'];?>"
              width="<?php echo $image['width'];?>"
              class="left-<?php echo $i; ?>"
              loading="lazy"
            />
            <?php $i++; } ?>
            
          </div>
        </div>
      </section>

      <?php  
      
        $title = get_field('tittle_hlw');
        $description = get_field('description_hlw'); 
      ?>

      <section class="our_works">
        <div class="container">
          <div class="head">

          <?php if($title){ ?>
              <h2 class="sec_hdng line_bottom" data-aos='fade-right'>
                <?php echo $title; ?>
              </h2>
            <?php } ?>
            
            <div class="head_wrapper">
               <?php if($description){ ?>
              <p data-aos='fade-right'>
                <?php echo $description; ?>
              </p>
              <?php } ?>
             
              <div class="tab_btn_wrapper" data-aos='fade-left'>
                <ul>
                  <li class="active" data-filter="*">All</li>
                 <?php
                  $terms = get_terms([
                      'taxonomy'   => 'works-category',
                      'hide_empty' => true, // set false if you want empty terms too
                  ]);

                  if ( ! empty($terms) && ! is_wp_error($terms) ) :
                      foreach ( $terms as $term ) :
                  ?>
                          <li data-filter="<?php echo esc_attr($term->slug); ?>">
                              <?php echo esc_html($term->name); ?>
                          </li>
                  <?php
                      endforeach;
                  endif;
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab_content_wrapper" data-aos='fade-up'>
            <div class="tab_content">

              <?php
              $terms = get_terms([
                  'taxonomy'   => 'works-category',
                  'hide_empty' => true,
              ]);

              if ( ! empty($terms) && ! is_wp_error($terms) ) :

                  foreach ( $terms as $term ) :

                      $work_query = new WP_Query([
                          'post_type'      => 'work',
                          'posts_per_page' => 5,
                          'orderby' => 'date',
                          'order' => 'DESC',
                          'tax_query'      => [
                              [
                                  'taxonomy' => 'works-category',
                                  'field'    => 'slug',
                                  'terms'    => $term->slug,
                              ],
                          ],
                      ]);

                      if ( $work_query->have_posts() ) :
                          while ( $work_query->have_posts() ) :
                              $work_query->the_post();
                          ?>

                          <div class="grid-item" data-category="<?php echo esc_attr($term->slug); ?>">
                              <div class="inner_wrapper">

                                  <?php if ( has_post_thumbnail() ) : ?>
                                      <!-- <img 
                                          src="<?php //echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'large') ); ?>" 
                                          alt="<?php //the_title_attribute(); ?>" 
                                           height="<?php // echo $image['height'];?>"
                                          width="<?php //echo $image['width'];?>"
                                          loading="lazy"
                                      > -->

                                      <?php the_post_thumbnail(); ?>
                                  <?php endif; ?>

                                  <div class="inner_cont">
                                      <h3 class="title"><?php the_title(); ?></h3>

                                      <?php if ( has_excerpt() ) : ?>
                                          <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                                      <?php endif; ?>

                                      <div class="link_wrapper">
                                          <a href="<?php the_permalink(); ?>">View Project</a>
                                      </div>
                                  </div>

                              </div>
                          </div>

                        <?php
                          endwhile;
                          wp_reset_postdata();
                      endif;

                  endforeach;
              endif;
              ?>
            </div>
        </div>
        </div>
      </section>

      <?php 

          $testimonial_query = new WP_Query([

          'post_type'      => 'testimonial',
          'posts_per_page' => 15,
          'orderby' => 'id',
          'order' => 'ASC',
      ]);

      if ( $testimonial_query->have_posts() ) { 
        
            $testimonialTitle = get_field('testimonial_title');
        
        ?>



      <section class="testimonials">
        <img
          src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/testimonial-bg.svg"
          alt="testimonial-bg"
          class="bg-wave"
        />
        <div class="container">
          <div class="avatars">

            <?php

               $i = 1;

                while ($testimonial_query->have_posts() ) {

                        $testimonial_query->the_post();


                        if(has_post_thumbnail()){

                          $testImage = get_the_post_thumbnail_url(); 
                          $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                          $image_data   = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                          $height = $image_data[2];
                          $width  = $image_data[1];
                        }else{
                           $testImage = get_stylesheet_directory_uri() .'/assets/images/client-2.png'; 
                           $height = '130';
                           $width  = '130';
                        }
                        
                  ?>

                      <img
                        src="<?php echo $testImage; ?>"
                        class="avatar"
                        data-slide="<?php echo $i; ?>"
                        alt="<?php the_title(); ?>"
                        height='<?php echo $height; ?>'
                        width='<?php echo  $width; ?>'
                        loading="lazy"
                      />

                <?php $i++;} ?>
          </div>

 
        
          <div class="content" data-aos="fade-up">
              <?php if($testimonialTitle){ ?>
                <h2 class="sec_hdng line_bottom center">
                  <?php echo $testimonialTitle; ?>
                </h2>
              <?php } ?>


            <div class="swiper testimonial_swiper">
              <div class="swiper-wrapper">
                <?php
                $j = 1;
                 while ($testimonial_query->have_posts() ) {

                        $testimonial_query->the_post(); ?>

                    <div class="swiper-slide" data-slide="<?php echo $j; ?>">
                        <?php the_content(); ?>
                      <span><?php the_title(); ?></span>
                    </div>

                <?php $j++;} ?>
              </div>
            </div>
            <!-- <a href="#" class="primary_btn">See All</a> -->
          </div>
        </div>
      </section>

      <?php } ?>

      <?php 

       $gallery_query = new WP_Query([

          'post_type'      => 'gallery',
          'posts_per_page' => 15,
          'orderby' => 'id',
          'order' => 'ASC',
          'tax_query'      => [
              [
                  'taxonomy' => 'gallery-category',
                  'field'    => 'slug',
                  'terms'    => 'home-gallery',
              ],
          ],
      ]);

      if ( $gallery_query->have_posts() ) { 
        
            $galleryTitle = get_field('gallery_title_hg');
        
        ?>

          <section class="our_gallery">
            <div class="container">
              <?php if($galleryTitle){ ?>
                <div class="head text-center mb-md-4 mb-3">
                  <h2 class="sec_hdng line_bottom center">
                   <?php echo $galleryTitle; ?>
                  </h2>
                </div>
              <?php } ?>
              <div class="gallery_wrapper">
                <?php 
                  
                  while ( $gallery_query->have_posts() ) {

                          $gallery_query->the_post();

                          $thubImg = get_field('thumbnail_image');
                          $mainImg = get_field('main_image');
                                  
                    ?>
                      <a href="<?php echo $mainImg['url']; ?>" class="img_wrap">
                        <img
                          src="<?php echo $thubImg['url']; ?>"
                          alt="<?php echo $thubImg['alt']; ?>"
                          height="<?php echo $thubImg['height'];?>"
                          width="<?php echo $thubImg['width'];?>"
                          loading="lazy"
                        />
                      </a>
                <?php } ?>
                
              </div>
            </div>
          </section>
      <?php wp_reset_query(); } 
    
        get_template_part('/template-parts/footer-form');

      ?>

      

    </main>
    <?php 
    $capsule_button_video = get_field('capsule_button_video');

    if($capsule_button_video) : ?>
      <div class="elv_popup">
        <div class="popup_wrapper">
          <div class="cross">X</div>
          <video src="<?php echo get_field('capsule_button_video')['url']; ?>" controls></video>
        </div>
      </div>
  <?php endif; ?>

<?php get_footer(); ?>