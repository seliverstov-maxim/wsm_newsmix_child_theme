<?php

  function include_custom_styles_for_subsites() {
    $custom_css_uri =  '/css/style-for-blog-' . get_current_blog_id() . '.css';
    if (file_exists(get_stylesheet_directory() . $custom_css_uri)) {
      wp_enqueue_style( 'style-name', get_stylesheet_directory_uri() . $custom_css_uri );
    }
  }
  add_action('wp_enqueue_scripts', 'include_custom_styles_for_subsites');

  function registert_ads_widget_areas() {
    register_sidebar(array('name' => 'Category index ads 1', 'id' => 'cat_index_ads1', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
    register_sidebar(array('name' => 'Category index ads 2', 'id' => 'cat_index_ads2', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
    register_sidebar(array('name' => 'Category index ads 3', 'id' => 'cat_index_ads3', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
    register_sidebar(array('name' => 'Category index ads 4', 'id' => 'cat_index_ads4', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
  }
  add_action('widgets_init', 'registert_ads_widget_areas');