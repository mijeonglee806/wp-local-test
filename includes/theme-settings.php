<?php
/**
 * Theme Settings
 */

add_theme_support('title-tag'); // WP Page Title Support
add_theme_support('menus'); // WP Menu Theme Support
add_theme_support('customize-selective-refresh-widgets'); // Selective Refresh Widgets
add_theme_support('post-thumbnails'); // Add Support For Post Thumbnails
remove_action('wp_head', 'print_emoji_detection_script', 7); // Suppresses WP Emoji
remove_action('wp_print_styles', 'print_emoji_styles'); // Suppresses WP Emoji
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // Suppresses WP Emoji
remove_action('admin_print_styles', 'print_emoji_styles'); // Suppresses WP Emoji
remove_action('wp_head', 'wp_generator'); // Suppresses the XHTML generator that just outputs some WordPress Info
remove_action('wp_head', 'wlwmanifest_link'); // Suppresses resource file needed to enable support for Windows Live Writer
remove_action('wp_head', 'wp_shortlink_wp_head'); // Suppresses the "shortlink"
remove_action('wp_head', 'rsd_link'); // Suppresses The RSD which is an API to edit your blog from external services and clients. If you edit your blog exclusively from the WP admin console, you don’t need this.
remove_action('wp_head', 'feed_links', 2); // Suppresses feed links.
remove_action('wp_head', 'feed_links_extra', 3); // Suppresses comments feed.
remove_action('wp_head', 'rest_output_link_wp_head'); // Suppresses REST API Meta Data
remove_filter('the_content', 'wpautop'); // Disables changing double line-breaks in the text into HTML paragraphs

// Adds Custom Thumbnail Sizes
// Example: add_image_size( 'portfolio-thumb', 380, 250, true );
// Example: add_image_size( 'portfolio-detail', 588 );

// Remove large size images
function mag_remove_default_image_sizes($sizes)
{
  unset($sizes['1536x1536']);
  unset($sizes['2048x2048']);
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'mag_remove_default_image_sizes');

function mag_theme_customizer($wp_customize)
{
  // Hide Default Customizer Sections
  $wp_customize->remove_section('custom_css'); // Additional CSS
  $wp_customize->remove_section('static_front_page'); // Home Page Settings
}
add_action('customize_register', 'mag_theme_customizer');

// Remove Featured Images Meta Box on Pages
function mag_remove_featured_image_metabox() {
  remove_meta_box( 'postimagediv', 'page', 'side' );
}
add_action( 'do_meta_boxes', 'mag_remove_featured_image_metabox' );

// Custom Admin Menu Edits
function mag_custom_menu_positions()
{
  // Move "Menus" item to it's own option in admin menu
  add_menu_page('Menus', 'Menus', 'edit_theme_options', 'nav-menus.php', '', 'dashicons-list-view', 20);
  remove_submenu_page('themes.php', 'nav-menus.php');
}
add_action('admin_menu', 'mag_custom_menu_positions');

// Remove Comments Toolbar Menu Item
function mag_theme_remove_toolbar_node($wp_admin_bar)
{
  $wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'mag_theme_remove_toolbar_node', 999);

// Add SVG Support
function mag_add_file_types_to_uploads($file_types)
{
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_action('upload_mimes', 'mag_add_file_types_to_uploads');

// Remove All Default WP Dashboard Widgets

// Detect if user logged in by role
function mag_if_user_role($user_role)
{
  if (is_user_logged_in()) {
    $user_check = ($user_role) ? $user_check = $user_role : $user_check = "";
    $user = wp_get_current_user();
    $role = (array) $user->roles;
    if (in_array($user_check, $role)) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
function mag_remove_dashboard_meta()
{
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // Incoming Links
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // Plugins
  remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress blog
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // Other WordPress News
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Quick Press
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // Recent Drafts
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // Right Now
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Activity
  // Hide these widgets if not administrator
  if (!mag_if_user_role("administrator")) {
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal'); // WP Engine Overview
    remove_meta_box('wpe_dify_news_feed', 'dashboard', 'normal'); // WP Engine News Feed
  }
}
add_action('admin_init', 'mag_remove_dashboard_meta');

// Remove Welcome Widget
remove_action('welcome_panel', 'wp_welcome_panel');

/*
Prevents admin users from dragging a ACF meta box to the sidebar by mistake. This function tells those components go back to their placement as defined in the ACF admin.
*/
function mag_reset_metabox_positions()
{

  $post_types = get_post_types(array('public' => false, '_builtin' => false));

  // remove unwanted types from the list
  unset($post_types['acf-field-group']);
  unset($post_types['acf-field']);

  //default posts and page
  add_filter('get_user_option_meta-box-order_page', '__return_empty_string', 10, 1);
  add_filter('get_user_option_meta-box-order_post', '__return_empty_string', 10, 1);

  // custom post types

  foreach ($post_types as $post_type) {
    $meta = "get_user_option_meta-box-order_{$post_type}";
    add_filter($meta, '__return_empty_string', 10, 1);
  }

}

add_action('admin_init', 'mag_reset_metabox_positions', 10, 0);