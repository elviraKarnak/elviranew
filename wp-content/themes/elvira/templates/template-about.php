<?php 
/**
* Template Name: Page: About
**/
get_header(); 

?>

<main>
      <!-- Banner Section start -->
          <section class="inner_page_cmn_banner">
            <div class="container">
              <div class="inner_text" data-aos="fade-up">
                      <?php
            $title_before = get_field('title_before');
            $title_after  = get_field('title_after');
            $arrow_image  = get_field('arrow_image');
            ?>

            <?php if ($title_before || $title_after): ?>
            <h1 class="main_hdng">
              <?php echo $title_before; ?><span class="o_wrap">O<?php if ($arrow_image): ?><img src="<?php echo esc_url($arrow_image['url']); ?>" alt="<?php echo esc_attr($arrow_image['alt']); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" 
    height="<?php echo esc_attr( $image['height'] ); ?>"    loading="lazy"><?php endif; ?></span><?php echo $title_after; ?>
            </h1>
            <?php endif; ?>
              </div>
            </div>
          </section>
      <!-- Banner Section ends -->
      
      <!-- Happy-clients Section start -->
      <?php
$title       = get_field('happy_client_title');
$image       = get_field('happy_client_image');
$description = get_field('client_description');
?>
<section class="happy_clients abt_page">
  <div class="container">

    <?php if ($title || $image): ?>
    <div class="head text-center" data-aos="zoom-in">
      <?php if ($title): ?>
        <h2 class="sec_hdng line_bottom center">
          <?php echo $title ; ?>
        </h2>
      <?php endif; ?>
     <img 
    src="<?php echo esc_url( $image['url'] ); ?>" 
    alt="<?php echo esc_attr( $image['alt'] ); ?>" 
    width="<?php echo esc_attr( $image['width'] ); ?>" 
    height="<?php echo esc_attr( $image['height'] ); ?>" 
    loading="lazy"
>
    </div>
    <?php endif; ?>
    <div class="row gy-3">
      <!-- LEFT CONTENT -->
       
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
        <div class="text_wrapper">
          <?php if ($description): ?>
            <p><?php echo ($description); ?></p>
          <?php endif; ?>
        </div>
      </div>

      <!-- RIGHT COUNTERS -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
        <div class="count_wrapper">

          <?php if (have_rows('happy_client_counter')): ?>
            <?php while (have_rows('happy_client_counter')): the_row(); 
              $count = get_sub_field('count_number');
              $plus  = get_sub_field('count_plus');
              $text  = get_sub_field('count_text');
            ?>
              <div class="inner_wrapper">
                <span 
                  class="count <?php echo $plus ? 'plus' : ''; ?>" 
                  data-target="<?php echo esc_attr($count); ?>">
                  <?php echo ($count); ?>
                </span>
                <?php if ($text): ?>
                  <p><?php echo ($text); ?></p>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>
</section>
      <!-- Happy-clients Section ends -->

      <!-- Our Missionn Vision Start-->
       <?php
$mision_text = get_field('mision_text');
$mision_descriptrion  = get_field('mision_descriptrion');
$mision_image   = get_field('mision_icon');
?>

<section class="our_mission_vision">
  <div class="container">
    <div class="row gy-5">

      <!-- LEFT CONTENT -->
      <div class="col-md-6" data-aos="fade-right">
        <div class="left_wrapper">
          <div class="icon_card_wrapper">
            <div class="head">
              <?php if ($mision_image): ?>
                <img 
                          src="<?php echo esc_url( $mision_image['url'] ); ?>" 
            alt="<?php echo esc_attr( $mision_image['alt'] ); ?>" 
            width="<?php echo esc_attr( $mision_image['width'] ); ?>" 
            height="<?php echo esc_attr( $mision_image['height'] ); ?>" >
              <?php endif; ?>

              <?php if ($mision_text): ?>
                <h3 class="sec_hdng">
                  <?php echo $mision_text ; ?>
                </h3>
              <?php endif; ?>
            </div>
            <?php if ($mision_descriptrion): ?>
              <div class="body">
                <p><?php echo $mision_descriptrion; ?></p>
              </div>
            <?php endif; ?>
          </div>
           <?php
