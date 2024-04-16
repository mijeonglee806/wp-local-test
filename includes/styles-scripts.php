<?php
/**
 * Styles & Scripts
 */

// Sets theme styles
function mag_theme_styles()
{
  $cache_buster = "0814201003"; // Format: MMDDYYHTT (Month, Day, Year, Time)
  // The `[], null` bit below is to fix a bug when including a multi-family Google Fonts URL
	/* Google Fonts */
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400&display=swap', [], null);
	wp_enqueue_style('screen', get_template_directory_uri() . '/style.css', array(), $cache_buster);
	wp_dequeue_style('wp-block-library'); // Remove Gutenberg Block CSS
  wp_dequeue_style( 'classic-theme-styles' );
  wp_dequeue_style( 'global-styles' );   
}
add_action('wp_enqueue_scripts', 'mag_theme_styles');

// Sets admin styles
function mag_admin_styles()
{
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'mag_admin_styles');

// Sets theme js
function mag_theme_js()
{
  $cache_buster = "0814201003"; // Format: MMDDYYHTT (Month, Day, Year, Time)
  wp_deregister_script('jquery'); // prevent defaults WP jQuery
  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), null, false);
  wp_enqueue_script('extras_js', get_template_directory_uri() . '/assets/js/extras.js', array('jquery'), $cache_buster, true);
  wp_enqueue_script('scripts_js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery', 'extras_js'), $cache_buster, true);
}
add_action('wp_enqueue_scripts', 'mag_theme_js');

// Suppresses wp-embed script
function mag_deregister_scripts()
{
  wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'mag_deregister_scripts');

// Add ACF Options closing head tracking codes
function mag_add_tracking_codes_head()
{
  echo get_field('head_scripts', 'option') . "\n";
}
add_action('wp_head', 'mag_add_tracking_codes_head', 100);

// Add ACF Options closing body tracking codes
function mag_add_tracking_codes_body()
{
  echo get_field('body_scripts', 'option') . "\n";
}
add_action('wp_footer', 'mag_add_tracking_codes_body', 100);
