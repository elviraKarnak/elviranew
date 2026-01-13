<?php

// style sheet & scripts

function elvira_enqueue(){

	$uri = get_theme_file_uri();
    $ver = 1.0;
    $vert = time();

      wp_register_style( 'bootstrap',   $uri. '/assets/css/bootstrap/bootstrap.min.css', [], $ver);
	  wp_register_style( 'aos', $uri. '/assets/css/aos/aos.css', [], $ver);
      wp_register_style( 'magnific', $uri. '/assets/css/magnific/magnific-popup.css', [], $ver);
	  wp_register_style( 'swiper', $uri. '/assets/css/swiper/swiper-bundle.min.css', [], $ver);
	  wp_register_style( 'theme-css',  $uri. '/assets/css/main-style.css', [], $vert);
	  wp_register_style( 'theme_stylesheet', $uri. '/style.css', [], $vert);


	  wp_enqueue_style( 'bootstrap');
	  wp_enqueue_style( 'aos');
	  wp_enqueue_style( 'magnific');
	  wp_enqueue_style( 'swiper');
	  wp_enqueue_style( 'theme-css');
	  wp_enqueue_style( 'theme_stylesheet');

	
	  wp_register_script( 'bootstrap',   $uri . '/assets/js/bootstrap/bootstrap.bundle.min.js', [], $ver, true );
	  wp_register_script( 'swiper',      $uri . '/assets/js/swiper/swiper-bundle.min.js',  [], $ver, true );
	  wp_register_script( 'particles',   $uri . '/assets/js/particles/tsparticles.min.js',  [], $ver, true );
	  wp_register_script( 'scrollmagic', $uri . '/assets/js/scrollmagic/ScrollMagic.min.js',  [], $ver, true );
	  wp_register_script( 'magnific',    $uri . '/assets/js/magnific/jquery.magnific-popup.min.js',  [], $ver, true );
	  wp_register_script( 'aos',         $uri . '/assets/js/aos/aos.js',  [], $ver, true );
	  wp_register_script( 'custom-js', $uri . '/assets/js/function.js', [], $vert, true );

	  wp_enqueue_script('jquery');
	  wp_enqueue_script('bootstrap');
	  wp_enqueue_script('swiper');
	  wp_enqueue_script('particles');
	  wp_enqueue_script('scrollmagic');
	  wp_enqueue_script('magnific');
	  wp_enqueue_script('aos');
	  wp_enqueue_script('custom-js');

  }

  add_action( 'wp_enqueue_scripts', 'elvira_enqueue' );



	// register navs
	register_nav_menus(
		array(
			'menu-1' => __('Primary', 'elvira'),
			'menu-2' => __('Footer First Menu', 'elvira'),
			'menu-3' => __('Footer Second Menu', 'elvira'),
		)
	);

	// theme support

		function elvira_setup_theme(){
			add_theme_support( 'custom-logo' );
		    add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
		}

		add_action( 'after_setup_theme', 'elvira_setup_theme' );


	require get_template_directory() . '/inc/custom_functions.php';