$vision_text = get_field('vision_text');
$vision_icon  = get_field('vision_icon');
$vision_description   = get_field('vision_description');
?>
          <div class="icon_card_wrapper">
            <div class="head">
              <?php if ($vision_icon): ?>
                <img 
                          src="<?php echo esc_url( $vision_icon['url'] ); ?>" 
            alt="<?php echo esc_attr( $vision_icon['alt'] ); ?>" 
            width="<?php echo esc_attr( $vision_icon['width'] ); ?>" 
            height="<?php echo esc_attr( $vision_icon['height'] ); ?>" >
              <?php endif; ?>

            <?php if ($vision_text): ?>
                <h3 class="sec_hdng">
                  <?php echo $vision_text; ?>
                </h3>
              <?php endif; ?>
            </div>

            <?php if ($vision_description): ?>
              <div class="body">
                <p><?php echo $vision_description; ?></p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-md-6 text-end" data-aos="fade-left">
        <?php $vision_mision_image = get_field('vision_mision_image'); 
         if ($vision_mision_image): ?>
        <div class="img_wrapper">
          <img 
            src="<?php echo esc_url($vision_mision_image['url']); ?>" 
            alt="<?php echo esc_attr($vision_mision_image['alt']); ?>" 
            width="<?php echo esc_attr( $vision_mision_image['width'] ); ?>" 
            height="<?php echo esc_attr( $vision_mision_image['height'] ); ?>"
            loading="lazy">
          <div class="border_shadow"></div>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
      <!-- Our Missionn Vision Start-->
       
       <!-- Webdevelopment Start-->
        <?php   get_template_part('/template-parts/development-path'); ?>
       <!-- Webdevelopment end -->    
      <!-- Our Value Start-->
        <section class="our_value">
        <div class="container">
        <div class="head text-center" data-aos="fade-right">
              <?php
              $our_value_title = get_field('our_value_title');
              $our_value_desc  = get_field('our_value_description');
              ?>
              <?php if ($our_value_title) : ?>
                  <h2 class="sec_hdng line_bottom center">
                      <?php echo ($our_value_title); ?>
                  </h2>
              <?php endif; ?>
              <?php if ($our_value_desc) : ?>
                  <p><?php echo ($our_value_desc); ?></p>
              <?php endif; ?>
        </div>

        <div class="row g-md-5 g-4">

        <?php if (have_rows('our_values')) : 
            $delay = 100;
            while (have_rows('our_values')) : the_row();

            $icon = get_sub_field('icon');
            $value_title = get_sub_field('title');
            $value_desc  = get_sub_field('description');
        ?>
    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
        <div class="inner_card">

            <?php if ($icon) : ?>
                <figure>
                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                </figure>
            <?php endif; ?>

            <?php if ($value_title) : ?>
                <h3 class="title"><?php echo esc_html($value_title); ?></h3>
            <?php endif; ?>

            <?php if ($value_desc) : ?>
                <p><?php echo wp_kses_post($value_desc); ?></p>
            <?php endif; ?>
        </div> <!-- inner_card -->
    </div> <!-- column -->
<?php 
    $delay += 100;
    endwhile;
endif; ?>
</div>
    </div>
</section>
      <!-- Our Value end-->

      <!--Success Stories Start-->
      <section class="people_behind">
        <div class="container">
          <?php
            $success_strory_text = get_field('success_strory_text');

          if ($success_strory_text):
          ?>
            <div class="head text-center">
              <h2 class="sec_hdng line_bottom center">
                <?php echo ($success_strory_text); ?>
              </h2>
            </div>
          <?php endif; ?>
            <div class="row gy-3 gx-0">
              <?php

              $args = [
                'post_type'      => 'success-story', 
                'posts_per_page' => 25,
                'post_status'    => 'publish',
              ];

              $people_query = new WP_Query($args);
              $delay = 100;

              if ($people_query->have_posts()):
                while ($people_query->have_posts()): $people_query->the_post();
              ?>
                <div class="col-lg-3 col-md-4 col-sm-6"
                    data-aos="fade-up"
                    data-aos-delay="<?php echo esc_attr($delay); ?>">

                  <div class="inner_card">
                    <figure>
                      <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                      <?php else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dummy-img.png" alt="dummy-img">
                      <?php endif; ?>
                    </figure>
                    <div class="desc">
                <div class="desc-lft">
                  <h3 class="title"><?php the_title(); ?></h3>
                      <p><?php echo (get_field('designation')); ?></p>
                </div>
                <?php 
                  $linkedin_profile = get_field('linkedin_profile');
                  if($linkedin_profile):
                ?>
                <div class="desc-rgt">
                  <a href="<?php echo esc_url($linkedin_profile); ?>" target="_blank">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/linkedin-solid.svg" height="32" width="32" alt="linkedin">
                    </a>
                </div>  
                <?php endif; ?>  
                    </div>
                      </div>
                </div>
      <?php
        $delay += 100;
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
        </div>
      </section>
       <!--Success Stories Start end -->
       <!--Brands Works Start end -->
       <section>
       <?php
