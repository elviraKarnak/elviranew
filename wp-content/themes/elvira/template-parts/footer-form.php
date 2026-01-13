<?php 

  $titleFooter = get_field('title_ff', 'option');
  $titleDescription = get_field('description_ff', 'option');

?>
      
      
      <section class="contact_sec pt_100 pb_100">
        <div class="container">
          <div class="row gy-3">
            <div class="col-md-6 left-to-right-animate">
              <div class="text_wrapper">
                <?php if($titleFooter){ ?>
                    <h2 class="sec_hdng line_bottom">
                      <?php echo $titleFooter; ?>
                    </h2>
                <?php } ?>
                 <?php if($titleDescription){ 

                    echo $titleDescription;
                
                 } ?>
                
                <?php ?>

                <?php if(have_rows('contacts_ff', 'option')){ 
                    
                      while(have_rows('contacts_ff',  'option')){ 
                        the_row();
                        ?>
                
                <a href="<?php echo get_sub_field('link_sin');?>"
                  ><img
                    src="<?php echo get_sub_field('contact_icon')['url'];?>"
                    alt="<?php echo get_sub_field('contact_icon')['alt'];?>"
                    loading="lazy"
                  /><?php echo get_sub_field('contact_sin');?></a
                >
                <?php }
                }?>
                
              </div>
            </div>
            <div class="col-md-6 right-to-left-animate">
              <div class="form_wrapper">
               <?php echo do_shortcode(get_field('shortcode_sin', 'option')); ?>
              </div>
            </div>
          </div>
        </div>
      </section>