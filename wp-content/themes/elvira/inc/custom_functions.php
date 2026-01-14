<?php 

//acf theme page

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> 'false'
	));

	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
    
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Additional Settings',
		'menu_title'	=> 'Additional Fields',
		'parent_slug'	=> 'theme-general-settings',
	));

}


function estimated_reading_time($content) {

    $word_count = str_word_count(strip_tags($content));
    $reading_speed = 200; // average words per minute

    $minutes = ceil($word_count / $reading_speed);

    return ($minutes < 1) ? 1 : $minutes;
}




add_action('wp_ajax_filter_blogs', 'filter_blog_cb');
add_action('wp_ajax_nopriv_filter_blogs', 'filter_blog_cb');


function filter_blog_cb() {

    $cats  = $_POST['categories'] ?? [];
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

		$args = [
        'post_type'      => 'post',
				'posts_per_page' => 12,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'paged'          => $paged,
    	];

		 // Category filter
    if (!empty($cats) && !in_array('*', $cats)) {
        $args['tax_query'] = [[
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => array_map('intval', $cats),
            'operator' => 'IN',
        ]];
    }



		$blog_query = new WP_Query($args); ?>

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

                <!-- ========= PAGINATION ========= -->
                  <?php if ($blog_query->max_num_pages > 1) : ?>
                      <div class="custom_pagination">
                          <ul class="pagination">
                              <?php
                              $links = paginate_links([
                                  'current'   => $paged,
                                  'total'    => $blog_query->max_num_pages,
                                  'type'     => 'array',
                                  'prev_text'=> '‹ Prev',
                                  'next_text'=> 'Next ›',
                                  'format'   => '#paged=%#%',
                              ]);

                              foreach ($links as $link) {
                                  echo '<li>' . $link . '</li>';
                              }
                              ?>
                          </ul>
                      </div>
                  <?php endif; ?>

              </div>

          <?php
          else :
              echo '<p class="no-posts">No blogs found.</p>';
          endif;

          wp_reset_postdata();
          wp_die();
      }



add_action('wp_ajax_filter_jobs', 'filter_jobs_callback');
add_action('wp_ajax_nopriv_filter_jobs', 'filter_jobs_callback');

function filter_jobs_callback() {

    $search = sanitize_text_field($_POST['search'] ?? '');

    $args = [
        'post_type'      => 'job',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        's'              => $search,
        'meta_query'     => [[
            'key'     => 'job_availibilty',
            'value'   => '1',
            'compare' => '='
        ]]
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            $location   = get_field('location_jobs');
            $experience = get_field('experience_jobs'); 
            $vacancy    = get_field('vacancy_jobs');
            $urgent     = get_field('job_urgent');
            $available  = get_field('job_availibilty');
        ?>

        <div class="career-job-card">
          <div class="row align-items-center gy-lg-0 gy-3">
            <div class="col-lg-8 career-job-info">
              <h4 class="career-job-title"><?php the_title(); ?></h4>
              <ul class="career-job-meta">
                <?php if($location): ?><li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/loc.svg"> <?php echo esc_html($location); ?></li><?php endif; ?>
                <?php if($experience): ?><li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hand.svg"> <?php echo esc_html($experience); ?></li><?php endif; ?>
                <?php if($vacancy): ?><li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bag.svg"> <?php echo esc_html($vacancy); ?></li><?php endif; ?>
              </ul>
            </div>
            <div class="col-lg-4 text-lg-end">
                <?php if($urgent): ?><span class="career-job-urgent">Urgent</span><?php endif; ?>
                <?php if($available): ?><a href="<?php the_permalink(); ?>" class="career-apply-btn primary_btn">Apply Now</a><?php endif; ?>
            </div>
          </div>
        </div>

    <?php endwhile;
    else :
        echo '<p class="no-jobs">No jobs found.</p>';
    endif;

    wp_die();
}