$title = get_field('brand_title');
$gallery = get_field('brands_gallery');

if ($gallery):
?>

<div class="brands_works">
  <div class="container-fluid">

    <?php if ($title): ?>
      <div class="head text-center">
        <h2 class="sec_hdng line_bottom center">
          <?php echo ($title); ?>
        </h2>
      </div>
    <?php endif; ?>

    <div class="marquee_wrapper">
      <?php
      for ($i = 0; $i < 3; $i++):
        foreach ($gallery as $image):
      ?>
        <div class="img_wrapper">
          <img src="<?php echo esc_url($image['url']); ?>"
               alt="<?php echo esc_attr($image['alt']); ?>"
               width="<?php echo esc_attr( $image['width'] ); ?>" 
               height="<?php echo esc_attr( $image['height'] ); ?>"
              >
        </div>
      <?php
        endforeach;
      endfor;
      ?>
    </div>
  </div>
</div>
<?php endif; ?>
    </section>
      <section class="testimonials">
        <img
          src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/testimonial-bg.svg"
          alt="testimonial-bg"
          class="bg-wave"
        />
        <div class="container">
          <div class="avatars">
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-1.png"
              class="avatar a1-top"
              data-slide="12"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-2.png"
              class="avatar a1-bottom"
              data-slide="11"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-3.png"
              class="avatar a2-top"
              data-slide="10"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-4.png"
              class="avatar a2-bottom"
              data-slide="9"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-5.png"
              class="avatar a3"
              data-slide="4"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-6.png"
              class="avatar a4"
              data-slide="2"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-1.png"
              class="avatar a5"
              data-slide="0"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-2.png"
              class="avatar a6"
              data-slide="1"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-3.png"
              class="avatar a7"
              data-slide="3"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-4.png"
              class="avatar a8-top"
              data-slide="8"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-5.png"
              class="avatar a8-bottom"
              data-slide="7"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-6.png"
              class="avatar a9-top"
              data-slide="6"
              alt="client"
              loading="lazy"
            />
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-1.png"
              class="avatar a9-bottom"
              data-slide="5"
              alt="client"
              loading="lazy"
            />
          </div>
          <div class="content" data-aos="fade-up">
            <h2 class="sec_hdng line_bottom center">
              What Our <span>Client Says</span>
            </h2>
            <div class="swiper testimonial_swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide" data-slide="0">
                  <p>
                    Excellent; working with Elvira Infotech was a great
                    experience. Thanks to their knowledge and determination, our
                    website looks great and functions really well.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="1">
                  <p>
                    From the very beginning they were very prompt and
                    responsive. They quickly understood my requirement and
                    quality and timeliness of there delivery exceeded my
                    expectations
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="2">
                  <p>
                    The great development team and quick turnaround on all
                    projects and needs. With the assistant, we have gained our
                    google search results.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="3">
                  <p>
                    Great ideas and on top of it all on a timely matter. Overall
                    I will honestly recommend Elvira Infotech to anyone looking
                    for a great website at a fabulous price.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="4">
                  <p>
                    They realized what I was looking for and surely did a unique
                    website for me. I am really glad. They are just amazing!!!
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="5">
                  <p>
                    I am pleased with the results, and I would recommend them to
                    people trying to develop a website.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="6">
                  <p>
                    We could not have chosen a better team of specialists to
                    represent us. They are and will remain my “development guys”
                    in the future to come.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="7">
                  <p>
                    I highly recommend you as a top website designer. Thank you,
                    guys, you are the best!!!
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="8">
                  <p>
                    Excellent; working with Elvira Infotech was a great
                    experience. Thanks to their knowledge and determination, our
                    website looks great and functions really well.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="9">
                  <p>
                    I am pleased with the results, and I would recommend them to
                    people trying to develop a website.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="10">
                  <p>
                    Great ideas and on top of it all on a timely matter. Overall
                    I will honestly recommend Elvira Infotech to anyone looking
                    for a great website at a fabulous price.
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="11">
                  <p>
                    I highly recommend you as a top website designer. Thank you,
                    guys, you are the best!!!
                  </p>
                  <span>Geralt</span>
                </div>
                <div class="swiper-slide" data-slide="12">
                  <p>
                    The great development team and quick turnaround on all
                    projects and needs. With the assistant, we have gained our
                    google search results.
                  </p>
                  <span>Geralt</span>
                </div>
              </div>
            </div>
            <!-- <a href="#" class="primary_btn">See All</a> -->
          </div>
        </div>
      </section>

    </main>

    <?php   get_template_part('/template-parts/footer-form'); ?>
    <?php get_footer(); ?>