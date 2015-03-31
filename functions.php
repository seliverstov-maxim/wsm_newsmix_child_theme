<?php
  require_once(get_stylesheet_directory() . '/library/helpers.php');


  function include_custom_styles_for_subsites() {
    $custom_css_uri =  '/css/style-for-blog-' . get_current_blog_id() . '.css';
    if (file_exists(get_stylesheet_directory() . $custom_css_uri)) {
      wp_enqueue_style( 'style-name', get_stylesheet_directory_uri() . $custom_css_uri );
    }
  }
  add_action('wp_enqueue_scripts', 'include_custom_styles_for_subsites');


  function include_dynamic_colors() {
    require_once( get_stylesheet_directory() . '/library/includes/dynamic_colors.php');
  }
  add_action('wp_head', 'include_dynamic_colors');


  function registert_ads_widget_areas() {
    register_sidebar(array('name' => 'Category index ads 1', 'id' => 'cat_index_ads1', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
    register_sidebar(array('name' => 'Category index ads 2', 'id' => 'cat_index_ads2', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
    register_sidebar(array('name' => 'Category index ads 3', 'id' => 'cat_index_ads3', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
    register_sidebar(array('name' => 'Category index ads 4', 'id' => 'cat_index_ads4', 'before_widget' => '<li class="ads">', 'after_widget'  => '</li>'));
  }
  add_action('widgets_init', 'registert_ads_widget_areas');

  function register_news_ticker_widget_area() {
    register_sidebar(array('name' => 'News Ticker Area', 'id' => 'news_ticker'));
  }
  add_action('widgets_init', 'register_news_ticker_widget_area');


  function my_limit_archives( $args ) {
    $args['limit'] = 6;
    return $args;
  }
  add_filter( 'widget_archives_args', 'my_limit_archives' );

  function remove_home_from_nav_menu() {
    remove_filter( 'wp_nav_menu_items', 'kopa_add_icon_home_menu' );
  }
  add_action('init', 'remove_home_from_nav_menu');


  function add_news_ticker_area() {
    if(is_active_sidebar('news_ticker')){
       dynamic_sidebar('news_ticker');

      $mover = new jQueryNodeMover();
      $mover->deatach('.mtphr-dnt-widget')->append('.ticker-1.clearfix')->apply(true);
    }
  }
  add_action('wp_footer', 'add_news_ticker_area');