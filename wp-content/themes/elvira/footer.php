 <?php 
 
    $subTitle = get_field('sub_title_ft', 'option');
    $mainTitle= get_field('title_ft', 'option');

    $footerLogo = get_field('logo_ftr', 'option');
    $footerDescription  = get_field('description_ftr', 'option');

    $menuTitle_1  = get_field('menu_title_1', 'option');
    $menuTitle_2  = get_field('menu_title_2', 'option');
    $menuTitle_3  = get_field('connect_title', 'option');

    $email_Id  = get_field('email_id_ft', 'option');
    $phone_No  = get_field('phone_number_ft', 'option');

    $locTitle  = get_field('location_ftr', 'option');
    $locInfo  = get_field('location_info_ftr', 'option');

    $copyright  = get_field('text_copyright_ftr', 'option');

    $QRCode  = get_field('qr_code_ftr', 'option');


    

 ?>
 
 
 <footer class="site_footer">
      <div class="container">
        <div class="footer_wrapper">
            <?php if( $subTitle || $mainTitle) { ?>
            <div class="top">
              <?php if($subTitle){ ?>
                <p><?php echo $subTitle; ?></p>
              <?php } ?>
              <?php if($mainTitle){ ?>
                <h3 class="title"><?php echo $mainTitle; ?></h3>
              <?php } ?>
            </div>
          <?php } ?>
          <div class="middle">
            <div class="inner_wrapper">
              <div class="logo_wrapper widget">
                <?php if($footerLogo){ ?>
                  <div class="f_logo widget_title">
                    <img
                      src="<?php echo $footerLogo['url']; ?>"
                      alt="<?php echo $footerLogo['alt']; ?>"
                      height="<?php echo $footerLogo['height'];?>"
                      width="<?php echo $footerLogo['width'];?>"
                      loading="lazy"
                    />
                  </div>
                <?php } ?>
                <?php if($footerDescription){ ?>
                  <div class="widget_cont">
                    <p><?php echo $footerDescription; ?></p>
                    <?php if($QRCode){ ?>
                      <img
                       src="<?php echo $QRCode['url']; ?>"
                       alt="<?php echo $QRCode['alt']; ?>"
                       height="<?php echo $QRCode['height'];?>"
                       width="<?php echo $footerLogo['width'];?>"
                        loloading="lazy"
                      />
                      <?php } ?>
                  </div>
                <?php } ?>
              </div>
              <div class="menu_wrapper widget">
                <div class="widget_title">
                  <?php if($menuTitle_1){ ?>
                    <h4><?php echo $menuTitle_1; ?></h4>
                  <?php } ?>
                </div>
                <div class="widget_cont">
                  <?php
                  wp_nav_menu(
                    array(
                      'container' => '',
                      'container_class' => '',
                      'container_id' => '',
                      'items_wrap' => '<ul id="%1$s menu" class="%2$s ">%3$s</ul>',
                      'theme_location' => 'menu-2',
                    )
                  );
                 ?>
                </div>
              </div>
              <div class="menu_wrapper widget">
                <div class="widget_title">
                  <?php if($menuTitle_2){ ?>
                    <h4><?php echo $menuTitle_2; ?></h4>
                  <?php } ?>
                </div>
                <div class="widget_cont">
                  <?php
                  wp_nav_menu(
                    array(
                      'container' => '',
                      'container_class' => '',
                      'container_id' => '',
                      'items_wrap' => '<ul id="%1$s menu" class="%2$s ">%3$s</ul>',
                      'theme_location' => 'menu-3',
                    )
                  );
                 ?>
                </div>
              </div>
              <div class="menu_wrapper widget">
                <div class="widget_title">
                   <?php if($menuTitle_3){ ?>
                    <h4><?php echo $menuTitle_3; ?></h4>
                  <?php } ?>
                </div>
                <div class="widget_cont">
                  <?php if($email_Id){ ?>
                    <a href="mailto:<?php echo $email_Id; ?>"
                      ><?php echo $email_Id; ?></a
                    >
                  <?php } ?>
                  <?php if($phone_No){ ?>
                    <a href="tel:<?php echo preg_replace('/\D/', '', $phone_No);?>">
                      <?php echo $phone_No; ?>
                    </a>
                  <?php } ?>
                 
                    <?php if(have_rows('socials_tbh','option')){ ?>
                      <div class="social_icons">
                          <?php while (have_rows('socials_tbh','option')) { 
                            the_row(); 
                            
                            $socialLink = get_sub_field('link_sm_tbh');
                            $socialIcon = get_sub_field('icon_sm_tbh');
                            if($socialLink && $socialIcon){ 
                                $socialLink_url = $socialLink['url'];
                                $socialLink_title = $socialLink['title'];
                                $socialLink_target = $socialLink['target'] ? $socialLink['target'] : '_self';
                            ?>
                            <a href="<?php echo $socialLink_url; ?>" target="<?php echo  $socialLink_target; ?>">
                
                                <img
                                  src="<?php echo $socialIcon['url']; ?>"
                                  alt="<?php echo $socialIcon['alt']; ?>"
                                  height="<?php echo $socialIcon['height'];?>"
                                  width="<?php echo $socialIcon['width'];?>"
                                  loading="lazy"
                                />
                            </a>
                          <?php }} ?>
                      </div>
                  <?php } ?> 
              </div>
            </div>
              <?php if($locInfo){ ?>
                <div class="menu_wrapper widget">
                   <?php if($locTitle){ ?>
                    <div class="widget_title">
                      <h4><?php echo $locTitle; ?></h4>
                    </div>
                  <?php } ?>
                  <div class="widget_cont">
                    <p><?php echo $locInfo; ?></p>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
           <?php if($copyright){ ?>
            <div class="bottom">
              <p><?php echo $copyright; ?></p>
            </div>
          <?php } ?>
          <button class="back_top_top" title="back-to-top">
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/back-to-top_btn.svg"
              alt="back-to-top_btn"
              height="110"
              width="110"
              loading="lazy"
            />
          </button>
        </div>
      </div>
    </footer>
  
<?php wp_footer(); ?>

</body>
</html>	