<?php 
/**
* Template Name: Page: Service
**/
get_header(); 

?>
<main>
      <section class="inner_page_cmn_banner">
        <div class="container">
          <div class="inner_text" data-aos="fade-up">
            <h1 class="main_hdng">Services WE <br><span class="o_wrap">O<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow_img.svg" alt="arrow_img"></span>FFER</h1>
          </div>
        </div>
      </section>

      <section class="services_grid pt_100 pb_50">
          <div class="container">
            <?php $help_you_title = get_field('help_you_title');
            if($help_you_title) : ?>
    <div class="head text-center">
      <h2 class="sec_hdng line_bottom center">
        <?php echo $help_you_title; ?>
      </h2>
    </div>
  <?php endif; ?>

          <div class="row">
          <?php
          $delay = 100;
          $service_query = new WP_Query([
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          ]);
          if ($service_query->have_posts()) :
            while ($service_query->have_posts()) : $service_query->the_post();
          ?>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
          <div class="inner_card">
            <!-- ICON -->
      <?php
      $icon = get_field('service_icon');
      if ($icon) :
      ?>
        <div class="img_wrapper">
          <img 
            src="<?php echo esc_url($icon['url']); ?>"
            alt="<?php echo esc_attr($icon['alt'] ?: get_the_title()); ?>"
           width="<?php echo esc_attr($icon['width'] ); ?>"
            height="<?php echo esc_attr( $icon['height'] ); ?>"
            loading="lazy">
        </div>
      <?php endif; ?>
            <div class="cont_wrapper">
              <h3 class="title"><?php the_title(); ?></h3>

              <?php if (has_excerpt()) : ?>
                <p><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
              <?php endif; ?>
              <a href="<?php the_permalink(); ?>" class="arrow_btn">Learn More</a>
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

      <!-- Webdevelopment Start-->
        <?php   get_template_part('/template-parts/development-path'); ?>
       <!-- Webdevelopment end -->

      <?php get_template_part('/template-parts/footer-form'); ?>
    </main>
    <div class="elv_popup">
      <div class="popup_wrapper">
        <div class="cross">X</div>
        <video src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dummy_video.mp4" controls></video>
      </div>
    </div>

    <?php get_footer(); ?>