<?php add_theme_support("menus");
/* Pour faire apparaître le menes sous apparence dans la barre d'outils de WP */

add_theme_support("title-tag");
/* Pour contrôler le titre des onglets*/

add_theme_support( 'post-thumbnails' );
/* Pour contrôler les images mises en avant*/

register_nav_menus( array(
    'primary_menu' => 'Menu principal',
    'footer_menu'  => 'Menu footer',
) );
/* Pour mettre un emplacement pour le menu = walker Bootstrap - WP*/
// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}/* Pagination bootstrap 5 WP Ressouces dans le dossier ressource de SiteBase */

/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 * @param array $params
 *
 * @return string|null
 * 
 * Using Bootstrap 4? see https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
 * 
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 5.7.1
 * - Tested with Bootstrap 5.0 (https://getbootstrap.com/docs/5.0/components/pagination/)
 * - Tested on Sage 9.0.9
 *
 * INSTALLATION:
 * add this file content to your theme function.php or equivalent
 *
 * USAGE:
 *     <?php echo bootstrap_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ... endwhile() ...
 *       echo bootstrap_pagination($query);
 *     ?>
 * IL SUFFIT DE METTRE bootstrap_pagination à L'ENDROIT QUE JE VEUX LA PAGINATION
 */
function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
  if ( null === $wp_query ) {
      global $wp_query;
  }

  $add_args = [];

  //add query (GET) parameters to generated page URLs
  /*if (isset($_GET[ 'sort' ])) {
      $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
  }*/

  $pages = paginate_links( array_merge( [
          'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
          'format'       => '?paged=%#%',
          'current'      => max( 1, get_query_var( 'paged' ) ),
          'total'        => $wp_query->max_num_pages,
          'type'         => 'array',
          'show_all'     => false,
          'end_size'     => 3,
          'mid_size'     => 1,
          'prev_next'    => true,
          'prev_text'    => __( '« Articles précédents' ),
          'next_text'    => __( 'Articles suivant »' ),
          'add_args'     => $add_args,
          'add_fragment' => ''
      ], $params )
  );

  if ( is_array( $pages ) ) {
      //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
      $pagination = '<nav aria-label="Page navigation"><ul class="pagination">';

      foreach ( $pages as $page ) {
          $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
      }

      $pagination .= '</ul></nav>';

      if ( $echo ) {
          echo $pagination;
      } else {
          return $pagination;
      }
  }

  return null;
}

/**
* Notes:
* AJAX:
* - When used with wp_ajax (generate pagination HTML from ajax) you'll need to provide base URL (or it'll be admin-ajax URL)
* - Example for a term page: bootstrap_pagination( $query, false, ['base' => get_term_link($term) . '?paged=%#%'] )
*
* Images as next/prev:
* - You can use image as next/prev buttons
* - Example: 'prev_text' => '<img src="' . get_stylesheet_directory_uri() . '/assets/images/prev-arrow.svg">',
*
* Add query parameters to page URLs
* - If you need custom URL parameters on your page URLS, use the "add_args" attribute
* - Example (before paginate_links() call):
* $arg = [];
* if (isset($_GET[ 'sort' ])) {
*  $args[ 'sort' ] = (string)$_GET[ 'sort' ];
* }
* ...
* 'add_args'     => $args,
*/
 ?>

