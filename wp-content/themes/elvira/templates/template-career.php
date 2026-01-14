<?php 
/**
* Template Name: Page: Career
**/
get_header(); 

?>

<main>
    <section class="inner_page_cmn_banner career-inner-sc">
      <div class="container">
        <div class="inner_text" data-aos="fade-up">
          <h1 class="main_hdng">find your dream <br />J<span class="o_wrap">o<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_img.svg"
                alt="arrow_img"></span>bs in Elvira</h1>
        </div>
      </div>
    </section>


    <?php
        $jobs_query = new WP_Query([

              'post_type'      => 'job',
              'posts_per_page' => -1,
              'orderby'        => 'date',
              'order'          => 'DESC',
               'meta_query' => [[
                'key'     => 'job_availibilty',
                'value'   => '1',       
                'compare' => '=',
            ]],
          
          ]); ?>

                  

              
    <?php if ($jobs_query->have_posts()) :
      
      $title = get_field('title_cr');
      $description = get_field('description_cr');
      
      
      ?>

        <section class="careers-wrapper " data-aos="fade-up">
          <div class="container ">
            <div class="row careers-header">
              <div class="col-12">
                <?php if ($title): ?>
                  <h2 class="careers-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($description): ?>
                  <p class="careers-subtitle">
                    <?php echo esc_html($description); ?>
                  </p>    
                <?php endif; ?>
              </div>

              <div class="col-12">
                <input type="text" class="careers-search-input" placeholder="Search here...">
              </div>
            </div>

        <div id="jobsContainer">
        <?php  while ($jobs_query->have_posts() ) :
                                      
                $jobs_query->the_post();


                $location = get_field('location_jobs');
                $experience = get_field('experience_jobs'); 
                $vacancy = get_field('vacancy_jobs');

                $urgent = get_field('job_urgent');
                $availibilty = get_field('job_availibilty');

         ?>
         
        <!-- Job Item -->
        <div class="career-job-card">
          <div class="row align-items-center gy-lg-0 gy-3">
            <div class="col-lg-8 career-job-info ">
              <h4 class="career-job-title"><?php the_title(); ?></h4>
              <ul class="career-job-meta">
                <?php if($location): ?>
                <li> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/loc.svg" alt=""> <?php echo esc_html($location); ?></li>
                <?php endif; ?>
                <?php if($experience): ?>
                <li> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hand.svg" alt=""> <?php echo esc_html($experience); ?></li>
                <?php endif; ?>
                <?php if($vacancy): ?>
                <li> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bag.svg" alt=""> <?php echo esc_html($vacancy); ?></li>
                <?php endif; ?>
              </ul>
            </div>
            <?php if($urgent || $availibilty): ?>
            <div class="col-lg-4 career-job-action text-lg-end">
              <?php if($urgent): ?>
              <span class="career-job-urgent">Urgent</span>
              <?php endif; ?>
              <?php if($availibilty): ?>    
              <a href="<?php the_permalink(); ?>" class="career-apply-btn primary_btn">Apply Now </a>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>
     </div>
      </div>
    </section>'
    <?php endif; ?>
    
    <!-- Rewards & Recognitions -->
    <section class="rr-section" data-aos="fade-up">
      <?php 
      
      $recTitle = get_field('rr_title');
      $recDescription = get_field('rr_description');
      
      ?>
    <div class="container">
    <div class="row rr-header">
      <div class="col-12 text-center">
        <?php 
            if ($recTitle) : ?>
          <h2 class="careers-title center-line mx-auto">
            <?php echo $recTitle; ?>
          </h2>
        <?php endif; ?>

        <?php if ($recDescription) : ?>
          <p class="rr-description f-18-font">
            <?php echo esc_html($recDescription); ?>
          </p>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>

  
<div class="rr-gal-sc">
  <div class="row">
    <div class="col-12">
      <div class="swiper rr-slider">
        <div class="swiper-wrapper">

          <?php
          $gallery_query = new WP_Query([
              'post_type'      => 'gallery',
              'posts_per_page' => 25,
              'tax_query'      => [
                  [
                      'taxonomy' => 'gallery-category',
                      'field'    => 'slug',
                      'terms'    => 'testimonials-gallery',
                  ],
              ],
          ]);

          if ($gallery_query->have_posts()) :
              while ($gallery_query->have_posts()) : $gallery_query->the_post();

                  $image = get_field('thumbnail_image'); // ACF image field

                  if ($image) :
          ?>

              <div class="swiper-slide rr-slide">
                <img 
                  src="<?php echo esc_url($image['url']); ?>" 
                  alt="<?php echo esc_attr($image['alt'] ?: get_the_title()); ?>" 
                  height="<?php echo $image['height'];?>" 
                  width="<?php echo $image['width'];?>" 
                  loading="lazy"
                >
              </div>

          <?php
                  endif;
              endwhile;
              wp_reset_postdata();
          endif;
          ?>

        </div>
      </div>
    </div>
  </div>
</div>
 <?php   get_template_part('/template-parts/footer-form'); ?>
</main>

<script>
 
jQuery(document).ready(function($){

    $('.careers-search-input').on('keyup', function(){

        let keyword = $(this).val();

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'filter_jobs',
                search: keyword
            },
            beforeSend: function(){
                $('#jobsContainer').addClass('loading');
            },
            success: function(response){
                $('#jobsContainer').html(response).removeClass('loading');
            }
        });

    });

});
</script>


 
<?php get_footer(); ?>