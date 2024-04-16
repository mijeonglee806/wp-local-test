<?php
/**
 * Custom Functions (previously content.php)
 */

/**
 * Register custom query vars for filtering/sorting
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */

function mag_register_query_vars($vars)
{
  $vars[] = 'sort';
  return $vars;
}
add_filter('query_vars', 'mag_register_query_vars');

/*
 To add in additional classes check this out https://core.trac.wordpress.org/browser/tags/4.9/src/wp-includes/post-template.php#L555
*/
function custom_body_class($class = '')
{
  // Separates classes with a single space, collates classes for body element
  echo 'class="' . join(' ', get_custom_body_class($class)) . '"';
}

/**
 * Retrieve the classes for the body element as an array.
 */
function get_custom_body_class($class = '')
{
  global $wp_query;
  $classes = array();

  if (is_user_logged_in()) {
    $classes[] = 'logged-in';
  }
  if (is_admin_bar_showing()) {
    $classes[] = 'admin-bar';
    $classes[] = 'no-customize-support';
  }

  /* Uncomment for template name
  if ( is_page_template() ) {
    $template_slug  = get_page_template_slug( get_the_ID() );
    $template_slug  = str_replace(".php","",$template_slug);
    $classes[] = sanitize_html_class( str_replace( '.', '-', $template_slug ) );
  }
  else {
    $classes[] = "template-default";
  }
  */

  if (!empty($class)) {
    if (!is_array($class)) {
      $class = preg_split('#\s+#', $class);
    }
    $classes = array_merge($classes, $class);
  } else {
    // Ensure that we always coerce class to being an array.
    $class = array();
  }
  $classes = array_map('esc_attr', $classes);
  /**
   * Filters the list of CSS body classes for the current post or page.
   */
  $classes = apply_filters('custom_body_class', $classes, $class);
  return array_unique($classes);
}

/**
 * Sanitize Phone Numbers
 */
function mag_sanitize_phone($phone)
{
  return preg_replace('/\D+/', '', $phone);
}

/**
 * Sanitize Email
 */
function mag_sanitize_email($email)
{
  return str_replace("@", "/at/", $email);
}

/**
 * Debug Pretty Output
 */
function pretty_dump($source)
{
  echo '<pre>';
  var_dump($source);
  echo '</pre>';
}

/**
 * WP Default Search Updates *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 * Desc: Designed to expand the default search functionality to include not just the post titles but also the post meta values
 */
function mag_search_join($join)
{
  global $wpdb;

  if (is_search()) {
    $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
  }

  return $join;
}

function mag_search_where($where)
{
  global $pagenow, $wpdb;

  if (is_search()) {
    $where = preg_replace(
      "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
      "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)",
      $where
    );
  }

  return $where;
}

function mag_search_distinct($where)
{
  global $wpdb;

  if (is_search()) {
    return "DISTINCT";
  }

  return $where;
}

// Update WP site search to show results on search page
function mag_change_search_url()
{
  if (!empty($_GET['search']) && !empty($_GET['s'])) {
    wp_redirect(home_url($_GET['search']) . urlencode(get_query_var('s')));
    exit();
  }
}

// This updates the search results to show per page in case the site wide settings (Settings > Reading) options are set differently and you want to override.
function mag_set_search_post_per_page($query)
{
  global $wp_the_query;
  if ((!is_admin()) && ($query === $wp_the_query) && ($query->is_search())) {
    $query->set('posts_per_page', 12);
  }
  return $query;
}

add_filter('posts_join', 'mag_search_join');
add_filter('posts_where', 'mag_search_where');
add_filter('posts_distinct', 'mag_search_distinct');
add_action('template_redirect', 'mag_change_search_url');
add_action('pre_get_posts', 'mag_set_search_post_per_page');

/*
Include gform_full_access for GF add-on plugin compatibility
When all Gravity Forms capabilities are given to a role, an extra capability called gform_full_access is also given. Many plugins require this permission for a user to access their admin pages. Our Members plugin, however, does not set this capability when all other Gravity Forms capabilities are set.
*/
function mag_add_gf_cap()
{
  $role = get_role('administrator');
  $role->add_cap('gform_full_access');
}
add_action('admin_init', 'mag_add_gf_cap');