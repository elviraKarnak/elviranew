<!-- web_development Start-->
      <section class="web_development">
        <div class="container">
                <?php  $title = get_field('web_development_text','option');
                  if ($title):
               ?>
                <div class="head text-center">
                  <h2 class="sec_hdng line_bottom center">
                    <?php echo ($title); ?>
                </h2>
                </div>
                <?php endif; ?>
                <?php if (have_rows('image_card_grid','option')): ?>
                <div class="img_card_grid">
                <?php
                $delay = 100;
                while (have_rows('image_card_grid','option')): the_row();

                  $icon = get_sub_field('card_icon');
                  $title = get_sub_field('card_title');
                  $desc  = get_sub_field('card_description');
                ?>
                  <div class="img_card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                    <div class="img_wrapper">
                      <?php if ($icon): ?>
                        <img src="<?php echo esc_url($icon['url']); ?>"
                            alt="<?php echo esc_attr($icon['alt']); ?>"
                             width="<?php echo esc_attr( $icon['width'] ); ?>" 
                             height="<?php echo esc_attr( $icon['height'] ); ?>"
                            >
                      <?php endif; ?>
                    </div>
                    <?php if ($title): ?>
                      <h3 class="title"><?php echo ($title); ?></h3>
                    <?php endif; ?>
                    <?php if ($desc): ?>
                      <p><?php echo ($desc); ?></p>
                    <?php endif; ?>
                  </div>
                <?php
                  $delay += 100;
                endwhile;
                ?>
              </div>
            <?php endif; ?>
        </div>
      </section>
      <!-- web_development Start end-->