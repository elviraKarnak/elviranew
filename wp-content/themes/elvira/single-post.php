<?php

get_header(); 

    if(have_posts()) : while (have_posts() ) : the_post(); 
?>

    <main>
      <section class="inner_page_cmn_banner">
        <div class="container">
          <div class="inner_text" data-aos="fade-up">
            <h1 class="main_hdng">OUR Latest bl<span class="o_wrap">O<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_img.svg" alt="arrow_img"></span>gs</h1>
          </div>
        </div>
      </section>


     



      <section class="blogs_details pt_50 pb_50">
        <div class="container">
          <div class="inner_article">
            <div class="head" data-aos="fade-right" data-aos-delay="100">
              <h2 class="sec_hdng"><?php the_title(); ?></h2>
              <div class="date_wrapper">
                  <p><?php echo get_the_date('jS M, Y'); ?></p>
                  <small><?php echo estimated_reading_time(get_the_content()); ?> min read</small>
              </div>
            </div>

        <?php 
    
            $thumb_id = get_post_thumbnail_id(get_the_ID());

            if ($thumb_id) {

                $img_src = wp_get_attachment_image_src($thumb_id, 'large');
                $img_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

                $img_url    = $img_src[0];
                $img_width  = $img_src[1];
                $img_height = $img_src[2];
            ?>


            <div class="featured_img" data-aos="fade-right" data-aos-delay="200">
              <img 
                src="<?php echo esc_url($img_url); ?>"
                width="<?php echo esc_attr($img_width); ?>"
                height="<?php echo esc_attr($img_height); ?>"
                alt="<?php echo esc_attr($img_alt ? $img_alt : get_the_title()); ?>"
                loading="lazy"
                decoding="async"
            >
            </div>
        <?php } ?>

        
            <div class="blog_content" data-aos="fade-right" data-aos-delay="300">
                <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>

    <?php endwhile; endif; ?>

    <?php

	$args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => [get_the_ID()],
				//'paged'          => $paged,
    	];

		 // Category filter
    // if (!empty($cats) && !in_array('*', $cats)) {
    //     $args['tax_query'] = [[
    //         'taxonomy' => 'category',
    //         'field'    => 'term_id',
    //         'terms'    => array_map('intval', $cats),
    //         'operator' => 'IN',
    //     ]];
    // }
        $blog_query = new WP_Query($args); ?>

          <?php if ( $blog_query->have_posts() ) :?>
      

      <section class="blogs_listing pt_50 pb_50">
        <div class="container">
          <div class="head">
            <h2 class="sec_hdng line_bottom mb-md-5 mb-4">Our Recent <span>Blogs</span></h2>
          </div>
          <div class="blogs_wrapper" data-aos="zoom-in">
            <div class="row gy-3">

                <?php  while ($blog_query->have_posts() ) :
                              
                    $blog_query->the_post();

                    ?>
                        <div class="col-lg-4 col-md-6 col-12 tab_cont" data-category="design">
                          <div class="inner_wrapper">
                              <a href="<?php the_permalink(); ?>">
                            <div class="featured_img">
                             <?php
                                $thumb_id = get_post_thumbnail_id(get_the_ID());

                                if ($thumb_id) {

                                    $img_src = wp_get_attachment_image_src($thumb_id, 'large');
                                    $img_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

                                    $img_url    = $img_src[0];
                                    $img_width  = $img_src[1];
                                    $img_height = $img_src[2];
                                ?>
                                    <img 
                                        src="<?php echo esc_url($img_url); ?>"
                                        width="<?php echo esc_attr($img_width); ?>"
                                        height="<?php echo esc_attr($img_height); ?>"
                                        alt="<?php echo esc_attr($img_alt ? $img_alt : get_the_title()); ?>"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                <?php } ?>
                                                            </div>
                                                            </a>
                                <div class="date_wrapper">
                                    <p>
                                        <?php echo get_the_date('jS M, Y'); ?>
                                    </p>
                                    <small>
                                        <?php echo estimated_reading_time(get_the_content()); ?> min read
                                    </small>
                                </div>
                                  <a href="<?php the_permalink(); ?>">
                                        <div class="title">
                                        <h3><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                <div class="cont">
                                <p><?php echo wp_trim_words(get_the_excerpt(), 16, '...' );?></p>
                                </div>
                                  <div class="read_more_btn">
                                    <a href="<?php the_permalink(); ?>">Read More</a>
                                  </div>
                            </div>
                          </div>

                  <?php endwhile; ?>
            </div>
          </div>
        </div>
      </section>

     <?php
          else :
              echo '<p class="no-posts">No blogs found.</p>';
          endif;
            wp_reset_postdata();
       //<!-- Webdevelopment Start-->
         get_template_part('/template-parts/development-path'); ?>

       <!-- Webdevelopment end --> 
      <?php get_template_part('/template-parts/footer-form'); ?>
    
    </main>


<?php get_footer(); ?>