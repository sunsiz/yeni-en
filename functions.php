<?php
/**
 * Yeni theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Yeni
 * @subpackage Yeni
 * @since Yeni 1.0
 */

/**
 * Include CSS files 
 */
function theme_enqueue_scripts() {
        wp_enqueue_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'MDB_css', get_template_directory_uri() . '/css/mdb.min.css' );
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.6.1.min.js', array(), '3.6.1', true );/*/js/jquery-3.4.1.slim.min.js*/
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.12.6', true );
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.3.1', true );
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true );

        }
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

/**
 * Include external files
 */
require_once('inc/mdb_bootstrap_navwalker.php');
             
/**
 * Setup Theme
 */
function MDB_setup() {
  // Navigation Menus
  register_nav_menus(array(
    'navbar' => __( 'Navbar Menu'),
    'footer1' => __( 'Footer #1 Column'),
    'footer2' => __( 'Footer #2 Column'),
    'footer3' => __( 'Footer #3 Column')
    ));
  // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('main-full', 1078, 516, false); // main post image in full width
  }
  add_action('after_setup_theme', 'MDB_setup');
  
  /**
 * Register our sidebars and widgetized areas.
 */
function mdb_widgets_init() {

  register_sidebar( array(
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span id="sidebar">',
    'after_title'   => '</span>',
  ) );
  register_sidebar( array(
    'name'          => 'Footer widget area',
    'id'            => 'footer',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ) );
}
add_action( 'widgets_init', 'mdb_widgets_init' );
add_editor_style('editor-style.css');

// Changing excerpt more
   function new_excerpt_more($more) {
   global $post;
   return '… <a class="btn btn-primary btn-sm readmore" href="'. get_permalink($post->ID) . '">' . 'keep reading' . '</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Include external files
 */
require_once('inc/mdb_bootstrap_navwalker.php');
require_once('inc/mdb_pagination.php');  

function exclude_category($query) {
	if ( $query->is_home() ) {
		$query->set( 'category__not_in', array(271, 300) );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'exclude_category' );

function yst_wpseo_change_og_locale( $locale ) {
return 'ug_CN';
}
add_filter( 'wpseo_locale', 'yst_wpseo_change_og_locale' );

add_filter('pre_get_posts', 'limit_category_posts');
function limit_category_posts($query){
    if ($query->is_category) {
        $query->set('posts_per_page', 50);
    }
    return $query;
}
