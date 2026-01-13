<?php

get_header();  ?>

    <main>
      <section class="inner_page_cmn_banner">
        <div class="container">
          <div class="inner_text" data-aos="fade-up">
            <h1 class="main_hdng">
              Services WE <br /><span class="o_wrap"
                >O<img
                  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow_img.svg"
                  alt="arrow_img" /></span
              >FFER
            </h1>
          </div>
        </div>
      </section>

        <?php 

        $title = get_field('animated_title') ? get_field('animated_title') : get_the_title();
        $description = get_field('description_service');
        $button = get_field('button_hb');

        ?>


      <section class="service_details pt_50 pb_50">
         <?php if ($title || $description){ ?>   
                <div class="container">
                <div class="head" data-aos="fade-right">
                    <?php if ($title){ ?>
                    <h2 class="sec_hdng line_bottom">
                        <?php echo $title; ?>
                    </h2>
                    <?php } ?> 
                    <?php if ($description){ ?>
                    <p>
                        <?php echo $description; ?>
                    </p>
                    <?php } ?>
                </div>
                </div>
           <?php } ?>

        <?php if (have_rows('technology_used')):  ?>
            <div class="one_side_container" data-aos="fade-left">
                <div class="tools_slider_wrapper swiper">
                    <div class="swiper-wrapper">

                        <?php while (have_rows('technology_used')): the_row();
                        
                        $title = get_sub_field('title_tech');
                        $description = get_sub_field('description_tech');
                        $logo = get_sub_field('image_tech');
                        $logo_bg = get_sub_field('image_big_tech');
                        
                        ?>
                            <div class="swiper-slide inner_card">
                               <img
                                src="<?php echo $logo['url'];?>" 
                                alt="<?php echo $logo['alt'];?>"
                                height="<?php echo $logo['height'];?>"
                                width="<?php echo $logo['width'];?>"
                                />

                                <h3><?php echo $title; ?></h3>
                                <p><?php echo $description; ?></p>
                                
                                <img
                                src="<?php echo $logo_bg['url'];?>" 
                                alt="<?php echo $logo_bg['alt'];?>"
                                height="<?php echo $logo_bg['height'];?>"
                                width="<?php echo $logo_bg['width'];?>"
                                class="bg_img"/>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
          <?php endif; ?>  
      </section>



    <?php if (have_rows('steps_dps')):  
        

                 $title = get_field('title_dps');
                 $description = get_field('description_dps');
               
        
        ?>

        <section class="plans_steps pt_50 pb_50">
            <div class="container">
            <div class="head text-center" data-aos="fade-up">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $description; ?></p>
            </div>


                <div class="steps" data-aos="zoom-in">


                <?php $i=1;

                   while (have_rows('steps_dps')): the_row(); 
                   
                   $title = get_sub_field('title_stps');
                   $description = get_sub_field('description_steps');
                   $step_image_dps = get_sub_field('step_image_dps');
                   
                   
                   ?>


                <?php if($i % 2 != 0) : ?>

                    <div class="steps_wrapper">
                        <div class="left">
                            <img
                                src="<?php echo $step_image_dps['url'];?>" 
                                alt="<?php echo $step_image_dps['alt'];?>"
                                height="<?php echo $step_image_dps['height'];?>"
                                width="<?php echo $step_image_dps['width'];?>"
                                />
                        </div>
                        <div class="middle">
                        <div>
                            <div class="circle"></div>
                            <h3>STEP <?php echo $i; ?></h3>
                        </div>
                        </div>
                        <div class="right">
                            <h4><?php echo $title; ?></h4>
                            <p><?php echo $description; ?></p>
                        </div>
                    </div> 

                    <?php else : ?>

                        <div class="steps_wrapper">
                            <div class="left">
                             <h4><?php echo $title; ?></h4>
                            <p><?php echo $description; ?></p>
                            </div>
                            <div class="middle">
                            <div>
                                <div class="circle"></div>
                                <h3>STEP <?php echo $i; ?></h3>
                            </div>
                            </div>
                            <div class="right">
                            <img
                                src="<?php echo $step_image_dps['url'];?>" 
                                alt="<?php echo $step_image_dps['alt'];?>"
                                height="<?php echo $step_image_dps['height'];?>"
                                width="<?php echo $step_image_dps['width'];?>"
                                />
                            </div>
                        </div>

              <?php endif; $i++; endwhile; ?>  

            
            </div>
        </section>
    <?php endif; ?>
     
        <?php get_template_part('/template-parts/development-path'); ?>

      <?php get_template_part('/template-parts/footer-form'); ?>

    </main>


<?php get_footer(); ?>