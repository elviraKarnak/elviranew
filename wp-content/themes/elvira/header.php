<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport"
    content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1, shrink-to-fit=no">
  <!-- Page Title -->
  <title><?php wp_title('|', true, 'right');
  bloginfo('name'); ?></title>
  <!-- Stylesheets and Other Head Elements -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>


  <?php 

    // Top Bar

    $mailIcon = get_field('icon_mail_tbh', 'option');
    $eMailId = get_field('e-mail_id_tbh', 'option');
    $phoneIcon = get_field('phone_icon_tbh', 'option');
    $phoneNUmber = get_field('phone_number_tbh', 'option');
    //$socialMedia = get_field('socials_tbh', 'option');

    // request A Quote

    $requestAQuote = get_field('request_a_quote_tbh', 'option');
  ?>

  <header>
        <div class="topbar">
          <div class="container">
            <div class="row align-items-center gy-lg-3 gy-0">

            <?php if( $eMailId || $phoneNUmber) { ?>
                <div class="col-md-8">               
                  <div class="cont_info justify-content-md-start justify-content-space-between">

                    <?php if($eMailId){ ?>
                        <a href="mailto:<?php echo $eMailId; ?>">
                          <?php if($mailIcon){ ?>
                          <img
                            src="<?php echo $mailIcon['url']; ?>"
                            alt="<?php echo $mailIcon['alt']; ?>"
                            height="<?php echo $mailIcon['height'];?>"
                            width="<?php echo $mailIcon['width'];?>"
                            loading="lazy"
                          />
                          <?php } ?>
                          <?php echo $eMailId; ?></a>
                      <?php } ?>
                    <!-- <a href="#" class="primary_btn">Request a Quote</a> -->
                    <?php if($phoneNUmber){ ?>
                      <a href="tel:+<?php echo  preg_replace('/\D/', '', $phoneNUmber);?>"
                        >
                        <?php if($phoneIcon){ ?>
                          <img
                            src="<?php echo $phoneIcon['url']; ?>"
                            alt="<?php echo $phoneIcon['alt']; ?>"
                            height="<?php echo $phoneIcon['height'];?>"
                            width="<?php echo $phoneIcon['width'];?>"
                            loading="lazy"
                          />
                          <?php } ?><?php echo $phoneNUmber; ?></a
                      >
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
              <?php ?>
              <?php if(have_rows('socials_tbh','option')){ ?>
                <div class="col-md-4 text-md-end text-center">
                  <div class="social_icon_wrap">
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
                </div>
               <?php } ?> 
            </div>
          </div>
        </div>
        <div class="primary_header">
          <div class="container">
            <div class="inner_wrapper">
              <div class="logo_wrapper">
                  <?php if(has_custom_logo()){
                    the_custom_logo();
                    }
                  ?>
              </div>
              <nav>
                <?php
                  wp_nav_menu(
                    array(
                      'container' => '',
                      'container_class' => '',
                      'container_id' => '',
                      'items_wrap' => '<ul id="%1$s menu" class="%2$s primary-menu ">%3$s</ul>',
                      'theme_location' => 'menu-1',
                    )
                  );
                 ?>
                <?php if($requestAQuote){ 

                  $requestAQuote_url = $requestAQuote['url'];
                  $requestAQuote_title = $requestAQuote['title'];
                  $requestAQuote_target = $requestAQuote['target'] ? $requestAQuote['target'] : '_self';
                 ?>
                <a href="<?php echo $requestAQuote_url; ?>" class="primary_btn blue_bg d-xl-none d-block" target="<?php echo $requestAQuote_target; ?>">
                  <?php echo $requestAQuote_title; ?>
                </a>
                <?php } ?>
              </nav>
              <div class="btn_wrapper">
                <button class="toggle_menu" title="Hemburger-menu"></button>
                <?php if($requestAQuote){ 
                  $requestAQuote_url = $requestAQuote['url'];
                  $requestAQuote_title = $requestAQuote['title'];
                  $requestAQuote_target = $requestAQuote['target'] ? $requestAQuote['target'] : '_self';
                 ?>
                  <a href="<?php echo $requestAQuote_url; ?>" class="primary_btn blue_bg d-xl-block d-non" target="<?php echo $requestAQuote_target; ?>">
                    <?php echo $requestAQuote_title; ?>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </header>