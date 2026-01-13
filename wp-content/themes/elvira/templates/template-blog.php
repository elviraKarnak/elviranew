<?php 
/**
* Template Name: Page: Blog
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

    <!-- blog start -->
      <section class="blogs_listing pt_50 pb_50">
        <div class="container">
            <?php
                  $terms = get_terms([
                      'taxonomy'   => 'category',
                      'hide_empty' => true, // set false if you want empty terms too
                  ]);

                    if (!empty($terms) && !is_wp_error($terms)) {
                      $i = 100;
                  ?>
                    <form class="listing_tabs_btn">
                      <ul>
                        <li class="active" data-filter="all" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>">
                          <input type="checkbox" name="blog_filters[]" id="all" value="*">
                          <label for="all">All Blogs</label>
                        </li>
                        <?php $i = 200;
                        
                        foreach ( $terms as $term ) { ?>
                          <li data-aos="fade-up" data-aos-delay="<?php echo $i; ?>">
                          <input type="checkbox" name="blog_filters[]" id="<?php echo $term->term_id; ?>" value="<?php echo $term->term_id; ?>">
                          <label for="<?php echo $term->term_id; ?>"><?php echo esc_html($term->name); ?></label></li>
                        <?php 
                          $i= $i+100; 
                        } ?>
                      </ul>
                    </form>
                  <?php } ?>

                   <div class="blog_filters_data">
                    <?php
                      $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

                      $blog_query = new WP_Query([

                            'post_type'      => 'post',
                            'posts_per_page' => 12,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'paged'          => $paged,
                            
                        ]); ?>

                  <?php if ( $blog_query->have_posts() ) :?>

                    <div class="blogs_wrapper" data-aos="zoom-in">
                      <div class="filter_loader"></div>
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
                     <div class="custom_pagination">
                        <div class="pagination">
                            <?php if ($blog_query->max_num_pages > 1) : ?>
                              <ul class="pagination">

                              <?php
                                $links = paginate_links([
                                  'current'   => 1,
                                  'total'    => $blog_query->max_num_pages,
                                  'type'     => 'array',
                                  'prev_text'=> '‹ Prev',
                                  'next_text'=> 'Next ›',
                                  'format'   => '#paged=%#%', // IMPORTANT
                              ]);

                                foreach ($links as $link) {
                                    echo '<li>' . $link . '</li>';
                                }
                              ?>
                          </ul>
                          <?php endif; ?>
                        </div>
              </div>
                <?php endif; wp_reset_query(); ?>
            </div>  
        </div>
      </section>

      <!-- blog end -->
      
      
      <!-- Webdevelopment Start-->
        <?php   get_template_part('/template-parts/development-path'); ?>
       <!-- Webdevelopment end --> 
      <?php get_template_part('/template-parts/footer-form'); ?>
    </main>


      <script>
          jQuery(document).ready(function ($) {

              $(document).on('change', 'input[name="blog_filters[]"]', function(){

               let selected = [];

                $('input[name="blog_filters[]"]:checked').each(function () {
                    selected.push($(this).val());
                });

                // If "All" selected, remove others
                if (selected.includes('*')) {
                    selected = ['*'];
                    $('input[name="blog_filters[]"]').not('#all').prop('checked', false);
                } else {
                    $('#all').prop('checked', false);
                }

                filterBlogs(selected, 1);
              });


               $(document).on('click', '.blog_filters_data .pagination a', function (e) {
                    e.preventDefault();

                    let page = 1;
                    let href = $(this).attr('href');

                    if (href && href.indexOf('paged=') !== -1) {
                        page = href.split('paged=')[1];
                    }

                    let selected = [];
                    $('input[name="blog_filters[]"]:checked').each(function () {
                        selected.push($(this).val());
                    });

                    filterBlogs(selected, page);
                });


          /* ========= AJAX FUNCTION ========= */
          function filterBlogs(selected, page = 1) {

              $.ajax({
                  url: '<?php echo admin_url('admin-ajax.php'); ?>',
                  type: 'POST',
                  data: {
                      action: 'filter_blogs',
                      categories: selected,
                      paged: page
                  },
                  beforeSend: function () {
                      $('.filter_loader').fadeIn();
                  },
                  success: function (response) {
                      $('.blog_filters_data').html(response);
                      $('.filter_loader').fadeOut();
                  },
                  error: function () {
                      $('.filter_loader').fadeOut();
                      alert('Something went wrong. Please try again.');
                  }
              });
          }

          });

        </script>

   
    

    <?php get_footer(); ?>