<?php

get_header(); 

    if(have_posts()) : while (have_posts() ) : the_post(); 
?>

<section class="deault-page space-mr">
  <div class="container">
    <h1 class="text-center m-5"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <div class="under_construction text-center mb-5">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/under_constuction.webp" alt="under_constuction">
    </div>
  </div>
 </section>


<?php endwhile; endif; 

get_footer(); ?>