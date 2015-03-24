<?php

  function include_custom_styles_for_subsites() {
    $custom_css_uri =  '/css/style-for-blog-' . get_current_blog_id() . '.css';
    if (file_exists(get_stylesheet_directory() . $custom_css_uri)) {
      wp_enqueue_style( 'style-name', get_stylesheet_directory_uri() . $custom_css_uri );
    }
  }
  add_action( 'wp_enqueue_scripts', 'include_custom_styles_for_subsites' );