<?php 
/**
* Template Name: Page: Contact
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
    height="<?php echo esc_attr( $image['height'] ); ?>" loading="lazy"><?php endif; ?></span><?php echo $title_after; ?>
            </h1>
            <?php endif; ?>
              </div>
            </div>
          </section>
    <!-- Banner Section ends -->
    
    <!-- Elvira Contact Start -->
    <section class="elvira-contact">
      <div class="container">
        <div class="elvira-row">
          <div class="row align-items-center">
              <?php
                   $title = get_field('left_content_title');
                   $desc  = get_field('left_content_description');?>
            <!-- Left Content -->
            <div class="col-lg-7">
              <?php if ($title): ?>
                 <h2 class="careers-title">
                    <?php echo ($title); ?>
                </h2>
              <?php endif; ?>
               <?php if ($desc): ?>
                   <p class="f-18-font">
                      <?php echo ($desc); ?>
                   </p>
               <?php endif; ?>
             <div class="contact-page-from">
                 <?php echo do_shortcode(get_field('shortcode_text')); ?>
               </div>
            </div>

            <!-- Right Info Box -->
            <div class="col-lg-5 mt-md-4 mt-0 mt-lg-0">
              <div class="elvira-info-box">
                <h4><?php $right_info_box_title = get_field('right_info_box_title');?>
                  <?php echo $right_info_box_title; ?></h4>
                <?php if (have_rows('contact_info_items')): ?>

  <?php while (have_rows('contact_info_items')): the_row(); 
    $icon  = get_sub_field('info_icon');
    $title = get_sub_field('icon_title');
    $value = get_sub_field('info_value');
    $info_link = get_sub_field('info_link');
  ?>

    <div class="elvira-info-item d-flex">

      <?php if ($icon): ?>
        <div class="lft-sc">
          <img src="<?php echo esc_url($icon['url']); ?>"
               alt="<?php echo esc_attr($icon['alt']); ?>"
               width="<?php echo esc_attr($icon['width'] ); ?>"
              height="<?php echo esc_attr( $icon['height'] ); ?>"
               >
        </div>
      <?php endif; ?>

      <div class="rgt-sc">
        <?php if ($title): ?>
          <h5><?php echo ($title); ?></h5>
        <?php endif; ?>

        <?php if ($value): ?>
          <p>
            <?php if ($link): ?>
              <a href="<?php echo esc_url($link); ?>">
                <?php echo esc_html($value); ?>
              </a>
            <?php else: ?>
              <?php echo esc_html($value); ?>
            <?php endif; ?>
          </p>
        <?php endif; ?>
      </div>

    </div>

    <hr>

  <?php endwhile; ?>

<?php endif; ?>
              </div>
             
            </div>

          </div>
         
        </div>
                  <?php
          $iframe = get_field('map_iframe');

          if ($iframe):
          ?>
            <div class="map-sc">
              <?php echo $iframe; ?>
            </div>
          <?php endif; ?>
      </div>
    </section>
    <!--Elvira Contact Ends -->
  </main>
  
<?php get_footer(); ?>