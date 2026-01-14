<?php

get_header(); 

    
?>

  <main>
    <section class="inner_page_cmn_banner career-inner-sc">
      <div class="container">
        <div class="inner_text" data-aos="fade-up">
          <h1 class="main_hdng">find your dream <br />J<span class="o_wrap">o<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow_img.svg"
                alt="arrow_img"></span>bs in Elvira</h1>
        </div>
      </div>
    </section>
    
    <section class="careers-wrapper career-det-wp" data-aos="fade-up">
      <div class="container ">
        <!-- Job Item -->
        <div class="career-job-card">
          <div class="row align-items-center gy-lg-0 gy-3">
            <div class="col-lg-8 career-job-info ">
              <h4 class="career-job-title"><?php the_title(); ?></h4>

              <?php 
              
              
                $location = get_field('location_jobs');
                $experience = get_field('experience_jobs'); 
                $vacancy = get_field('vacancy_jobs');

                $urgent = get_field('job_urgent');
                $availibilty = get_field('job_availibilty');

              
              
              ?>
              <ul class="career-job-meta">
                <?php if ($location) : ?>
                  <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loc.svg" alt="">
                    <?php echo esc_html($location); ?>
                  </li>
                <?php endif; ?>
                <?php if ($experience) : ?>
                <li>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hand.svg" alt="">
                  <?php echo esc_html($experience); ?>
                </li>
              <?php endif; ?>
              <?php if ($vacancy) : ?>
                <li>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bag.svg" alt="">
                  <?php echo esc_html($vacancy); ?>
                </li>
            <?php endif; ?>
              </ul>
            </div>
                <div class="col-lg-4 career-job-action text-lg-end">

                  <?php if ($urgent) : ?>
                    <span class="career-job-urgent">Urgent</span>
                  <?php endif; ?>

                  <?php if ($availibilty) : ?>
                    <a href="#apply-job-form" class="career-apply-btn primary_btn">
                      Apply Now
                    </a>
                  <?php endif; ?>

                </div>

            </div>
          </div>
          <div class="job-content ">
             <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
    

    <?php if ($availibilty) : 
      
      $fromText = get_field('title_apply', 'option');
      $imageApply = get_field('image_apply_form', 'option');
      
      
      ?>
    <section class="apply-job-sec" id="apply-job-form">
      <!-- uplocd-cv-form -->
      <div class="container">
        <div class="apply-job ">
          <div class="apply-form  apply-frm">
            <?php if ($fromText) : ?>
              <div class="apply-frm-header mb-2">
                <h5 class="apply-frm-title">
                  <?php echo esc_html($fromText); ?>
                </h5>
              </div>
            <?php endif; ?>
            
            <div class="apply-frm-tag-img">
               <?php if ($imageApply) : ?>
                <img
                    src="<?php echo $imageApply['url']; ?>"
                    alt="<?php echo $imageApply['alt']; ?>"
                    height="<?php echo $imageApply['height'];?>"
                    width="<?php echo $imageApply['width'];?>"
                  />
              <?php endif; ?>
                 <?php echo do_shortcode(get_field('shortcode_text_carrier_form', 'option')); ?>  
            </div>
          </div>
        </div>
      </div>
      <!-- uplocd-cv-form -->
    </section>
    <?php endif; ?>

   </main> 
    <?php get_template_part('/template-parts/footer-form'); ?>


    <script>
      jQuery(document).ready(function ($) {
        var jobTitle = $('.career-job-title').text();

          $(".selected_job_role input").val(jobTitle);
          $(".selected_job_role").css("pointer-events", "none").css("opacity","0.6");
          
     
      });
    </script>

    <?php get_footer(); ?>